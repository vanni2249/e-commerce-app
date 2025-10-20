<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ['session_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
