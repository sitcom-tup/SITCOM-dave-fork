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
            'message'=>'user logged in',
            'table'=>'coordinators',
            'data' => [
                'id' => $this->id,
                'department' => $this->department->only(['id','department_name']),
                'coor_name' => $this->getFullName(),
                'coor_position' => $this->coor_position,
                'coor_contact' => $this->coor_contact,
                'coor_email' => $this->coor_email,
                'coor_link' => $this->coor_link,
                'coor_state' => $this->coor_state
            ]
        ];
    }
}
