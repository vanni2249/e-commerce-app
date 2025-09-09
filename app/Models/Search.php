<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $fillable = [
        'search',
        'user_id',
        'ip_address',
        'user_agent',
    ];
}
