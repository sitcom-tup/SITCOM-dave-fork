<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserAuthResource extends JsonResource
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
            'table'=>'users',
            'data' => [
                'user_id' => $this->id,
                'name'=> $this->getFullName(),
                'email' => $this->email,
                'email_verified_at' => $this->email_verified_at,
                'state'=> $this->state,
                'role' => $this->userRole(),
            ],
            'meta' => ['token'=>$this->getToken()]
        ];
    }
}
