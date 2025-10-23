<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FulfillmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                "abbreviation" => "fbz",
                "name" => [
                    "en" => "Fulfillment by Zierra",
                    "es" => "Cumplimiento por Zierra"
                ],
                "description" => [
                    "en" => "Fulfillment services provided by Zierra",
                    "es" => "Servicios de cumplimiento proporcionados por Zierra"
                ]
            ],
            [
                "abbreviation" => "fbs",
                "name" => [
                    "en" => "Fulfillment by Seller",
                    "es" => "Cumplimiento por el Vendedor"
                ],
                "description" => [
                    "en" => "Fulfillment services provided by the seller",
                    "es" => "Servicios de cumplimiento proporcionados por el vendedor"
                ]
            ],

        ];

        foreach ($items as $item) {
            \App\Models\Fulfillment::create($item);
        }
    }
}
