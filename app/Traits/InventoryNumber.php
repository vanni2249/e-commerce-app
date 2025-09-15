<?php

namespace App\Traits;

use App\Models\Inventory;
use Illuminate\Support\Str;


trait InventoryNumber
{
    /**
     * Create a registration code for the user.
     *
     * @return string
     */
    public function createInventoryNumber()
    {
        do {
            $number = $this->generateInventoryNumber();
        } while (!$this->isNumberUnique($number));
        return $number;
    }
    /**
     * Generate a unique registration code.
     *
     * @return string
     */
    public function generateInventoryNumber()
    {
        return 'INV-' . Str::upper(Str::random(6)); // Already returns a mix of numbers and letters
    }

    // Verify if the code is unique
    public function isNumberUnique($number)
    {
        return !Inventory::where('number', $number)->exists();
    }
}
