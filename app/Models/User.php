<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Billable;
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'number',
        'name',
        'email',
        'phone',
        'password',
        'language',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function business()
    {
        return $this->hasOne(Business::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class)->where('is_default', true);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function seller()
    {
        return $this->hasOne(Seller::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0];
    }

    public function getInitialName()
    {
        $names = explode(' ', $this->name);
        $initials = '';
        foreach (array_slice($names, 0, 2) as $name) {
            if (strlen($name) > 0) {
            $initials .= strtoupper($name[0]);
            }
        }
        return $initials;
    }
}
