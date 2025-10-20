<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Traits\InventoryNumber;

class InventorySeeder extends Seeder
{ 
    use InventoryNumber;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (\App\Models\Product::all() as $product) {
            for ($i = 0; $i < 1; $i++) {
                $quantity = rand(1, 100);
                $product->inventories()->create([
                    'number' => $this->createInventoryNumber(),
                    'initial_quantity' => $quantity,
                    'quantity' => $quantity,
                    'price' => rand(100, 1000) / 10, // Random price between 10.0 and 100.0
                    'created_seller_id' => $product->item->seller_id ?? null,
                    'create_admin_id' => $product->item->seller_id ? null : 1,
                    'received_at' => now(),
                    'received_by' => 1,
                    'status' => 'received',
                ]);
            }
        }
    }
}
