<?php

namespace App\Traits;

use App\Models\Product;
use Illuminate\Support\Str;


trait ProductNumber
{
    /**
     * Create a registration code for the user.
     *
     * @return string
     */
    public function createProductNumber()
    {
        do {
            $number = $this->generateProductNumber();
        } while (!$this->isNumberUnique($number));
        return $number;
    }
    /**
     * Generate a unique registration code.
     *
     * @return string
     */
    public function generateProductNumber()
    {
        return 'PR-' . Str::upper(Str::random(6)); // Already returns a mix of numbers and letters
    }

    // Verify if the code is unique
    public function isNumberUnique($number)
    {
        return !Product::where('number', $number)->exists();
    }
}
