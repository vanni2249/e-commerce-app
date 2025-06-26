<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Beauty'],
            ['name' => 'Barbershop'],
            ['name' => 'Pedicure'],
            ['name' => 'Manicure'],
            ['name' => 'Haircut'],
            ['name' => 'Massage'],
            ['name' => 'Spa'],
            ['name' => 'Cosmetics'],
            ['name' => 'Skincare'],
            ['name' => 'Nail Art'],
            ['name' => 'Hair Color'],
            ['name' => 'Waxing'],
            ['name' => 'Facial Treatments'],
            ['name' => 'Body Treatments'],
            ['name' => 'Makeup Services'],
        ];

        Category::insert($items);
    }
}
