<?php

namespace App\Traits;

use App\Models\Claim;
use Illuminate\Support\Str;


trait ClaimNumber
{
    /**
     * Create a registration code for the user.
     *
     * @return string
     */
    public function createClaimNumber()
    {
        do {
            $number = $this->generateClaimNumber();
        } while (!$this->isClaimNumberUnique($number));
        return $number;
    }
    /**
     * Generate a unique registration code.
     *
     * @return string
     */
    public function generateClaimNumber()
    {
        return 'CL-' . Str::upper(Str::random(6)); // Already returns a mix of numbers and letters
    }

    // Verify if the code is unique
    public function isClaimNumberUnique($number)
    {
        return !Claim::where('number', $number)->exists();
    }
}
