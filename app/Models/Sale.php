<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'shipping_cost',
    ];

    /**
     * Get the order that owns the sale.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product associated with the sale.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
