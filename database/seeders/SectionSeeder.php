<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Accessories', 'percentage' => 14.00, 'is_active' => true],
            ['name' => 'Automotive', 'percentage' => 18.00, 'is_active' => true],
            ['name' => 'Beauty', 'percentage' => 8.00, 'is_active' => true],
            ['name' => 'Beverages', 'percentage' => 5.50, 'is_active' => true],
            ['name' => 'Books', 'percentage' => 20.00, 'is_active' => true],
            ['name' => 'Chemicals', 'percentage' => 15.00, 'is_active' => true],
            ['name' => 'Clothing', 'percentage' => 5.00, 'is_active' => true],
            ['name' => 'Cosmetics', 'percentage' => 12.00, 'is_active' => true],
            ['name' => 'Electronics', 'percentage' => 10.00, 'is_active' => true],
            ['name' => 'Footwear', 'percentage' => 11.00, 'is_active' => true],
            ['name' => 'Furniture', 'percentage' => 25.00, 'is_active' => true],
            ['name' => 'Gardening', 'percentage' => 13.00, 'is_active' => true],
            ['name' => 'Groceries', 'percentage' => 7.50, 'is_active' => true],
            ['name' => 'Health', 'percentage' => 9.00, 'is_active' => true],
            ['name' => 'Home Appliances', 'percentage' => 22.50, 'is_active' => true],
            ['name' => 'Jewelry', 'percentage' => 18.50, 'is_active' => true],
            ['name' => 'Sports', 'percentage' => 12.50, 'is_active' => true],
            ['name' => 'Stationery', 'percentage' => 6.00, 'is_active' => true],
            ['name' => 'Toys', 'percentage' => 30.00, 'is_active' => true],
            ['name' => 'Watches', 'percentage' => 16.00, 'is_active' => true],
            ['name' => 'Wellness', 'percentage' => 14.50, 'is_active' => true],
        ];

        Section::insert($items);
    }
}
