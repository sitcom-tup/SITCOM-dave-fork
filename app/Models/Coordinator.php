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

    // public function course()
    // {
    //     return $this->belongsTo(Course::class);
    // }

    public function getAuthPassword()
    {
        return $this->coor_password;
    }

    public function getAuthCoordinator()
    {
        return $this->find(auth()->guard('coordinator')->user()->id)->first();
    }

    public function getFullName()
    {
        return "$this->coor_fname $this->coor_lname";
    }
}
