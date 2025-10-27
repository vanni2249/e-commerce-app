<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Symfony\Component\Uid\Ulid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    use \App\Traits\ItemUlid;
    use \App\Traits\ItemNumber;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand = rand(1, 4);
        return [
            'ulid' => $this->createItemUlid(),
            'shop_id' => rand(1,3),
            'fulfillment_id' => 1,
            'number' => $this->createItemNumber(),
            'seller_id' => rand(1,4),
            'section_id' => rand(1, 21), // Use a safe default, ensure this section exists
            'title' => [
                'en' => fake()->sentence(14),
                'es' => fake()->sentence(14),
            ],
            'description' => [
                'en' => fake()->paragraph(12), 
                'es' => fake()->paragraph(12)
            ],
            'shipping_policy' => [
                'en' => fake()->sentence(6), 
                'es' => fake()->sentence(6)
            ],
            'return_policy' => [
                'en' => fake()->sentence(6), 
                'es' => fake()->sentence(6)
            ],
            'sku' => uniqid(),
            'is_to_customer' => in_array($rand, [1, 2, 3]) ? true : false,
            'is_to_business' => in_array($rand, [2, 3, 4]) ? true : false,
            'is_active' => true,
            'item_status_id' => rand(1, 7),
            'approved_at' => now(),
            'approved_by' => 1,
            'available_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
