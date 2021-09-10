<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardColumn extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function board()
    {
        return $this->belongsTo(Board::class,'id', 'board_id');
    }

    public function columnCards()
    {
        return $this->hasMany(ColumnCards::class, 'column_id', 'id');
    }
}
