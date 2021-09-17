<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getOpenedAndVerified()
    {
        return $this->where('status', 1)->whereNotNull('verified_at');
    }

    public function getOrFail($id)
    {
        return $this->getOpenedAndVerified()->where('id', $id)->firstOrFail();
    }
}
