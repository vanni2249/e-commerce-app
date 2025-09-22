<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Traits\SaleNumber;

class SaleSeeder extends Seeder
{
    use SaleNumber;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (\App\Models\Order::all() as $order) {
            for ($i = 0; $i < rand(1, 5); $i++) {
                // Create multiple sales records for each order
                // Random quantity between 1 and 3
                // Random price between 10.0 and 100.0
                $order->sales()->create([
                    'id' => \Illuminate\Support\Str::uuid(),
                    'number' => $this->createSaleNumber(),
                    'product_id' => \App\Models\Product::inRandomOrder()->first()->id,
                    'quantity' => rand(1, 3),
                    'price' => rand(100, 1000) / 10, // Random price between 10.0 and 100.0
                ]);
            }
        }
    }
}
