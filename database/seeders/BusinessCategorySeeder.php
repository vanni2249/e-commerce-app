<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = [
            [
                'en_name' => 'Restaurant',
                'es_name' => 'Restaurante'
            ],
            [
                'en_name' => 'Retail',
                'es_name' => 'Venta al por menor'
            ],
            [
                'en_name' => 'Services',
                'es_name' => 'Servicios'
            ],
            [
                'en_name' => 'Health',
                'es_name' => 'Salud'
            ],
            [
                'en_name' => 'Education',
                'es_name' => 'Educación'
            ],
            [
                'en_name' => 'Entertainment',
                'es_name' => 'Entretenimiento'
            ],
            [
                'en_name' => 'Technology',
                'es_name' => 'Tecnología'
            ],
            [
                'en_name' => 'Finance',
                'es_name' => 'Finanzas'
            ],
            [
                'en_name' => 'Real Estate',
                'es_name' => 'Bienes Raíces'
            ],
            [
                'en_name' => 'Travel',
                'es_name' => 'Viajes'
            ],
            [
                'en_name' => 'Food & Beverage',
                'es_name' => 'Alimentos y Bebidas'
            ],
            [
                'en_name' => 'Automotive',
                'es_name' => 'Automotriz'
            ],
            [
                'en_name' => 'Fashion',
                'es_name' => 'Moda'
            ],
            [
                'en_name' => 'Home Services',
                'es_name' => 'Servicios para el Hogar'
            ],
            [
                'en_name' => 'Consulting',
                'es_name' => 'Consultoría'
            ],
            [
                'en_name' => 'Non-Profit',
                'es_name' => 'Sin Fines de Lucro'
            ],
            [
                'en_name' => 'Other',
                'es_name' => 'Otro'
            ],
        ];

        foreach ($item as $key => $value) {
            \App\Models\BusinessCategory::create($value);
        }
    }
}
