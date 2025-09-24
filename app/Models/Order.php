<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasUlids;

    protected $fillable = [
        'id',
        'number',
        'user_id',
        'transaction_id',
        'cart_id',
        'address_id',
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

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function claims()
    {
        return $this->morphMany(Claim::class, 'claimable');
    }

    public function claim()
    {
        return $this->morphOne(Claim::class, 'claimable');
    }
}
