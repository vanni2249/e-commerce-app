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
            ['name' => json_encode(['en' => 'Beauty', 'es' => 'Belleza']), 'slug' => 'beauty'],
            ['name' => json_encode(['en' => 'Health', 'es' => 'Salud']), 'slug' => 'health'],
            ['name' => json_encode(['en' => 'Wellness', 'es' => 'Bienestar']), 'slug' => 'wellness'],
            ['name' => json_encode(['en' => 'Hair Salon', 'es' => 'Salón de Belleza']), 'slug' => 'hair-salon'],
            ['name' => json_encode(['en' => 'Barbershop', 'es' => 'Barbería']), 'slug' => 'barbershop'],
            ['name' => json_encode(['en' => 'Pedicure', 'es' => 'Pedicura']), 'slug' => 'pedicure'],
            ['name' => json_encode(['en' => 'Manicure', 'es' => 'Manicura']), 'slug' => 'manicure'],
            ['name' => json_encode(['en' => 'Haircut', 'es' => 'Corte de Pelo']), 'slug'=> 'haircut'],
            ['name' => json_encode(['en' => 'Massage', 'es' => 'Masaje']), 'slug'=> 'massage'],
            ['name' => json_encode(['en' => 'Spa', 'es' => 'Spa']), 'slug'=> 'spa'],
            ['name' => json_encode(['en' => 'Cosmetics', 'es' => 'Cosméticos']), 'slug'=> 'cosmetics'],
            ['name' => json_encode(['en' => 'Skincare', 'es' => 'Cuidado de la Piel']), 'slug'=> 'skincare'],
            ['name' => json_encode(['en' => 'Nail Art', 'es' => 'Arte de Uñas']), 'slug'=> 'nail-art'],
            ['name' => json_encode(['en' => 'Hair Color', 'es' => 'Color de Pelo']), 'slug'=> 'hair-color'],
            ['name' => json_encode(['en' => 'Waxing', 'es' => 'Depilación']), 'slug'=> 'waxing'],
            ['name' => json_encode(['en' => 'Facial Treatments', 'es' => 'Tratamientos Faciales']), 'slug'=> 'facial-treatments'],
            ['name' => json_encode(['en' => 'Body Treatments', 'es' => 'Tratamientos Corporales']), 'slug'=> 'body-treatments'],
            ['name' => json_encode(['en' => 'Makeup Services', 'es' => 'Servicios de Maquillaje']), 'slug'=> 'makeup-services'],
        ];

        Category::insert($items);
    }
}
