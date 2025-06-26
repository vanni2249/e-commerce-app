<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (\App\Models\Product::all() as $product) {
            for ($i = 0; $i < rand(1, 5); $i++) {
                // Create multiple inventory records for each product
                // Random quantity between 1 and 100
                // Random price between 10.0 and 100.0
                $product->inventories()->create([
                    'quantity' => rand(1, 100),
                    'price' => rand(100, 1000) / 10, // Random price between 10.0 and 100.0
                ]);
            }
        }
    }
}
