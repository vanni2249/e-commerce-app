<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingLog extends Model
{
    protected $fillable = [
        'order_id',
        'status',
        'comments',
    ];
}
