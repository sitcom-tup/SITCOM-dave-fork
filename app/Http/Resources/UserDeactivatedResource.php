<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDeactivatedResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'status'=>'failed',
            'code' => 401,
            'message'=>'This account has been deactivated.',
            'table' =>'users',
            'data'=> $this->resource
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(401);
    }
}
