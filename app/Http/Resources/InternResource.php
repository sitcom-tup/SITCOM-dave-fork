<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InternResource extends JsonResource
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
            'intern_id' => $this->id,
            'required_hours' => $this->required_hours,
            'rendered_hours' => $this->rendered_hours,
            'endorsement_date' => $this->endorsement_date,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'remarks' => $this->remarks,
            'student' => new StudentProfileResource($this->whenLoaded('student')),
            'supervisor' => new SupervisorProfileResource($this->whenLoaded('supervisor')),
            'coordinator' => new CoordinatorProfileResource($this->whenLoaded('coordinator')),
            'batch' => $this->whenLoaded('batch')->only(['id','year']),
            'files' => $this->whenLoaded('traineeFile')
        ];
    }
}
