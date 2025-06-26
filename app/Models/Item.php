<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $fillable = [
        'seller_id',
        'category_id',
        'title',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
