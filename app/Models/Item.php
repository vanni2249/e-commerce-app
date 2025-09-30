<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasUlids;
    protected $fillable = [
        'type',
        'number',
        'seller_id',
        'section_id',
        'en_title',
        'es_title',
        'en_short_description',
        'es_short_description',
        'en_description',
        'es_description',
        'en_specifications',
        'es_specifications',
        'en_shipping_policy',
        'es_shipping_policy',
        'en_return_policy',
        'es_return_policy',
        'is_active',
        'approved_by',
        'approved_at',
        'available_at',
        'sku',
    ];

    protected $casts = [
        'en_specifications' => 'array',
        'es_specifications' => 'array',
    ];

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function approvedBy()
    {
        return $this->belongsTo(Admin::class, 'approved_by');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Favorite::class, 'favorite_item')->withTimestamps();
    }

    public function scopeShow($query)
    {
        return $query->whereNotNull('approved_at')
            ->whereNotNull('available_at')
            ->where('is_active', true)
            ->whereNull('deleted_at')
            ->inRandomOrder();
    }

}
