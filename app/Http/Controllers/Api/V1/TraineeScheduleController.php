<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\GetTraineeScheduleRequest;
use App\Http\Resources\TraineeScheduleResource;
use App\Http\Requests\StoreTraineeSchedule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\User;

class TraineeScheduleController extends Controller
{
    //Student can view its own schedule 
    //Supervisor can view/create/edit/delete

    public function index(GetTraineeScheduleRequest $request)
    {
        $scheds = Schedule::with(['student']);

        if($request->has('name')){
            $users = User::where('fname','LIKE','%'.$request->name.'%')
                        ->orWhere('lname','LIKE','%'.$request->name.'%')
                        ->pluck('id');
            $students = Student::whereIn('user_id', $users->toArray())->pluck('id');
            $scheds->whereIn('student_id',$students->toArray());
        }

        $request->has('student') ? $scheds->where('student_id',$request->student): $scheds;
        $request->has('supervisor') ? $scheds->where('supervisor_id', $request->supervisor) : $scheds;
        $request->has('day') ? $scheds->where('day_of_week', $request->day) : $scheds;

        return TraineeScheduleResource::collection($scheds->orderBy('day_of_week','asc')->get());
    }

    public function store(StoreTraineeSchedule $request, Schedule $schedule)
    {
        $students = [];
        foreach($request->schedule as $sched)
        {   
            $schedule->updateOrCreate(['student_id' => $sched['student_id'], //this will uniquely  identify field in table
                                        'day_of_week' => $sched['day_of_week']], //if there are no like student_id and day_of_week
                                        $sched); //then insert new row if has like then update

            array_push($students,$sched['student_id']);
        }

        return TraineeScheduleResource::collection($schedule->whereIn('student_id',$students)->get()->load('student'));
    }

    public function destroy($id)
    {
        $sched = Schedule::findOrFail($id);
        $sched->delete();

        return TraineeScheduleResource::collection($sched->where('student_id',$sched->student_id)->get()->load('student'));
    }

}
