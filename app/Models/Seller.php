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
        'is_vacation_mode',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function items()
    {
        return $this->hasMany(Item::class, 'seller_id');
    }
}
