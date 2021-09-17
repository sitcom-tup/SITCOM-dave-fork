<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class MessageResource extends JsonResource
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
            'message_id' => $this->id,
            'senders' => array_map('intval',explode(',',$this->senders)),
            'receivers' => array_map('intval',explode(',',$this->receivers)),
            'content' => $this->content,
            'created_at'=> Carbon::parse($this->created_at)->format('Y-m-d h:i A'),
            'message_url' => url('api/v1/messages/'.$this->id),
            'url' => url('messages/'.$this->id)
        ];
    }
}
