<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'number',
        'user_id',
        'cart_id',
        'amount',
        'status',
        'payment_method',
        'transaction_id',
    ];

    /**
     * Get the user that owns the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the cart associated with the transaction.
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Get the order associated with the transaction.
     */
    public function order()
    {
        return $this->hasOne(Order::class);
    }

    /**
     * Get the sales associated with the transaction.
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
