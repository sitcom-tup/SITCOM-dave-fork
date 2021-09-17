<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ColumnCardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'card_id' => $this->id,
            'creator' => new UserResource($this->whenLoaded('user')),
            'assignees' => UserResource::collection(\App\Models\User::findMany(explode(',',$this->assignees))),
            'card_name'=> $this->card_name,
            'card_description'=> $this->card_description,
            'start_date' => $this->start_date,
            'due_date' => $this->due_date,
            'status' => $this->status,
            'verified' => $this->verified,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:i A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:i A'),
        ];
    }
}
