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
            ['en_name' => 'Beauty', 'es_name' => 'Belleza'],
            ['en_name' => 'Health', 'es_name' => 'Salud'],
            ['en_name' => 'Wellness', 'es_name' => 'Bienestar'],
            ['name' => 'Hair Salon', 'es_name' => 'Salón de Belleza'],
            ['name' => 'Barbershop', 'es_name' => 'Barbería'],
            ['name' => 'Pedicure', 'es_name' => 'Pedicura'],
            ['name' => 'Manicure', 'es_name' => 'Manicura'],
            ['name' => 'Haircut', 'es_name' => 'Corte de Pelo'],
            ['name' => 'Massage', 'es_name' => 'Masaje'],
            ['name' => 'Spa', 'es_name' => 'Spa'],
            ['name' => 'Cosmetics', 'es_name' => 'Cosméticos'],
            ['name' => 'Skincare', 'es_name' => 'Cuidado de la Piel'],
            ['name' => 'Nail Art', 'es_name' => 'Arte de Uñas'],
            ['name' => 'Hair Color', 'es_name' => 'Color de Pelo'],
            ['name' => 'Waxing', 'es_name' => 'Depilación'],
            ['name' => 'Facial Treatments', 'es_name' => 'Tratamientos Faciales'],
            ['name' => 'Body Treatments', 'es_name' => 'Tratamientos Corporales'],
            ['name' => 'Makeup Services', 'es_name' => 'Servicios de Maquillaje'],
        ];

        Category::insert($items);
    }
}
