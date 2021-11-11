<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class CoordinatorProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this);
        return [
            'coordinator_id' => $this->id,
            'coordinator_position'=>$this->coordinator_position,
            'coordinator_gender'=> $this->coordinator_gender,
            'coordinator_link'=>$this->coordinator_link,
            'coordinator_contact'=> $this->coordinator_contact,
            'user' => [
                'user_id' => $this->whenLoaded('user')->id,
                'name' => $this->whenLoaded('user')->getFullName(),
                'state' => $this->whenLoaded('user')->state,
                'email' => $this->whenLoaded('user')->email,
                'password' => $this->whenLoaded('user')->password,
                'created_at' => Carbon::parse($this->whenLoaded('user')->created_at)->format('Y-m-d h:i A'),
            ],
            'department'=> [
                'department_id' => $this->whenLoaded('department')->id,
                'name' => $this->whenLoaded('department')->department_name,
            ],
            'profile_link'=>url('api/v1/profiles/coordinators/'.$this->id),
        ];
    }
}
