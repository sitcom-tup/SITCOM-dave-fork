<?php

namespace App\Services;
use Auth;
use Str;

class AuthService 
{
    // Verify the credentials of user 
    private function loginAuthVerify($request, $guard) 
    {
        //can use email or tup  id 
        $username = $guard;
        
        if(Str::is('TUPT*',$request[0]))
        {
            $username = $username.'_tup_id';
        } 
        
        if(filter_var($request[0], FILTER_VALIDATE_EMAIL))
        {
            $username = $username.'_email';
        }        
        
        return Auth::guard($guard)->attempt([$username => $request[0], 'password' => $request[1]],true);
    }

    public function isAuthorized($request, $guard) 
    {
        return $this->loginAuthVerify($request,$guard);
    }
}

        