<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthFailResource extends JsonResource
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
            'status'=>'failed',
            'code' => 401,
            'message'=>'invalid credentials',
            'table' => $this->resource,
            'data'=> null
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(401);
    }
}
