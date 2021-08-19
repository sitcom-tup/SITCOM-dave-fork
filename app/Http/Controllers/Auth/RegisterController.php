<?php

namespace App\Http\Controllers\Auth;

use App\Http\Resources\StudentAuthResource;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class RegisterController extends Controller
{
    public function studentRegister(StoreStudentRequest $request, Student $student)
    {
        $user = $student->firstOrCreate($request->validated());
        if($user)
        {
            $token = $user->createToken($request->email, ['student'])->accessToken;
            $user->setToken($token);
            $user->save();
            return new StudentAuthResource($user);
        }
        return '';
    }
}
