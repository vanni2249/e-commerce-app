<?php

namespace App\Traits;

use App\Models\Sale;
use Illuminate\Support\Str;


trait SaleNumber
{
    /**
     * Create a registration code for the user.
     *
     * @return string
     */
    public function createSaleNumber()
    {
        do {
            $number = $this->generateSaleNumber();
        } while (!$this->isNumberUnique($number));
        return $number;
    }
    /**
     * Generate a unique registration code.
     *
     * @return string
     */
    public function generateSaleNumber()
    {
        return 'SL-' . Str::upper(Str::random(6)); // Already returns a mix of numbers and letters
    }

    // Verify if the code is unique
    public function isNumberUnique($number)
    {
        return !Sale::where('number', $number)->exists();
    }
}
