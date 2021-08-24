<?php

namespace App\Http\Controllers\Auth;

use App\Http\Resources\CoordinatorAuthResource;
use App\Http\Resources\SupervisorAuthResource;
use App\Http\Resources\StudentAuthResource;
use App\Http\Resources\AuthFailResource;
use App\Http\Resources\UserAuthResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Models\Coordinator;
use App\Models\Supervisor;
use App\Models\Student;
use App\Models\User;
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

    public function login(LoginRequest $request, User $user)
    {
        if($this->auth->isAuthorized([0=>$request->email,1=>$request->password], $request->role))
        {
            $userAuth = $user->getAuthUser();
            $userAuth->tokens()->where('name', $request->email)->delete();
            $token = $userAuth->createToken($request->email, [$request->role])->accessToken;
            $userAuth->setToken($token);
            return new UserAuthResource($userAuth);
        }

        return new AuthFailResource('users');
    }


    // public function studentLogin(LoginRequest $request, Student $student)
    // {     
    //     if($this->auth->isAuthorized([0=>$request->email,1=>$request->password],'student'))
    //     {
    //         $user =  $student->getAuthStudent();
    //         $user->tokens()->where('name', $request->email)->delete();
    //         $token = $user->createToken($request->email, ['student'])->accessToken;
    //         $user->setToken($token);
    //         return new StudentAuthResource($user);
    //     }

    //     return new AuthFailResource('students');
    // }


    // public function coordinatorLogin(LoginRequest $request, Coordinator $coordinator)
    // {     
    //     if($this->auth->isAuthorized([0=>$request->email,1=>$request->password],'coordinator'))
    //     {
    //         $user =  $coordinator->getAuthCoordinator();
    //         $user->tokens()->where('name', $request->email)->delete();
    //         $token = $user->createToken($request->email, ['coordinator'])->accessToken;
    //         $user->setToken($token);
    //         return new CoordinatorAuthResource($user);
    //     }

    //     return new AuthFailResource('coordinators');
    // }


    // public function supervisorLogin(LoginRequest $request, Supervisor $supervisor)
    // {     
    //     if($this->auth->isAuthorized([0=>$request->email,1=>$request->password],'supervisor'))
    //     {
    //         $user =  $supervisor->getAuthSupervisor();
    //         $user->tokens()->where('name', $request->email)->delete();
    //         $token = $user->createToken($request->email, ['supervisor'])->accessToken;
    //         $user->setToken($token);
    //         return new SupervisorAuthResource($user);
    //     }

    //     return new AuthFailResource('supervisors');
    // }


    // public function adminLogin(LoginRequest $request, User $user)
    // {     
    //     if($this->auth->isAuthorized([0=>$request->email,1=>$request->password],'admin'))
    //     {
    //         $admin =  $user->getAuthAdmin();
    //         $admin->tokens()->where('name', $request->email)->delete();
    //         $token = $admin->createToken($request->email, ['user'])->accessToken;
    //         $admin->setToken($token);
    //         return new UserAuthResource($admin);
    //     }

    //     return new AuthFailResource('users');
    // }
}
