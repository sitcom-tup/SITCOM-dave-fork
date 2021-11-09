<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreUserPoolRequest;
use App\Http\Resources\UserPoolCollection;
use App\Http\Resources\UserPoolResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserPool;
use Auth;

class UserPoolController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'user' => 'nullable|integer',
            'socket_id' => 'nullable|string',
            'limit' => 'nullable|integer',
            'active' => 'nullable|integer'
        ]);

        $pool = UserPool::with(['user']);
        
        if($request->active)
        {
            $pool->where('isActive', $request->active);
        }
        
        if($request->user)
        {
            $pool->where('user_id', $request->user);
        }

        if($request->socket_id)
        {
            $pool->where('socket_id', $request->socket_id);
        }
        
        $request->has('limit') ? $limit = $request->limit : $limit = 12;

        return new UserPoolCollection($pool->latest()->paginate($limit));
    }

    public function connect(StoreUserPoolRequest $request)
    {
        $request['user_id'] = auth()->user()->id;
        $request['isActive'] = (int) $request->is_active;
        $request['lastSeen'] = \Carbon\Carbon::parse($request->last_seen)->format('Y-m-d H:i:s');
        
        UserPool::where('user_id', auth()->user()->id)->delete();

        $pool = UserPool::with(['user'])->updateOrCreate($request->only(['socket_id','user_id','isActive','lastSeen','device']));
        return (UserPoolResource::make($pool))->additional(['message'=>'connected']);
    }

    public function disconnect($socketId)
    {
        $pool = UserPool::where('socket_id',$socketId)->delete();
        return response()->json(['message' => 'disconencted']);
    }
}
