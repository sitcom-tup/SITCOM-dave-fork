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
            'time_in' => $this->time_in,
            'time_out' => $this->time_out,
            'time' =>[
                'time_in_12hrformat' => Carbon::parse($this->time_in)->format('h:i A'),
                'time_out_12hrformat' => $this->time_out == null ? null :Carbon::parse($this->time_out)->format('h:i A'),
            ],
            'hours_worked' =>[
                'recorded_hours_worked' => $this->getHoursWorked(),
                'partial_hours_worked' => $this->getPartialHoursWorked()
            ],
            'timein_location' => $this->timein_location,
            'status' => $this->getStatusName(),
            'verified'=> $this->verified,
            'student' => new StudentResource($this->whenLoaded('student'))
        ];
    }
}
