<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChatSearchUsersResource;
use Illuminate\Http\Request;
use App\Models\User;

class ChatSearchController extends Controller
{
    public function index(Request $request, User $user)
    {
        $request->validate([
            'name'=> 'nullable|string',
        ]);

        $users = User::with(['student','coordinator','supervisor']);

        if($request->has('name'))
        {
            $users->where('fname', 'LIKE', '%'.$request->name.'%')->orWhere('lname', 'LIKE', '%'.$request->name.'%');
        }

        return ChatSearchUsersResource::collection($users->get());
    }
}
