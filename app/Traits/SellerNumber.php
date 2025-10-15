<?php

namespace App\Traits;

use App\Models\Seller;
use Illuminate\Support\Str;


trait SellerNumber
{
    /**
     * Create a registration code for the user.
     *
     * @return string
     */
    public function createSellerNumber()
    {
        do {
            $number = $this->generateSellerNumber();
        } while (!$this->isSellerNumberUnique($number));
        return $number;
    }
    /**
     * Generate a unique registration code.
     *
     * @return string
     */
    public function generateSellerNumber()
    {
        return 'SELL-' . Str::upper(Str::random(6)); // Already returns a mix of numbers and letters
    }

    // Verify if the code is unique
    public function isSellerNumberUnique($number)
    {
        return !Seller::where('number', $number)->exists();
    }
}
