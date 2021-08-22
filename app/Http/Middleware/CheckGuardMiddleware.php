<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class CheckGuardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check())
        {
            // Here you have access to $request->user() method that
            // contains the model of the currently authenticated user.
            //
            // Note that this method should only work if you call it
            // after an Auth::check(), because the user is set in the
            // request object by the auth component after a successful
            // authentication check/retrival
            return $next($request);
        }
        throw new AuthenticationException();
    }
}
