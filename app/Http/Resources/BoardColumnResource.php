<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BoardColumnResource extends JsonResource
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
            'column_id' => $this->id,
            'column_name'=> $this->column_name,
            'column_styles'=> $this->column_styles,
            'cards' => ColumnCardResource::collection($this->whenLoaded('columnCards')),
        ];
    }
}
