<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                "name" => [
                    'en' => 'Draft',
                    'es' => 'Borrador',
                ],
                "slug" => "draft",
                "variant" => "secondary"
            ],
            [
                "name"=> [
                    'en' => 'In Review',
                    'es' => 'En Revisión',
                ],
                "slug" => "in-review",
                "variant" => "primary"
            ],
            [
                'name' => [
                    'en' => 'Pending',
                    'es' => 'Pendiente',
                ],
                'slug' => 'pending',
                'variant' => 'warning',
            ],
            [
                'name' => [
                    'en' => 'Approved',
                    'es' => 'Aprobado',
                ],
                'slug' => 'approved',
                'variant' => 'success',
            ],
            [
                'name' => [
                    'en' => 'Archived',
                    'es' => 'Archivado',
                ],
                'slug' => 'archived',
                'variant' => 'secondary',
            ],
            [
                'name' => [
                    'en' => 'Out of Stock',
                    'es' => 'Agotado',
                ],
                'slug' => 'out-of-stock',
                'variant' => 'danger',
            ],
            [
                'name' => [
                    'en' => 'Rejected',
                    'es' => 'Rechazado',
                ],
                'slug' => 'rejected',
                'variant' => 'danger',
            ],
        ];

        foreach ($items as $item) {
            \DB::table('item_statuses')->insert([
                'name' => json_encode(value: $item['name']),
                'slug' => $item['slug'],
                'variant' => $item['variant'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }       
    }
}
