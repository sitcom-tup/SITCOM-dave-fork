<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserNotAllowedResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'status'=>'failed',
            'code' => 401,
            'message'=>'You do not have access to this role',
            'table' =>'users',
            'data'=> $this->resource
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(401);
    }
}
