<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    protected $fillable = [
        'ip_address',
        'user_agent',
        'city',
        'region',
        'country',
        'postal',
        'timezone',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
