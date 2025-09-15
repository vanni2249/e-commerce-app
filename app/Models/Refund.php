<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    protected $fillable = [
        'sale_id',
        'quantity',
        'reason',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->sale->product();
    }

    public function item()
    {
        return $this->product->item();
    }

    
}
