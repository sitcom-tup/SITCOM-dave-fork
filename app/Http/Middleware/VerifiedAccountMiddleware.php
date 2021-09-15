<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class VerifiedAccountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $user = auth()->user();

        if($user->email_verified_at == null)
        {
            if($user->role == 3 || $user->role == 5)
            {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Unauthorized, account not verified',
                    'code' => 401,
                    'url' => url('api/v1/requests/verifications/'.$user->id),
                    ])->setStatusCode(401);
            }
        }     

        return $next($request);
    }
}
