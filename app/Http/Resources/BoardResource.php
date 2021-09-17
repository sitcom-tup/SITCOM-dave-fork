<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BoardResource extends JsonResource
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
            'board_id'=> $this->id,
            'board_name' => $this->board_name,
            'columns'=> BoardColumnResource::collection($this->whenLoaded('boardColumns')),
            'users'=> BoardUserResource::collection($this->whenLoaded('boardUsers')),
        ];
    }
}
