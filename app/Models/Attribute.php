<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'en_name',
        'es_name',
    ];
    
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
