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
            ['en_name' => 'Hair Salon', 'es_name' => 'Salón de Belleza'],
            ['en_name' => 'Barbershop', 'es_name' => 'Barbería'],
            ['en_name' => 'Pedicure', 'es_name' => 'Pedicura'],
            ['en_name' => 'Manicure', 'es_name' => 'Manicura'],
            ['en_name' => 'Haircut', 'es_name' => 'Corte de Pelo'],
            ['en_name' => 'Massage', 'es_name' => 'Masaje'],
            ['en_name' => 'Spa', 'es_name' => 'Spa'],
            ['en_name' => 'Cosmetics', 'es_name' => 'Cosméticos'],
            ['en_name' => 'Skincare', 'es_name' => 'Cuidado de la Piel'],
            ['en_name' => 'Nail Art', 'es_name' => 'Arte de Uñas'],
            ['en_name' => 'Hair Color', 'es_name' => 'Color de Pelo'],
            ['en_name' => 'Waxing', 'es_name' => 'Depilación'],
            ['en_name' => 'Facial Treatments', 'es_name' => 'Tratamientos Faciales'],
            ['en_name' => 'Body Treatments', 'es_name' => 'Tratamientos Corporales'],
            ['en_name' => 'Makeup Services', 'es_name' => 'Servicios de Maquillaje'],
        ];

        Category::insert($items);
    }
}
