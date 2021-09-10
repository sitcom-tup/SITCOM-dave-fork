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
        if($this->whenLoaded('columnCards'))
        {
            $cards = ColumnCardResource::collection($this->whenLoaded('columnCards'));
        }else 
        {
            $cards = null;
        }
        return [
            'column_id' => $this->id,
            'column_name'=> $this->column_name,
            'column_styles'=> $this->column_styles,
            'cards' => $cards,
        ];
    }
}
