<?php

namespace App\Traits;

use App\Models\Admin;
use App\Models\Item;
use Illuminate\Support\Str;


trait AdminUlid
{
    /**
     * Create a registration code for the user.
     *
     * @return string
     */
    public function createAdminUlid()
    {
        do {
            $number = $this->generateAdminUlid();
        } while (!$this->isAdminUlidUnique($number));
        return $number;
    }
    /**
     * Generate a unique registration code.
     *
     * @return string
     */
    public function generateAdminUlid()
    {
        return (string) Str::ulid();
    }

    // Verify if the code is unique
    public function isAdminUlidUnique($number)
    {
        return !Admin::where('ulid', $number)->exists();
    }
}
