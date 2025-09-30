<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'is_default',
        'is_active',
    ];


    public function items()
    {
        return $this->belongsToMany(Item::class, 'favorite_item')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
