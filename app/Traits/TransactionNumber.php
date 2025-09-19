<?php

namespace App\Traits;

use App\Models\Transaction;
use Illuminate\Support\Str;


trait TransactionNumber
{
    /**
     * Create a registration code for the user.
     *
     * @return string
     */
    public function createTransactionNumber()
    {
        do {
            $number = $this->generateTransactionNumber();
        } while (!$this->isTransactionNumberUnique($number));
        return $number;
    }
    /**
     * Generate a unique registration code.
     *
     * @return string
     */
    public function generateTransactionNumber()
    {
        return 'TRX-' . Str::upper(Str::random(6)); // Already returns a mix of numbers and letters
    }

    // Verify if the code is unique
    public function isTransactionNumberUnique($number)
    {
        return !Transaction::where('number', $number)->exists();
    }
}
