<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Carbon\Carbon;
=======
>>>>>>> ea01e6c (schedule and time record table | factory not finished yet)

class TimeRecord extends Model
{
    use HasFactory;

<<<<<<< HEAD
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

    public function scopeStoreHoursWorked($query,$request)
    {
        if($request['time_out'] == '00:00:00' || $request['time_out'] == null)
        {
            return 0;
        }
        $in = Carbon::parse($request['time_in']);
        $out = Carbon::parse($request['time_out']);
        
        return $out->diffInHours($in);
    }

    public function getPartialHoursWorked()
    {
        $in = Carbon::createFromFormat('Y-m-d H:i:s',$this->date.$this->time_in);

        if($this->time_out == '00:00:00' || $this->time_out == null || $this->time_out >= '23:59:59')
        {   
            $out = Carbon::parse(now());
        }else
        {
            $out = Carbon::createFromFormat('Y-m-d H:i:s',$this->date.$this->time_out);
        }
        
        $hours = $in->diffInHours($out);
        $minutes = $in->diffInMinutes($out);

        return $hours.' hours '.strval($minutes - $hours * 60).' minutes';
    }

    public function getHoursWorked()
    {
        if($this->status == 3 || $this->time_out == '00:00:00' || $this->time_out == null)
        {
            return  strval($this->hours_worked);
        }

        $in = Carbon::parse($this->time_in);
        $out = Carbon::parse($this->time_out);

        $hours = $in->diffInHours($out);
        $minutes = $in->diffInMinutes($out);
        // return Carbon::createFromTime($hours,$minutes - $hours * 60 ,0)->format('h:i:s');
        return $hours.' hours '.strval($minutes - $hours * 60).' minutes';
=======
    public function student()
    {
        return $this->hasOne(Student::class);
>>>>>>> ea01e6c (schedule and time record table | factory not finished yet)
    }
}
