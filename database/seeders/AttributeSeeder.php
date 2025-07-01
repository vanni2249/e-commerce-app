<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Color'],
            ['name' => 'Size'],
            ['name' => 'Material'],
            ['name' => 'Brand'],
            ['name' => 'Style'],
            ['name' => 'Onze'],
            ['name' => 'Fit'],
            ['name' => 'Pattern'],
            ['name' => 'Length'],
            ['name' => 'Width'],
            ['name' => 'Height'],
            ['name' => 'Weight'],
            ['name' => 'Capacity'],
            ['name' => 'Power'],
            ['name' => 'Voltage'],
            ['name' => 'Temperature Range'],
            ['name' => 'Compatibility'],
            ['name' => 'Warranty'],
            ['name' => 'Country of Origin'],
        ];
        \App\Models\Attribute::insert($items);  
    }
}
