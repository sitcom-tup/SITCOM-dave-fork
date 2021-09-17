<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColumnCard extends Model
{
    use HasFactory;

    protected $with = ['user'];

    protected $guarded = [];

    public function boardColumn()
    {
        return $this->belongsTo(BoardColumn::class,'id', 'column_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
