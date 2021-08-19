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

    public function department()
    {
        return $this->belongsTo(Department::class);
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
