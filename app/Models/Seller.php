<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = [
        'user_id',
        'store_name',
        'store_description',
        'contact_email',
        'contact_phone',
        'is_active',
        'is_verified',
        'verified_at',
        'verified_by',
        'is_vacation_mode',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function verifiedBy()
    {
        return $this->belongsTo(Admin::class, 'verified_by');
    }
    
    public function items()
    {
        return $this->hasMany(Item::class, 'seller_id');
    }

    public function shops()
    {
        return $this->belongsToMany(Shop::class, 'seller_shop', 'seller_id', 'shop_id')->withPivot('is_active')->withTimestamps();
    }

    public function fulfillments()
    {
        return $this->belongsToMany(Fulfillment::class, 'fulfillment_seller', 'seller_id', 'fulfillment_id')->withPivot('is_active')->withTimestamps();
    }
}
