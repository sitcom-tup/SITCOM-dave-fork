<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $with = ['department'];

    public function students() 
    {
        return $this->hasMany(Student::class);
    }

    public function coordinators()
    {
        return $this->hasMany(Coordinator::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
