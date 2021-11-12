<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Coordinator extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $guard = 'coordinator';

    protected $guarded = [];

    protected $hidden = [
        'coordinator_password',
        'remember_token',
    ];

    protected $with = ['user','department','course'];

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

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function interns()
    {
        return $this->hasMany(Intern::class);
    }

    public function getAuthPassword()
    {
        return $this->coordinator_password;
    }

    public function getAuthCoordinator()
    {
        return $this->find(auth()->guard('coordinator')->user()->id);
    }

    public function getFullName()
    {
        return "$this->coordinator_fname $this->coordinator_lname";
    }
}
