<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fulfillment extends Model
{
    use HasTranslations;

    public array $translatable = ['name', 'description'];
    protected $fillable = [
        'name',
        'description',
    ];

    public function sellers()
    {
        return $this->belongsToMany(Seller::class, 'fulfillment_seller', 'fulfillment_id', 'seller_id')->withPivot('is_active')->withTimestamps();
    }
}
