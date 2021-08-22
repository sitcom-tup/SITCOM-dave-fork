<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Supervisor extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $guard = 'supervisor';

    protected $guarded = [];

//    Eager loading by default 
    protected $with = ['company'];

    protected $hidden = [
        'supervisor_password',
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

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getAuthPassword()
    {
        return $this->supervisor_password;
    }

    public function getAuthSupervisor()
    {
        return $this->find(auth()->guard('supervisor')->user()->id);
    }

    public function getFullName()
    {
        return "$this->supervisor_fname $this->supervisor_lname";
    }
}
