<?php

namespace App\Traits;

trait CreateItemNumber
{
    /**
     * Generate a unique item number.
     *
     * @param string $prefix
     * @return string
     */
    public function generateItemNumber(string $prefix = 'ITEM'): string
    {
        $timestamp = now()->format('YmdHis');
        $random = strtoupper(substr(md5(uniqid((string)mt_rand(), true)), 0, 6));
        return "{$prefix}-{$timestamp}-{$random}";
    }
}