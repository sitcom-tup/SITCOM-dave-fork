<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeRecord extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function scopeCheckIfExists($query,$request)
    {
        return $query->where('student_id', $request['student_id'])
                    ->where('date', $request['date']);
    }

    public function getStatusName()
    {
        switch ($this->status) {
            case 0:
                return 'On-time';
            case 1:
                return 'Late';
            case 2:
                return 'Excused';
            case 3:
                return 'Absent';
            default:
                break;
        }
    }
}
