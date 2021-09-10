<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoordinatorAuthResource extends JsonResource
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
            'code' => 200,
            'message'=>'user logged in',
            'table'=>'coordinators',
            'data' => [
                'user_id' => $this->user->id,
                'coordinator_id' => $this->id,
                'department' => $this->department->only(['id','department_name']),
                'coordinator_name' => $this->user->getFullName(),
                'coordinator_position' => $this->coordinator_position,
                'coordinator_contact' => $this->coordinator_contact,
                'coordinator_email' => $this->user->email,
                'coordinator_link' => $this->coordinator_link,
                'coordinator_state' => $this->user->state
            ],
            'meta' => ['token'=>$this->getToken()]
        ];
    }
}
