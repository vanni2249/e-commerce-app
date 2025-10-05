<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Symfony\Component\Uid\Ulid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    use \App\Traits\CreateItemNumber;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand = rand(1, 4);
        return [
            'id' => Ulid::generate(),
            'number' => $this->createItemNumber(),
            'seller_id' => rand(1, 4) == 1 ? null : rand(1, 3),
            'section_id' => rand(1, 21),
            'en_title' => fake()->sentence(14),
            'es_title' => fake()->sentence(14),
            'en_short_description' => fake()->paragraph(2),
            'es_short_description' => fake()->paragraph(2),
            'en_description' => fake()->paragraph(2),
            'es_description' => fake()->paragraph(2),
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
            'en_shipping_policy' => fake()->sentence(6),
            'es_shipping_policy' => fake()->sentence(6),
            'en_return_policy' => fake()->sentence(6),
            'es_return_policy' => fake()->sentence(6),
            'sku' => uniqid(),
            'is_to_customer' => in_array($rand, [1,2,3]) ? true : false,
            'is_to_business' => in_array($rand, [2,3,4]) ? true : false,
            'is_active' => true,
            'approved_at' => now(),
            'approved_by' => 1,
            'available_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
