<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class SupervisorProfileResource extends JsonResource
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
            'supervisor_id' => $this->id,
            'supervisor_position' => $this->supervisor_position,
            'supervisor_gender' => $this->supervisor_gender,
            'supervisor_contact' => $this->supervisor_contact,
            'supervisor_link' => $this->supervisor_link,
            'user'=> [
                'user_id' => $this->whenLoaded('user')->id,
                'name' => $this->whenLoaded('user')->getFullName(),
                'state' => $this->whenLoaded('user')->state,
                'email' => $this->whenLoaded('user')->email,
                'created_at' => Carbon::parse($this->whenLoaded('user')->created_at)->format('Y-m-d h:i A'),
            ],
            'company' => [
                'company_id'=> $this->whenLoaded('company')->id,
                'name'=> $this->whenLoaded('company')->comp_name,
                'website'=> $this->whenLoaded('company')->comp_website,
                'contact'=> $this->whenLoaded('company')->comp_contact,
            ],
            'profile_link'=>url('api/v1/profiles/supervisors/'.$this->id),
        ];
    }
}
