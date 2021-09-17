<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['user'];

    public function board()
    {
        return $this->belongsTo(Board::class,'id', 'board_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
