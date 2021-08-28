<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Resources\AnnouncementCollection;
use App\Http\Resources\AnnouncementResource;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AnnouncementController extends Controller
{
    // get all announcement from coordinator based on student course only
    public function index(Request $request)
    {
        $request->validate([
            'date' => 'nullable|date_format:Y-m-d|string',
            'course' => 'nullable|string',
            'limit' => 'nullable|integer'
        ]);
        $limit = $request->has('limit') ? $request->limit : 2;

        $announce = Announcement::with('coordinator');

        if($request->has('date'))
        {
            $announce->where('posted_at',$request->date);
        }

        if($request->has('course'))
        {
            $announce->whereCourses($request->course);
        }

        return new AnnouncementCollection($announce->latest()->paginate($limit));
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
    public function store(StoreAnnouncementRequest $request)
    {
        $ann = Announcement::firstOrCreate($request->validated());
        return (AnnouncementResource::make($ann))->additional(['message'=>'saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        $ann = $announcement->findOrFail($announcement->id);
        return (AnnouncementResource::make($ann)->additional(['message'=>'retrieved']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAnnouncementRequest $request, Announcement $announcement)
    {
        $ann =$announcement->update($request->validated());
        return (AnnouncementResource::make($announcement->latest()->first())
                                    ->additional(['message'=>'updated']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $ann = $announcement->findOrFail($announcement)->delete();
        return (AnnouncementResource::make($ann)->additional(['message'=>'deleted']));
    }
}
