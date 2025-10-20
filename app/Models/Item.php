<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Item extends Model
{
    use HasFactory;
    use HasUlids;

    use HasTranslations;

    public array $translatable = ['title', 'description', 'shipping_policy', 'return_policy'];
    protected $fillable = [
        'type',
        'number',
        'seller_id',
        'section_id',
        'title',
        'description',
        'shipping_policy',
        'return_policy',
        'is_active',
        'approved_by',
        'approved_at',
        'available_at',
        'sku',
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

    public function scopeShowAccepted($query)
    {
        return $query->whereNotNull('approved_at')
            ->whereNotNull('available_at')
            ->where('is_active', true)
            ->whereNull('deleted_at')
            ->inRandomOrder();
    }

}
