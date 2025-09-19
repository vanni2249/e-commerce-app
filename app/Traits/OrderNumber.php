<?php

namespace App\Traits;

use App\Models\Order;
use Illuminate\Support\Str;


trait OrderNumber
{
    /**
     * Create a registration code for the user.
     *
     * @return string
     */
    public function createOrderNumber()
    {
        do {
            $number = $this->generateOrderNumber();
        } while (!$this->isOrderNumberUnique($number));
        return $number;
    }
    /**
     * Generate a unique registration code.
     *
     * @return string
     */
    public function generateOrderNumber()
    {
        return 'OR-' . Str::upper(Str::random(6)); // Already returns a mix of numbers and letters
    }

    // Verify if the code is unique
    public function isOrderNumberUnique($number)
    {
        return !Order::where('number', $number)->exists();
    }
}
