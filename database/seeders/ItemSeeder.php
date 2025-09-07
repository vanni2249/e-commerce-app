<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Traits\CreateItemNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Uid\Ulid;

class ItemSeeder extends Seeder
{
    use CreateItemNumber;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id' => Ulid::generate(),
                'number' => $this->createItemNumber(),
                'seller_id' => null,
                'section_id' => rand(1, 21),
                'en_title' => 'Spa Treatment Package Dove 16 oz',
                'es_title' => 'Paquete de Tratamiento de Spa Dove 16 oz',
                'en_short_description' => 'A relaxing spa treatment package that includes a full body massage, facial',
                'es_short_description' => 'Un paquete de tratamiento de spa relajante que incluye un masaje corporal completo, facial',
                'en_description' => 'A relaxing spa treatment package that includes a full body massage, facial',
                'es_description' => 'Un paquete de tratamiento de spa relajante que incluye un masaje corporal completo, facial',
                'en_specifications' => json_encode([
                    [
                        'label' => 'Duration',
                        'value' => '60 minutes',
                    ],
                    [
                        'label' => 'Includes',
                        'value' => 'Full body massage, facial, aromatherapy',
                    ],
                    [
                        'label' => 'Suitable for',
                        'value' => 'All skin types',
                    ],
                ]),
                'es_specifications' => json_encode([
                    [
                        'label' => 'Duración',
                        'value' => '60 minutos',
                    ],
                    [
                        'label' => 'Incluye',
                        'value' => 'Masaje corporal completo, facial, aromaterapia',
                    ],
                    [
                        'label' => 'Apto para',
                        'value' => 'Todos los tipos de piel',
                    ],
                ]),
                'en_shipping_policy' => 'Ships within 3-5 business days',
                'es_shipping_policy' => 'Envío dentro de 3-5 días hábiles',
                'en_return_policy' => 'Returns accepted within 30 days of purchase',
                'es_return_policy' => 'Devoluciones aceptadas dentro de los 30 días posteriores a la compra',
                'sku' => 'SPA-DOV-16OZ-' . uniqid(),
                'is_active' => true,
                'approved_at' => now()->subDays(rand(1, 30)),
                'approved_by' => 1,
                'available_at' => now()->addDays(rand(1, 30)),
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 30)),
            ],
            [
                'id' => Ulid::generate(),
                'number' => $this->generateItemNumber(),
                'seller_id' => rand(1, 3),
                'section_id' => rand(1, 21),
                'en_title' => 'Hair Color Treatment Dove 24 oz',
                'es_title' => 'Tratamiento de Color de Cabello Dove 24 oz',
                'en_short_description' => 'A nourishing hair color treatment that revitalizes and adds shine to your hair',
                'es_short_description' => 'Un tratamiento de color de cabello nutritivo que revitaliza y añade brillo a tu cabello',
                'en_description' => 'A nourishing hair color treatment that revitalizes and adds shine to your hair',
                'es_description' => 'Un tratamiento de color de cabello nutritivo que revitaliza y añade brillo a tu cabello',
                'en_specifications' => json_encode([
                    [
                        'label' => 'Color',
                        'value' => 'Natural Brown',
                    ],
                    [
                        'label' => 'Size',
                        'value' => '24 oz',
                    ],
                    [
                        'label' => 'Ingredients',
                        'value' => 'Aloe Vera, Vitamin E',      
                    ]
                ]),
                'es_specifications' => json_encode([
                    [
                        'label' => 'Color',
                        'value' => 'Marrón Natural',
                    ],
                    [
                        'label' => 'Tamaño',
                        'value' => '24 oz',
                    ],
                    [
                        'label' => 'Ingredientes',
                        'value' => 'Aloe Vera, Vitamina E',
                    ]
                ]),
                'en_shipping_policy' => 'Ships within 2-4 business days',
                'es_shipping_policy' => 'Envío dentro de 2-4 días hábiles',
                'en_return_policy' => 'Returns accepted within 15 days of purchase',
                'es_return_policy' => 'Devoluciones aceptadas dentro de los 15 días posteriores a la compra',
                'sku' => 'HAIR-DOV-24OZ-' . uniqid(),
                'is_active' => true,
                'available_at' => now()->subDays(rand(1, 30)),
                'approved_at' => now()->subDays(rand(1, 30)),
                'approved_by' => 1,
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 30)),
            ],
            [
                'id' => Ulid::generate(),
                'number' => $this->generateItemNumber(),
                'seller_id' => rand(1, 3),
                'section_id' => rand(1, 21),
                'en_title' => 'Nail Art Design Kit Dove 8 oz',
                'es_title' => 'Kit de Diseño de Arte de Uñas Dove 8 oz',
                'en_short_description' => 'A complete nail art design kit with various colors and tools for creative nail art',
                'es_short_description' => 'Un kit completo de diseño de arte de uñas con varios colores y herramientas para arte de uñas creativo',
                'en_description' => 'A complete nail art design kit with various colors and tools for creative nail art',
                'es_description' => 'Un kit completo de diseño de arte de uñas con varios colores y herramientas para arte de uñas creativo',
                'en_specifications' => json_encode([
                    [
                        'label' => 'Colors Included',
                        'value' => 'Red, Blue, Green, Yellow, Pink',
                    ],
                    [
                        'label' => 'Tools',
                        'value' => 'Brushes, Dotting tools, Stickers',
                    ],
                    [
                        'label' => 'Size',
                        'value' => '8 oz',
                    ]
                ]),
                'es_specifications' => json_encode([
                    [
                        'label' => 'Colores Incluidos',
                        'value' => 'Rojo, Azul, Verde, Amarillo, Rosa',
                    ],
                    [
                        'label' => 'Herramientas',
                        'value' => 'Pinceles, Herramientas de punteo, Pegatinas',
                    ],
                    [
                        'label' => 'Tamaño',
                        'value' => '8 oz',
                    ]
                ]),
                'en_shipping_policy' => 'Ships within 1-3 business days',
                'es_shipping_policy' => 'Envío dentro de 1-3 días hábiles',
                'en_return_policy' => 'Returns accepted within 10 days of purchase',
                'es_return_policy' => 'Devoluciones aceptadas dentro de los 10 días posteriores a la compra',
                'sku' => 'NAIL-DOV-8OZ-' . uniqid(),
                'is_active' => true,
                'available_at' => now()->subDays(rand(1, 30)),
                'approved_at' => now()->subDays(rand(1, 30)),
                'approved_by' => rand(1, 3),
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 30)),
            ],      
            [
                'id' => Ulid::generate(),
                'number' => $this->generateItemNumber(),
                'seller_id' => rand(1, 3),
                'section_id' => rand(1, 21),
                'en_title' => 'Nail Art Design Kit Dove 8 oz',
                'es_title' => 'Kit de Diseño de Arte de Uñas Dove 8 oz',
                'en_short_description' => 'A complete nail art design kit with various colors and tools for creative nail art',
                'es_short_description' => 'Un kit completo de diseño de arte de uñas con varios colores y herramientas para arte de uñas creativo',
                'en_description' => 'A complete nail art design kit with various colors and tools for creative nail art',
                'es_description' => 'Un kit completo de diseño de arte de uñas con varios colores y herramientas para arte de uñas creativo',
                'en_specifications' => json_encode([
                    [
                        'label' => 'Colors Included',
                        'value' => 'Red, Blue, Green, Yellow, Pink',
                    ],
                    [
                        'label' => 'Tools',
                        'value' => 'Brushes, Dotting tools, Stickers',
                    ],
                    [
                        'label' => 'Size',
                        'value' => '8 oz',
                    ]
                ]),
                'es_specifications' => json_encode([
                    [
                        'label' => 'Colores Incluidos',
                        'value' => 'Rojo, Azul, Verde, Amarillo, Rosa',
                    ],
                    [
                        'label' => 'Herramientas',
                        'value' => 'Pinceles, Herramientas de punteo, Pegatinas',
                    ],
                    [
                        'label' => 'Tamaño',
                        'value' => '8 oz',
                    ]
                ]),
                'en_shipping_policy' => 'Ships within 1-3 business days',
                'es_shipping_policy' => 'Envío dentro de 1-3 días hábiles',
                'en_return_policy' => 'Returns accepted within 10 days of purchase',
                'es_return_policy' => 'Devoluciones aceptadas dentro de los 10 días posteriores a la compra',
                'sku' => 'NAIL-DOV-8OZ-' . uniqid(),
                'is_active' => false,
                'approved_by' => null,
                'approved_at' => null,
                'available_at' => null,
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 30)),
            ],
        ];

        Item::insert($items);
    }
}
