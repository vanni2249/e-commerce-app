<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'transaction_id',
        'cart_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
