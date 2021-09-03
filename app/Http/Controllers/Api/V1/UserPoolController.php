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
        
        $request->has('limit') ? $limit = $request->limit : $limit = 12;

        return new UserPoolCollection($pool->latest()->paginate($limit));
    }

    public function connect(StoreUserPoolRequest $request)
    {
        $request['user_id'] = auth()->user()->id;
        $request['isActive'] = $request->is_active;
        $request['lastSeen'] = $request->last_seen;
        
        $pool = UserPool::with(['user'])->updateOrCreate($request->only(['socket_id','user_id','isActive','lastSeen','device']));
        return (UserPoolResource::make($pool))->additional(['message'=>'connected']);
    }

    public function disconnect($socketId)
    {
        $pool = UserPool::where('socket_id',$socketId)->delete();
        return response()->json(['message' => 'disconencted']);
    }
}
