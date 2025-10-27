<?php

namespace App\Traits;

use App\Models\Item;
use Illuminate\Support\Str;


trait ItemNumber
{
    /**
     * Create a registration code for the user.
     *
     * @return string
     */
    public function createItemNumber()
    {
        do {
            $number = $this->generateItemNumber();
        } while (!$this->isNumberUnique($number));
        return $number;
    }
    /**
     * Generate a unique registration code.
     *
     * @return string
     */
    public function generateItemNumber()
    {
        return 'IT-' . Str::upper(Str::random(6)); // Already returns a mix of numbers and letters
    }

    // Verify if the code is unique
    public function isNumberUnique($number)
    {
        return !Item::where('number', $number)->exists();
    }
}
