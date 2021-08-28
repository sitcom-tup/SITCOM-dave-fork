<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Resources\JobCollection;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Job $job)
    { 
        $jobs = $job->getOpenedAndVerified();

        if($request->has('title'))
            $jobs->where('title','LIKE','%'.$request->title.'%');               
        
        if($request->has('type'))
            $jobs->whereType($request->type);

        if($request->has('qualification'))
            $jobs->where('qualification','LIKE','%'.$request->qualification.'%');

        $request->has('limit') ? $limit = $request->limit : $limit = 12;

        return new JobCollection($jobs->latest()->paginate($limit));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        $user = auth()->user();

        $jobDetails = array_merge($request->validated(),
            ['status' =>  1, 
            'verified_at' => $user->role === 4 ? now() : null,
        ]);

        $job = $user->jobs()->create($jobDetails);

        return (JobResource::make(Job::latest()->first()))
        ->additional(['status' => 'success', 'message' => 'saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return (JobResource::make($job->getOrFail($job->id)))
        ->additional(['status' => 'success', 'message' => 'job found']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $user = auth()->user();

        if($user->role === 4)
        {
            $request->has('verified') ?
                $verified = $request->verified === 1 ? now() : null :
                $verified = $job->verified_at;
        }

        $request->has('status') ?
            $status = $request->status === 1 ? 1 : 0 :
            $status = $job->status;

        $jobDetails = array_merge($request->validated(),
            ['status' =>  $status, 
            'verified_at' => $verified,
        ]);

        $jobs = $job->update($jobDetails);

        return (JobResource::make($job))
        ->additional(['status' => 'success', 'message' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $jobSearch = $job->getOrFail($job->id);
        
        $jobSearch->update(['status' => 0]);
            
        return (JobResource::make($jobSearch))->additional(['status'=>'success','message'=>'updated']);
    }
}
