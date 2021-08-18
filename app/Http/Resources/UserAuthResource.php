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
                'id' => $this->id,
                'admin_name'=> $this->getFullName(),
                'admin_email' => $this->admin_email,
                'admin_email_verified_at' => $this->admin_email_verified_at,
                'admin_state'=> $this->admin_state,
            ],
            'meta' => ['token'=>$this->getToken()]
        ];
    }
}
