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

    public function variants()
    {
        return $this->belongsToMany(Variant::class, 'variant_product', 'product_id', 'variant_id');
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
    
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function sumSales()
    {
        return $this->sales()->sum('quantity');
    }

    public function sumInventories()
    {
        return $this->inventories()->sum('quantity');
    }

    public function stock()
    {
        return $this->sumInventories() - $this->sumSales();
    }
}
