<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentAuthResource extends JsonResource
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
            'status'=>'success',
            'message'=>'user logged in',
            'table'=>'students',
            'data' => [
                'id' => $this->id,
                'student_name' =>$this->getFullName(),
                'student_tup_id' =>$this->student_tup_id,
                'course' => $this->course->only(['id','course_name','course_fulltext','department_id']),
                'student_email' => $this->student_email,
                'student_link' => $this->student_link,
                'student_email_verified_at' => $this->student_email_verified_at,
                'student_state' => $this->student_state,
            ]
        ];
    }
}
