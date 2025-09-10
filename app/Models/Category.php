<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['en_name', 'es_name', 'category_id'];

    
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
