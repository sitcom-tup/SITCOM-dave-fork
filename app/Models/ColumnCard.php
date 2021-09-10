<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColumnCard extends Model
{
    use HasFactory;

    public function boardColumn()
    {
        return $this->belongsTo(BoardColumn::class,'id', 'column_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }
}
