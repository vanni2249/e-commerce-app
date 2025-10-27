<?php

namespace App\Traits;

use App\Models\Item;
use Illuminate\Support\Str;


trait ItemUlid
{
    /**
     * Create a registration code for the user.
     *
     * @return string
     */
    public function createItemUlid()
    {
        do {
            $number = $this->generateItemUlid();
        } while (!$this->isItemUlidUnique($number));
        return $number;
    }
    /**
     * Generate a unique registration code.
     *
     * @return string
     */
    public function generateItemUlid()
    {
        return (string) Str::ulid();
    }

    // Verify if the code is unique
    public function isItemUlidUnique($number)
    {
        return !Item::where('ulid', $number)->exists();
    }
}
