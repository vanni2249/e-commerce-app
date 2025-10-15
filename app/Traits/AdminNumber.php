<?php

namespace App\Traits;

use App\Models\Admin;
use Illuminate\Support\Str;


trait AdminNumber
{
    /**
     * Create a registration code for the Admin.
     *
     * @return string
     */
    public function createAdminNumber()
    {
        do {
            $number = $this->generateAdminNumber();
        } while (!$this->isAdminNumberUnique($number));
        return $number;
    }
    /**
     * Generate a unique registration code.
     *
     * @return string
     */
    public function generateAdminNumber()
    {
        return 'ADM-' . Str::upper(Str::random(6)); // Already returns a mix of numbers and letters
    }

    // Verify if the code is unique
    public function isAdminNumberUnique($number)
    {
        return !Admin::where('number', $number)->exists();
    }
}
