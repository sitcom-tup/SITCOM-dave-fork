<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class TimeRecordResource extends JsonResource
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
            'record_id' => $this->id,
            'date' => $this->date,
            'day_of_week' => Carbon::parse($this->date)->format('l'),
            'time_in' => Carbon::parse($this->time_in)->format('h:i a'),
            'time_out' => Carbon::parse($this->time_out)->format('h:i a'),
            'timein_location' => $this->timein_location,
            'status' => $this->getStatusName(),
            'verified'=> $this->verified,
            'student' => new StudentResource($this->whenLoaded('student'))
        ];
    }
}
