<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClaimCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'en_name' => 'Shipping Issue',
                'es_name' => 'Problema de Envío',
                'en_description' => 'Issues related to shipping, such as delays or lost packages.',
                'es_description' => 'Problemas relacionados con el envío, como retrasos o paquetes perdidos.'
            ],
            [
                'en_name' => 'Return',
                'es_name' => 'Devolución',
                'en_description' => 'Request to return a product for a refund or exchange.',
                'es_description' => 'Solicitud para devolver un producto para un reembolso o cambio.'
            ],
            [
                'en_name' => 'Replacement',
                'es_name' => 'Reemplazo',
                'en_description' => 'Request to replace a defective or incorrect item.',
                'es_description' => 'Solicitud para reemplazar un artículo defectuoso o incorrecto.'
            ],
            [
                'en_name' => 'Other',
                'es_name' => 'Otro',
                'en_description' => 'Any other issues not covered by the above categories.',
                'es_description' => 'Cualquier otro problema no cubierto por las categorías anteriores.'
            ],
        ];

        foreach ($items as $item) {
            \App\Models\ClaimCategory::create($item);
        }
    }
}
