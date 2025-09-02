<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    public $fillable = [
        'seller_id',
        'section_id',
        'en_title',
        'es_title',
        'en_short_description',
        'es_short_description',
        'en_description',
        'es_description',
        'en_specifications',
        'es_specifications',
        'en_shipping_policy',
        'es_shipping_policy',
        'en_return_policy',
        'es_return_policy',
        'sku',
    ];

    public function seller() :BelongsTo
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
}
