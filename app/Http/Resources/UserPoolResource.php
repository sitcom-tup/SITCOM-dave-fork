<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserPoolResource extends JsonResource
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
            'pool_id' => $this->id,
            'socket_id' => $this->socket_id,
            'is_active' => $this->isActive,
            'last_seen' => Carbon::parse($this->lastSeen)->format('Y-m-d h:i A'),
            'device' => $this->device,
            'user' => [
                'user_id' => $this->whenLoaded('user')->id,
                'name' => $this->whenLoaded('user')->getFullName(),
                'email' => $this->whenLoaded('user')->email,
                'role' => $this->user->userRole(),
            ]
        ];
    }
}
