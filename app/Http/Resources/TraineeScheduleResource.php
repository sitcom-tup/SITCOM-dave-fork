<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class TraineeScheduleResource extends JsonResource
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
            'schedule_id' => $this->id,
            'day_of_week' => $this->day_of_week,
            'in_time' => $this->in_time,
            'out_time' => $this->out_time,
            'human_readable_format' => [
                'in_time' => Carbon::parse($this->in_time)->format('h:i A'),
                'out_time' => Carbon::parse($this->out_time)->format('h:i A'),
                'day_of_week' => $this->getDayName(),
            ],
            'in_time_provision' => $this->in_time_provision,
            'supervisor_id' => $this->supervisor_id,
            'student' => new StudentResource($this->whenLoaded('student')),
        ];
    }
}
