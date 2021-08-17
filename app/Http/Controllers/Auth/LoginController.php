<?php

namespace App\Http\Controllers\Auth;

use App\Http\Resources\CoordinatorAuthResource;
use App\Http\Resources\StudentAuthResource;
use App\Http\Resources\AuthFailResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Models\Student;
use Response;
use Auth;
use Hash;

class LoginController extends Controller
{

    protected $auth;

    public function __construct()
    {
        $this->auth = new AuthService();
    }

    public function studentLogin(LoginRequest $request, Student $student)
    {     
        if($this->auth->isAuthorized([0=>$request->email,1=>$request->password],'student'))
        {
            $user =  $student->getAuthStudent();

            $user->tokens()->where('name', $request->email)->delete();
            $token = $user->createToken($request->email, ['student'])->accessToken;
            return (new StudentAuthResource($user))->additional(['meta'=>['token' => $token]]);
        }

        return new AuthFailResource('student');
    }


    public function coordinatorLogin(LoginRequest $request, Coordinator $coordinator)
    {     
        if($this->auth->isAuthorized($request->validated(),'coordinator'))
        {
            $user =  $coordinator->getAuthCoordinator();

            $user->tokens()->where('name', $request->email)->delete();
            $token = $user->createToken($request->email, ['coordinator'])->accessToken;
            return (new CoordinatorAuthResource($user))->additional(['meta'=>['token' => $token]]);
        }

        return new AuthFailResource('coordinator');
    }
}
