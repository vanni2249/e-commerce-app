<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Item::all() as $key => $item) {
            $item->products()->create([
                'item_id' => $item->id,
                'price' => rand(100, 1000) / 10, // Random price between 10.0 and 100.0
                'shipping_cost' => rand(0, 29) / 10, // Random shipping cost between 0.0 and 2.5
            ]);
        }
    }
}
