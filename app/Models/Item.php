<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    public $fillable = [
        'seller_id',
        'category_id',
        'title',
        'sku',
        'description',
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

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
}
