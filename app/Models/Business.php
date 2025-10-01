<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'business_category_id',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
