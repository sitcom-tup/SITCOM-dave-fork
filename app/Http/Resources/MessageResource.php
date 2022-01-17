<?php

namespace App\Http\Resources;

use App\Models\User;
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
            'senders' => UserResource::collection(User::whereIn('id', array_map('intval',explode(',',$this->senders)))->get()),
            'receivers' => UserResource::collection(User::whereIn('id', array_map('intval',explode(',',$this->receivers)))->get()),
            'content' => $this->content,
            'created_at'=> Carbon::parse($this->created_at)->format('Y-m-d h:i A'),
            // 'updated_at'=> Carbon::parse($this->udpated_at)->format('Y-m-d h:i A'),
            'updated_at'=> $this->updated_at,
            'message_url' => url('api/v1/messages/'.$this->id),
            'url' => "/messages/".$this->id
        ];
    }
}
