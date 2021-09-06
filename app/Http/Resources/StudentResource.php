<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'student_id' => $this->id,
            'student_name' =>$this->whenLoaded('user')->getFullName(),
            'student_tup_id' =>$this->student_tup_id,
            'course' => $this->whenLoaded('course')->only(['course_name','course_fulltext']),
            'department' => $this->whenLoaded('course')->department->department_name,
            'student_email' => $this->whenLoaded('user')->email,
            'student_link' => $this->student_link,
            'student_email_verified_at' => $this->whenLoaded('user')->email_verified_at,
            'student_state' =>$this->whenLoaded('user')->state,
            'profile_link' => url('api/v1/profiles/students/'.$this->id),
        ];
    }
}
