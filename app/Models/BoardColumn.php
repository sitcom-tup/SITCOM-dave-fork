<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardColumn extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['columnCards'];

    public function board()
    {
        return $this->belongsTo(Board::class,'id', 'board_id');
    }

    public function columnCards()
    {
        return $this->hasMany(ColumnCard::class, 'column_id', 'id');
    }
}
