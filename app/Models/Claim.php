<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasUlids;
    
    protected $fillable = [
        'id',
        'number',
        'user_id',
        'claimable_id',
        'claimable_type',
        'claim_category_id',
        'status', // e.g., pending, approved, rejected
        'comments',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function claimable()
    {
        return $this->morphTo();
    }
}
