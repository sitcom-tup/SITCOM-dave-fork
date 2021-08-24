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
            'id' => $this->id,
            'coordinator' => $this->coordinator->only(['id']),
            'department' => $this->coordinator->department,
            'heading' => $this->heading,
            'body' => $this->body,
            'created_at' => $this->getCreatedDateFormat(),
            'updated_at' => $this->getUpdatedDateFormat() 
        ];
    }
}
