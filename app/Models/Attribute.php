<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Attribute extends Model
{
     use HasTranslations;

    public array $translatable = ['name'];
    protected $fillable = [
        'name',
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
