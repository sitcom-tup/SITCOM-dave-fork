<?php

namespace App\Http\Controllers\Auth;

use App\Http\Resources\CoordinatorAuthResource;
use App\Http\Resources\SupervisorAuthResource;
use App\Http\Requests\StoreCoordinatorRequest;
use App\Http\Requests\StoreSupervisorRequest;
use App\Http\Resources\StudentAuthResource;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Models\Coordinator;
use App\Models\Supervisor;
use App\Models\Student;
use Hash;

class RegisterController extends Controller
{

    protected $auth;

    public function __construct()
    {
        $this->auth = new AuthService();
    }

    public function studentRegister(StoreStudentRequest $request, Student $student)
    {
        $request['password'] = Hash::make($request['password']);
        $user = $student->firstOrCreate($this->auth->mapToNewName('student',$request->except('password_confirmation')));
        if($user)
        {
            $token = $user->createToken($request->email, ['student'])->accessToken;
            $user->setToken($token);
            $user->save();
            return new StudentAuthResource($user);
        }
        return '';
    }

    public function coordinatorRegister(StoreCoordinatorRequest $request, Coordinator $coordinator)
    {
        $request['password'] = Hash::make($request['password']);
        $user = $coordinator->firstOrCreate($this->auth->mapToNewName('coordinator',$request->except('password_confirmation')));
        if($user)
        {
            $token = $user->createToken($request->email,['coordinator'])->accessToken;
            $user->setToken($token);
            $user->save();
            return new CoordinatorAuthResource($user);
        }
        return '';
    }

    public function supervisorRegister(StoreSupervisorRequest $request, Supervisor $supervisor)
    {
        $request['password'] = Hash::make($request['password']);
        $user = $supervisor->firstOrCreate($this->auth->mapToNewName('supervisor',$request->except('password_confirmation')));
        if($user)
        {
            $token = $user->createToken($request->email,['supervisor'])->accessToken;
            $user->setToken($token);
            $user->save();
            return new SupervisorAuthResource($user);
        }
        return '';
    }

    // public function adminRegister(StoreSupervisorRequest $request, Supervisor $supervisor)
    // {
    //     $user = $supervisor->firstOrCreate($this->auth->mapToNewName('supervisor',$request->validated()));
    //     if($user)
    //     {
    //         $token = $user->createToken($request->email,['supervisor'])->accessToken;
    //         $user->setToken($token);
    //         $user->save();
    //         return new SupervisorAuthResource($user);
    //     }
    //     return '';
    // }
}
