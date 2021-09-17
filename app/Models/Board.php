<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'id'; // or null

    public $incrementing = false;

    public function boardColumns()
    {
        return $this->hasMany(BoardColumn::class);
    }

    public function boardUsers()
    {
        return $this->hasMany(BoardUser::class);
    }

}
