<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
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
