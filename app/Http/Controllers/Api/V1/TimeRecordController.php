<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreTimeRecordRequest;
use App\Http\Resources\TimeRecordCollection;
use App\Http\Resources\TimeRecordResource;
use App\Http\Requests\TimeRecordRequest;
use App\Http\Requests\TimeOutRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimeRecord;
use App\Models\Schedule;
use App\Models\Intern;
use Carbon\Carbon;

class TimeRecordController extends Controller
{
//  Users 
// index - all roles
// show - all roles
// delete - student, supervisor
// create - student, supervisor
// edit - student, supervisor 


    public function index(TimeRecordRequest $request)
    {
        $dtrs = TimeRecord::with(['student']);

        if($request->has('supervisor'))
        {
           $interns = Intern::where('supervisor_id',$request->supervisor)->pluck('student_id');
           $dtrs->whereIn('student_id', $interns);
        }
        
        $request->has('student') ? $dtrs->where('student_id',$request->student) : $dtrs;
       

        $request->has('date_to') && $request->has('date_from') ? 
        $dtrs->whereBetween('date', [$request->date_from, $request->date_to]) :
        $dtrs->where('date', Carbon::now('Asia/Manila')->format('Y-m-d'));

        $request->has('verified') ? $dtrs->where('verified',$request->verified) : $dtrs;
        $request->has('limit') ? $limit = $request->limit : $limit = 12;

        return new TimeRecordCollection($dtrs->orderBy('date','desc')->paginate($limit));
    }

    public function show($id)
    {
        $dtr = TimeRecord::with(['student'])->findOrFail($id);
        return (TimeRecordResource::make($dtr))->additional(['status' => 'success', 'message' => 'record found']);
    }

    public function storeByStudent(StoreTimeRecordRequest $request,TimeRecord $timeRecord)
    {
        $sched = Schedule::where('student_id', $request->student_id)
                ->where('day_of_week', Carbon::parse($request->date)->dayOfWeek)
                ->first();

        $request->time_in <= $sched->in_time_provision ? $status = 0 : $status = 1;

        $dtrInfo = array_merge($request->validated(),[
            'status' => $status,
            'verified' => 0,
            'time_out' => null,
            'hours_worked' => 0,
        ]);
        
        if($dtr = $timeRecord->checkIfExists($request->validated())->first())
        {
            return (TimeRecordResource::make($dtr->load('student')))
            ->additional(['status' => 'failed', 'message' => 'record exists']);
        }
        //Lazy loading the relationship 
        return (TimeRecordResource::make($timeRecord->create($dtrInfo)->load('student')))
        ->additional(['status' => 'success', 'message' => 'saved']);
    }

    public function storeBySupervisor(StoreTimeRecordRequest $request, TimeRecord $timeRecord)
    {
        if($dtr = $timeRecord->checkIfExists($request->validated())->first())
        {
            return (TimeRecordResource::make($dtr->load('student')))
            ->additional(['status' => 'failed', 'message' => 'record exists']);
        }

        if($request->status == 3)
        {
            $request['hours_worked'] = 0;
        } else 
        {
            $request['hours_worked'] = $timeRecord->storeHoursWorked($request->validated());
        }

        return (TimeRecordResource::make($timeRecord->create($request->all())->load('student')))
        ->additional(['status' => 'success', 'message' => 'saved']);
    }

    public function update($id, StoreTimeRecordRequest $request)
    {   
        $dtr = TimeRecord::with(['student'])->findOrFail($id);

        if($request->status == 3 || !$request->has('time_out'))
        {
            $request['hours_worked'] = 0;
        } else 
        {
            $request['hours_worked'] = $dtr->storeHoursWorked($request->validated());
        }

        $dtr->update($request->all());
        return (TimeRecordResource::make($dtr))->additional(['status' => 'success', 'message' => 'updated']);
    }

    // Student TIME OUT
    public function updateByStudent($id,TimeOutRequest $request)
    {
        $dtr = TimeRecord::findOrFail($id);
        $dtr->update($request->validated());
        return (TimeRecordResource::make($dtr->load('student')))->additional(['status' => 'success', 'message' => 'updated']);
    }

    public function destroy($id)
    {
        $dtr = TimeRecord::with(['student'])->findOrFail($id);
        $dtr->delete();
        return (TimeRecordResource::make($dtr))->additional(['status' => 'success', 'message' => 'deleted']);
    }
}
