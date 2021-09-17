<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentProfileResource extends JsonResource
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
            'user'=> [
                'user_id' => $this->whenLoaded('user')->id,
                'name' => $this->whenLoaded('user')->getFullName(),
                'state' => $this->whenLoaded('user')->state,
                'email' => $this->whenLoaded('user')->email,
                'email_verified_at' => $this->whenLoaded('user')->email_verified_at,
                'created_at' => \Carbon\Carbon::parse($this->whenLoaded('user')->created_at)->format('Y-m-d h:i A'),
            ],
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
