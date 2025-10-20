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
            ['name' => json_encode(['en' => 'Color', 'es' => 'Color'])],
            ['name' => json_encode(['en' => 'Size', 'es' => 'Tamaño'])],
            ['name' => json_encode(['en' => 'Material', 'es' => 'Material'])],
            ['name' => json_encode(['en' => 'Style', 'es' => 'Estilo'])],
            ['name' => json_encode(['en' => 'Onze', 'es' => 'Onze'])],
            ['name' => json_encode(['en' => 'Length', 'es' => 'Longitud'])],
            ['name' => json_encode(['en' => 'Width', 'es' => 'Ancho'])],
            ['name' => json_encode(['en' => 'Height', 'es' => 'Altura'])],
            ['name' => json_encode(['en' => 'Weight', 'es' => 'Peso'])],
            ['name' => json_encode(['en' => 'Power', 'es' => 'Potencia'])],
            ['name' => json_encode(['en' => 'Voltage', 'es' => 'Voltaje'])],
            ['name' => json_encode(['en' => 'Compatibility', 'es' => 'Compatibilidad'])],
            ['name' => json_encode(['en' => 'Warranty', 'es' => 'Garantía'])],
        ];
        \App\Models\Attribute::insert($items);  
    }
}
