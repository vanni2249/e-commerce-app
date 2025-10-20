<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;

    public array $translatable = ['name'];
    protected $fillable = [
        'name',
        'percentage',
        'is_active',
    ];

    /**
     * Get the items associated with the section.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

}
