<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'item_id',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
