<?php

namespace App\Traits;

use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Str;


trait UserUlid
{
    /**
     * Create a registration code for the user.
     *
     * @return string
     */
    public function createUserUlid()
    {
        do {
            $number = $this->generateUserUlid();
        } while (!$this->isUserUlidUnique($number));
        return $number;
    }
    /**
     * Generate a unique registration code.
     *
     * @return string
     */
    public function generateUserUlid()
    {
        return (string) Str::ulid();
    }

    // Verify if the code is unique
    public function isUserUlidUnique($number)
    {
        return !User::where('ulid', $number)->exists();
    }
}
