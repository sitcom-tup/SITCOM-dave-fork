<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'admin_id' => $this->id,
            'user' => [
                'user_id' => $this->id,
                'name' => $this->getFullName(),
                'role' => $this->userRole(),
                'state' => $this->state,
                'email' => $this->email,
                'password' => $this->password,
                'created_at' => \Carbon\Carbon::parse($this->created_at)->format('Y-m-d h:i A'),
            ],
            'profile_link'=>url('api/v1/profiles/admins/'.$this->id)
        ];
    }
}
