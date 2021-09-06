<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnnouncementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this);
        return [
            'announce_id' => $this->id,
            'coordinator' => $this->coordinator->only(['id']),
            'department' => $this->coordinator->department->only(['department_name']),
            'coures'=>$this->courses,
            'heading' => $this->heading,
            'body' => $this->body,
            'posted_at' => $this->getPostedDateFormat(),
            'created_at' => $this->getCreatedDateFormat(),
            'updated_at' => $this->getUpdatedDateFormat() 
        ];
    }
}
