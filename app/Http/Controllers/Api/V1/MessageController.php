<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\MessageCollection;
use App\Http\Resources\MessageResource;
use App\Services\ReceiveOrderNumber;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Auth;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $mainUser = auth()->user()->id;

        $request->validate([
            'receiver_id' => 'nullable|integer',
        ]);

        if($request->receiver_id)
        {
            $convo = Message::where('senders','LIKE','%'.$request->receiver_id.'%')
                            ->where('receivers','LIKE','%'.$mainUser.'%')
                            ->orWhere('senders','LIKE','%'.$mainUser.'%')
                            ->where('receivers','LIKE','%'.$request->receiver_id.'%')
                            ->get();           
        } 
        else 
        {
            $asSender = Message::where('senders','LIKE','%'.$mainUser.'%')->get();
            $asReceiver = Message::where('receivers','LIKE','%'.$mainUser.'%')->get();
    
            $convo = $asReceiver->merge($asSender);
        }

        return new MessageCollection($convo);
    }


    public function store(Request $request)
    {
        $request->validate([
            'message_id' => 'nullable|string',
            'content' =>'required|string',
            'senders' => 'required',
            'receivers'=> 'required'
        ]);

        $request['senders'] = implode(',',$request->senders);
        $request['receivers'] = implode(',',$request->receivers);
        $request['id'] = $request->message_id;

        $convo = Message::updateOrCreate($request->except(['message_id']));
        
        return (MessageResource::make($convo))->additional(['message'=>'saved']);
    }

    public function show($message_id)
    {
        $convo = Message::findOrFail($message_id);
        return new MessageResource($convo);
    }
}
