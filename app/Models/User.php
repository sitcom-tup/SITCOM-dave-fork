<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Resources\CoordinatorProfileResource;
use App\Http\Resources\SupervisorProfileResource;
use App\Http\Resources\StudentProfileResource;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\Coordinator;
use App\Models\Supervisor;
use App\Models\Student;

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
        return $this->hasOne(Supervisor::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function userPool()
    {
        return $this->belongsTo(UserPool::class);
    }

    public function columnCards()
    {
        return $this->hasMany(ColumnCard::class);
    }

    public function userRole()
    {
        switch ($this->role) {
            case 1:
                return 'guest';
            case 2:
                return 'admin';
            case 3:
                return 'student';
            case 4:
                return 'coordinator';
            case 5:
                return 'supervisor';
            default:
                return null;
        }
    }

    public function userRoleProfile()
    {
        switch ($this->role) {
            case 1:
                return 'guest';
            case 2:
                return 'admin';
            case 3:
                return new StudentProfileResource(Student::with(['user','course'])->where('user_id',$this->id)->first());
            case 4:
                return new CoordinatorProfileResource(Coordinator::with(['user','department'])->where('user_id',$this->id)->first());
            case 5:
                return new SupervisorProfileResource(Supervisor::with(['user','company'])->where('user_id',$this->id)->first());
            default:
                return null;
        }
    }
}
