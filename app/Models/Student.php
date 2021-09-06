<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Student extends Authenticatable
{
    use \Znck\Eloquent\Traits\BelongsToThrough;
    use HasFactory, HasApiTokens, Notifiable;

    protected $guard = 'student';

    protected $guarded = [];

//  Eager loading by default
//  this is when you wanted to always load the related model
//  this basically loads student with course model
    protected $with = ['user','course']; 

    protected $hidden = [
        'student_password',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
//  Access only course and if you wanted department to this course->department
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
//  Directly access Student department through this relationship
    public function courseDepartment()
    {
        return $this->belongsToThrough(Department::class,Course::class);
    }

    public function intern()
    {
        return $this->hasOne(Intern::class);
    }

    public function timeRecords()
    {
        return $this->belongsToMany(TimeRecord::class);
    }

    public function getAuthPassword()
    {
        return $this->student_password;
    }

    // session only 
    public function getAuthStudent()
    {
        return $this->find(auth()->guard('student')->user()->id);
    }

    public function getFullName()
    {
        return "$this->student_fname $this->student_lname";
    }
}
