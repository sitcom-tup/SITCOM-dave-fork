<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        if($auth = Auth::guard('api')->user()->token())
        {
            $auth->tokens->each(function($token,$key)
            {
                $token->delete();
            });
            return response()->json([
                'status' => 'success',
                'table' => $request->role.'s',
                'message' => 'Successfully logged out'
            ],200);
        }

        return response()->json([
            'status' => 'failed',
            'table' => $request->role.'s',
            'message' => 'unauthorized'
        ],401);
    } 
}
