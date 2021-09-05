<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreInternRequest;
use App\Http\Resources\InternCollection;
use App\Http\Resources\InternResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intern;
use App\Models\Batch;
use Carbon\Carbon;

class InternController extends Controller
{
    // List for all trainees
    public function index(Request $request)
    {
        $request->validate([
            'supervisor' => 'nullable|integer',
            'coordinator' => 'nullable|integer',
            'student' => 'nullable|integer',
            'batch' => 'nullable|integer',
            'limit' => 'nullable|integer',
        ]);

        $interns = Intern::with(['student','supervisor','coordinator','batch','traineeFile']);
        $batch = Batch::where('year',Carbon::now()->format('Y'))->first();

        $request->has('batch') ? $interns->where('batch_id', $request->batch) : $interns->where('batch_id', $batch->id);
        $request->has('coordinator') ? $interns->where('coordinator_id', $request->coordinator) : $interns;
        $request->has('supervisor') ? $interns->where('supervisor_id', $request->supervisor) : $interns;
        $request->has('student') ? $interns->where('student_id', $request->student) : $interns;
        $request->has('limit') ? $limit = $request->limit : $limit = 12;


        $lists = $interns->latest()->paginate($limit);

        return new InternCollection($lists);
    }

    public function store(StoreInternRequest $request, Intern $intern)
    {
        $request['batch_id'] = Batch::where('year', $request->batch)->first()->id;
        $request['student_id'] = $request->student;
        $request['supervisor_id'] = $request->supervisor;
        $request['coordinator_id'] = $request->coordinator;
        $request['files_id'] = $request->intern_files;

        if($trainee = $intern->where('student_id', $request->student)->exists())
        {
            return response()->json(['message'=> 'exists','status'=>'failed','code'=>409,
                                    'intern_link'=> url('api/v1/interns?student='.$request->student),]);
        }

        $trainee = $intern->updateOrCreate($request->except(['student','supervisor','coordinator','batch','files']));
        $data = Intern::with(['student','supervisor','coordinator','batch','traineeFile'])->find($trainee->id);
        return (InternResource::make($data))->additional(['message'=>'saved','status'=>'success','code'=>200]);
    }

    public function update(StoreInternRequest $request,Intern $intern)
    {
        $request['batch_id'] = Batch::where('year', $request->batch)->first()->id;
        $request['student_id'] = $request->student;
        $request['supervisor_id'] = $request->supervisor;
        $request['coordinator_id'] = $request->coordinator;
        $request['files_id'] = $request->intern_files;

        $trainee = $intern->update($request->except(['student','supervisor','coordinator','batch','files']));
        $data = Intern::with(['student','supervisor','coordinator','batch','traineeFile'])->find($intern->id);
        return (InternResource::make($data))->additional(['message'=>'updated','status'=>'success','code'=>200]);
    }       

    public function show($id)
    {
        $intern = Intern::with(['student','supervisor','coordinator','batch','traineeFile'])->findOrFail($id);
        return (InternResource::make($intern))->additional(['message'=>'found','status'=>'success','code'=>200]);
    }

    public function destroy($id)
    {
        $intern = Intern::with(['student','supervisor','coordinator','batch','traineeFile'])->findOrFail($id);
        $intern->delete();
        return (InternResource::make($intern))->additional(['message'=>'deleted','status'=>'success','code'=>200]);
    }

}
