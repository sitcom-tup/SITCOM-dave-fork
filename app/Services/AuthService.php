<?php

namespace App\Services;

use App\Models\Student;
use App\Models\User;
use Auth;
use Str;

class AuthService 
{
    // Verify the credentials of user 
    private function loginAuthVerify($request, $guard) 
    {
        //can use email or tup  id 
        // $username = $guard;
        $username = '';

        if(Str::is('TUPT*',$request[0]))
        {
            if($guard === "student")
            {
                if($stu = Student::where('student_tup_id', $request[0])->first())
                {   
                    $username = 'email';
                    $request[0] = User::find($stu->user_id)->email;
                }
            }
        }
        
        if(filter_var($request[0], FILTER_VALIDATE_EMAIL))
        {
            $username = 'email';
        }

        if($username === '')
        {
            $username = 'email';
        }
        
        return Auth::attempt([$username => $request[0], 'password' => $request[1]],true);
    }

    // // Verify the credentials of user 
    // private function loginAuthVerify($request, $guard) 
    // {
    //     //can use email or tup  id 
    //     // $username = $guard;
    //     $username = '';

    //     if(Str::is('TUPT*',$request[0]) || $guard === "students" || $guard === "coordinators")
    //     {
    //         $username = $guard.'_tup_id';
    //     }
        
    //     if(filter_var($request[0], FILTER_VALIDATE_EMAIL))
    //     {
    //         $username = $guard.'_email';
    //     }

    //     if($username === '')
    //     {
    //         $username = $guard.'_email';
    //     }
        
    //     return Auth::guard($guard)->attempt([$username => $request[0], 'password' => $request[1]],true);
    // }

    public function isAuthorized($request, $guard) 
    {
        return $this->loginAuthVerify($request,$guard);
    }

    public function mapToNewName($role,$request)
    {
        $newRequest = [];
        foreach ($request as $key => $value) {
            $this->ifHasAnyId($key) ? $newRequest[$key] = $value : $newRequest[$role.'_'.$key] = $value;   
        }
        return $newRequest;
    }

    public function ifHasAnyId($name)
    {
        return $name === 'course_id' || $name === 'department_id' || $name === 'company_id' || $name === 'user_id';
    }

    public function isAllowed($roles = [])
    {
        $user = auth()->user()->role;

        if(in_array($user,$roles))
        {
            return true;
        }
        return false;
    }

    // public function isVerified($request,$guard)
    // {
    //     if($this->loginAuthVerify($request,$guard))
    //     {
    //         if(auth()->user()->email_verified_at == null)
    //         {
    //             return true;
    //         }
    //     }
    // }
}

        