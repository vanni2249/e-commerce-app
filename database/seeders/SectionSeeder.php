<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => json_encode(['en' => 'Accessories', 'es' => 'Accesorios']), 'percentage' => 14.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Automotive', 'es' => 'Automotriz']), 'percentage' => 18.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Beauty', 'es' => 'Belleza']), 'percentage' => 8.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Beverages', 'es' => 'Bebidas']), 'percentage' => 5.50, 'is_active' => true],
            ['name' => json_encode(['en' => 'Books', 'es' => 'Libros']), 'percentage' => 20.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Chemicals', 'es' => 'Químicos']), 'percentage' => 15.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Clothing', 'es' => 'Ropa']), 'percentage' => 5.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Cosmetics', 'es' => 'Cosméticos']), 'percentage' => 12.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Electronics', 'es' => 'Electrónica']), 'percentage' => 10.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Footwear', 'es' => 'Calzado']), 'percentage' => 11.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Furniture', 'es' => 'Muebles']), 'percentage' => 25.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Gardening', 'es' => 'Jardinería']), 'percentage' => 13.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Groceries', 'es' => 'Abarrotes']), 'percentage' => 7.50, 'is_active' => true],
            ['name' => json_encode(['en' => 'Health', 'es' => 'Salud']), 'percentage' => 9.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Home Appliances', 'es' => 'Electrodomésticos']), 'percentage' => 22.50, 'is_active' => true],
            ['name' => json_encode(['en' => 'Jewelry', 'es' => 'Joyería']), 'percentage' => 18.50, 'is_active' => true],
            ['name' => json_encode(['en' => 'Sports', 'es' => 'Deportes']), 'percentage' => 12.50, 'is_active' => true],
            ['name' => json_encode(['en' => 'Stationery', 'es' => 'Papelería']), 'percentage' => 6.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Toys', 'es' => 'Juguetes']), 'percentage' => 30.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Watches', 'es' => 'Relojes']), 'percentage' => 16.00, 'is_active' => true],
            ['name' => json_encode(['en' => 'Wellness', 'es' => 'Bienestar']), 'percentage' => 14.50, 'is_active' => true],
        ];

        Section::insert($items);
    }
}
