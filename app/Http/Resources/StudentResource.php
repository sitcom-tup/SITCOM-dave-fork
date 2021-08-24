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
        dd($this->user);
        return [
            'id' => $this->id,
            'student_name' =>$this->user->getFullName(),
            'student_tup_id' =>$this->student_tup_id,
            'course' => $this->course->only(['course_name','course_fulltext']),
            'department' => $this->courseDepartment['department_name'],
            'student_email' => $this->user->email,
            'student_link' => $this->user->link,
            'student_email_verified_at' => $this->student_email_verified_at,
            'student_state' => $this->user->state,
        ];
    }
}
