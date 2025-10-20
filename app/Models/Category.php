<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;

    public array $translatable = ['name'];
    protected $fillable = ['name', 'slug', 'category_id', 'is_active'];

    
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
