<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Announcement extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d',
    // ];

    public function coordinator()
    {
        return $this->belongsTo(Coordinator::class);
    }

    // public function getOnlyForStudent($course)
    // {
    //     return $this->whereCourses($course);
    //     // return $this->where('department_id', $deptCourse->department_id);
    // }

    public function getPostedDateFormat()
    {
        return Carbon::parse($this->posted_at)->format('Y-m-d');
    }

    public function getCreatedDateFormat()
    {
        return Carbon::parse($this->created_at)->format('h:i A');
    }

    public function getUpdatedDateFormat()
    {
        return Carbon::parse($this->updated_at)->format('h:i A');
    }

}
