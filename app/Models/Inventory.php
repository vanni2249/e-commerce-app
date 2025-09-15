<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'product_id',
        'number',
        'initial_quantity',
        'quantity',
        'price',
        'created_seller_id',
        'create_admin_id',
        'received_at',
        'received_by',
        'status',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'created_seller_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'create_admin_id');
    }

    public function received()
    {
        return $this->belongsTo(Admin::class, 'received_by');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }
}
