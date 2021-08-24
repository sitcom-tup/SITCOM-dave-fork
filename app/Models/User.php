<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['*'];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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

    public function getAuthPassword()
    {
        return $this->password;
    }

    // session guard only 
    public function getAuthUser()
    {
        return $this->find(auth()->user()->id);
    }

    public function getFullName()
    {
        return "$this->fname $this->lname";
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function coordinator()
    {
        return $this->hasOne(Coordinator::class);
    }

    public function supervisor()
    {
        return $this->hasOne(Suprvisor::class);
    }
}
