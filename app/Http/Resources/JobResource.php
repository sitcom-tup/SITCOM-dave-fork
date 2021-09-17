<?php

namespace App\Http\Resources;
use App\Models\Supervisor;
use Carbon\Carbon;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        // NOT OPTIMIZED
        // Supervisor::where('user_id', $this->user_id)->exists() ?
        // $postedBy = $this->whenLoaded('user')->supervisor->company->comp_name :
        // $postedBy = $this->whenLoaded('user')->getFullName();

        return [
            'job_id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'description' => $this->description,
            'qualification'=> $this->qualification,
            'posted_at' => Carbon::parse($this->created_at)->format('M d Y h:i A'),
            'opened_by' => $this->whenLoaded('user')->getFullName(),
            'verified_at' => Carbon::parse($this->verified_at)->format('M d Y h:i A'),
            'status' => $this->status,
            'job_link' => url('api/v1/jobs/'.$this->id)
        ];
    }
}
