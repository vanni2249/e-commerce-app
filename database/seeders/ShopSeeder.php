<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => [
                    'en' => 'Retail',
                    'es' => 'Al detalle',
                ],
                'description' => [
                    'en' => 'Products sold individually',
                    'es' => 'Productos vendidos individualmente',
                ],
            ],
            [
                'name' => [
                    'en' => 'Wholesale',
                    'es' => 'Venta al por mayor',
                ],
                'description' => [
                    'en' => 'Products sold in bulk quantities',
                    'es' => 'Productos vendidos en cantidades al por mayor',
                ],
            ],
            [
                'name' => [
                    'en' => 'Telemarketing',
                    'es' => 'Telemarketing',
                ],
                'description' => [
                    'en' => 'Products sold through telemarketing',
                    'es' => 'Productos vendidos a través de telemarketing',
                ],
            ],
        ];

        foreach ($items as $item) {
            \App\Models\Shop::create($item);
        }
    }
}
