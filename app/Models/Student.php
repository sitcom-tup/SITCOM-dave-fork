<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Student extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $guard = 'student';

    protected $fillable = ['*'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    private $token;

    public function setToken($token)
    {
        return $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getAuthPassword()
    {
        return $this->student_password;
    }

    // session only 
    public function getAuthStudent()
    {
        return $this->find(auth()->guard('student')->user()->id)->first();
    }

    public function getFullName()
    {
        return "$this->student_fname $this->student_lname";
    }
}
