<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Shop extends Model
{
    use HasTranslations;

    public array $translatable = ['name', 'description'];
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    public function sellers()
    {
        return $this->belongsToMany(Seller::class, 'seller_shop', 'shop_id', 'seller_id')->withPivot('is_active')->withTimestamps();
    }
}
