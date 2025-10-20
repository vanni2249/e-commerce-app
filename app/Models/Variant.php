<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Variant extends Model
{
     use HasTranslations;

    public array $translatable = ['name'];
    protected $fillable = [
        'item_id',
        'attribute_id',
        'name',
        'value',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'variant_product', 'variant_id', 'product_id');
    }
}
