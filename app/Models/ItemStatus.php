<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ItemStatus extends Model
{
    use HasTranslations;
    
    protected $fillable = ['name', 'slug', 'variant'];

    public array $translatable = ['name'];
}
