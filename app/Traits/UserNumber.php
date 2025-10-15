<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Str;


trait UserNumber
{
    /**
     * Create a registration code for the user.
     *
     * @return string
     */
    public function createUserNumber()
    {
        do {
            $number = $this->generateUserNumber();
        } while (!$this->isUserNumberUnique($number));
        return $number;
    }
    /**
     * Generate a unique registration code.
     *
     * @return string
     */
    public function generateUserNumber()
    {
        return 'USR-' . Str::upper(Str::random(6)); // Already returns a mix of numbers and letters
    }

    // Verify if the code is unique
    public function isUserNumberUnique($number)
    {
        return !User::where('number', $number)->exists();
    }
}
