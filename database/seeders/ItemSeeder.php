<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Traits\CreateItemNumber;
use Database\Factories\ItemFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Uid\Ulid;

class ItemSeeder extends Seeder
{
    protected $model = Item::class;
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
                'seller_id' => rand(1, 5),
                'section_id' => rand(1, 21),
                'title' => json_encode([
                    'en' => 'Spa Treatment Package Dove 16 oz',
                    'es' => 'Paquete de Tratamiento de Spa Dove 16 oz',
                ]),
                'description' => json_encode([
                        'en' => 'A relaxing spa treatment package that includes a full body massage, facial',
                        'es' => 'Un paquete de tratamiento de spa relajante que incluye un masaje corporal completo, facial',
                ]),
                'shipping_policy' => json_encode([
                    'en' => 'Ships within 3-5 business days',
                    'es' => 'Envío dentro de 3-5 días hábiles',
                ]),
                'return_policy' => json_encode([
                    'en' => 'Returns accepted within 30 days of purchase',
                    'es' => 'Devoluciones aceptadas dentro de los 30 días posteriores a la compra',
                ]),
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
                'title' => json_encode([
                    'en' => 'Hair Color Treatment Dove 24 oz',
                    'es' => 'Tratamiento de Color de Cabello Dove 24 oz',
                ]),
                'description' => json_encode([
                    'en'=> 'A nourishing hair color treatment that revitalizes and adds shine to your hair',
                    'es'=> 'Un tratamiento de color de cabello nutritivo que revitaliza y añade brillo a tu cabello',
                ]),
                'shipping_policy' => json_encode([
                    'en'=> 'Ships within 2-4 business days',
                    'es'=> 'Envío dentro de 2-4 días hábiles',
                ]),
                'return_policy' => json_encode([
                    'en'=> 'Returns accepted within 15 days of purchase',
                    'es'=> 'Devoluciones aceptadas dentro de los 15 días posteriores a la compra',
                ]),
                'sku' => 'HAIR-DOV-24OZ-' . uniqid(),
                'is_active' => true,
                'approved_at' => now()->subDays(rand(1, 30)),
                'approved_by' => 1,
                'available_at' => now()->subDays(rand(1, 30)),            
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 30)),
            ],
            [
                'id' => Ulid::generate(),
                'number' => $this->generateItemNumber(),
                'seller_id' => rand(1, 3),
                'section_id' => rand(1, 21),
                'title' => json_encode([
                    'en' => 'Nail Art Design Kit Dove 8 oz',
                    'es' => 'Kit de Diseño de Arte de Uñas Dove 8 oz',
                ]),
                'description' => json_encode([
                    'en'=> 'A complete nail art design kit with various colors and tools for creative nail art',
                    'es'=> 'Un kit completo de diseño de arte de uñas con varios colores y herramientas para arte de uñas creativo',
                ]),
                'shipping_policy' => json_encode([
                    'en'=> 'Ships within 1-3 business days',
                    'es'=> 'Envío dentro de 1-3 días hábiles',
                ]),
                'return_policy' => json_encode([
                    'en'=> 'Returns accepted within 10 days of purchase',
                    'es'=> 'Devoluciones aceptadas dentro de los 10 días posteriores a la compra',
                ]),
                'sku' => 'NAIL-DOV-8OZ-' . uniqid(),
                'is_active' => true,
                'approved_at' => now()->subDays(rand(1, 30)),
                'approved_by' => rand(1, 3),
                'available_at' => now()->subDays(rand(1, 30)),
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 30)),
            ],      
            [
                'id' => Ulid::generate(),
                'number' => $this->generateItemNumber(),
                'seller_id' => rand(1, 3),
                'section_id' => rand(1, 21),
                'title' => json_encode([
                    'en' => 'Nail Art Design Kit Dove 8 oz',
                    'es' => 'Kit de Diseño de Arte de Uñas Dove 8 oz',
                ]),
                'description' => json_encode([
                    'en'=> 'A complete nail art design kit with various colors and tools for creative nail art',
                    'es'=> 'Un kit completo de diseño de arte de uñas con varios colores y herramientas para arte de uñas creativo',
                ]),
                'shipping_policy' => json_encode([
                    'en'=> 'Ships within 1-3 business days',
                    'es'=> 'Envío dentro de 1-3 días hábiles',
                ]),
                'return_policy' => json_encode([
                    'en'=> 'Returns accepted within 10 days of purchase',
                    'es'=> 'Devoluciones aceptadas dentro de los 10 días posteriores a la compra',
                ]),
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

        // Generate additional items using factory
    }
}
