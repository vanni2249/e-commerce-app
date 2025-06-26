<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Spa Treatment Package Dove 16 oz',
                'description' => 'A relaxing spa treatment package that includes a full body massage, facial',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Hair Color Treatment Dove 24 oz',
                'description' => 'A nourishing hair color treatment that revitalizes and adds shine to your hair',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Nail Art Design Kit Dove 8 oz',
                'description' => 'A complete nail art design kit with various colors and tools for creative nail art',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Makeup Essentials Set Dove 8 oz',
                'description' => 'A set of essential makeup products for a flawless look, including foundation, lipstick, and more',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'BaBylissPRO Lo-ProFX Compact Series Clipper - Blue',
                'description' => 'A high-performance hair clipper for precise cutting and styling',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'BaBylissPRO Lo-ProFX Compact Series Trimmer - Blue',
                'description' => 'An ultra-quiet trimmer with a sleek design for precise grooming',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'StyleCraft Barber + Stylist Apron - Radio Active Green',
                'description' => 'A stylish apron designed for barbers and stylists, featuring multiple pockets and a comfortable fit',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Andis ProFoil Replacement Cutters And Foil #17280',
                'description' => 'Replacement cutters and foil for the Andis ProFoil shaver, ensuring a close and comfortable shave',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Andis Slimline Pro GTX Blade #32465',
                'description' => 'A high-quality replacement blade for the Andis Slimline Pro trimmer, ensuring a precise cut every time',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Andis SlimlinePro Cordless Silver Trimmer & ProFoil Shaver Bundle',
                'description' => 'A premium grooming bundle featuring the Andis SlimlinePro Cordless Trimmer and ProFoil Shaver',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'BaByliss4Barbers Essential Barber Kit',
                'description' => 'A complete barber kit with all the essential tools for professional grooming',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'BaBylissPRO ChameleonFX Fade Blade | FX8010C',
                'description' => 'A professional-grade shaver designed for a close and comfortable shave',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Spa Treatment Package Dove 16 oz',
                'description' => 'A relaxing spa treatment package that includes a full body massage, facial',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Hair Color Treatment Dove 24 oz',
                'description' => 'A nourishing hair color treatment that revitalizes and adds shine to your hair',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Nail Art Design Kit Dove 8 oz',
                'description' => 'A complete nail art design kit with various colors and tools for creative nail art',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Makeup Essentials Set Dove 8 oz',
                'description' => 'A set of essential makeup products for a flawless look, including foundation, lipstick, and more',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'BaBylissPRO Lo-ProFX Compact Series Clipper - Blue',
                'description' => 'A high-performance hair clipper for precise cutting and styling',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'BaBylissPRO Lo-ProFX Compact Series Trimmer - Blue',
                'description' => 'An ultra-quiet trimmer with a sleek design for precise grooming',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'StyleCraft Barber + Stylist Apron - Radio Active Green',
                'description' => 'A stylish apron designed for barbers and stylists, featuring multiple pockets and a comfortable fit',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Andis ProFoil Replacement Cutters And Foil #17280',
                'description' => 'Replacement cutters and foil for the Andis ProFoil shaver, ensuring a close and comfortable shave',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Andis Slimline Pro GTX Blade #32465',
                'description' => 'A high-quality replacement blade for the Andis Slimline Pro trimmer, ensuring a precise cut every time',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Andis SlimlinePro Cordless Silver Trimmer & ProFoil Shaver Bundle',
                'description' => 'A premium grooming bundle featuring the Andis SlimlinePro Cordless Trimmer and ProFoil Shaver',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'BaByliss4Barbers Essential Barber Kit',
                'description' => 'A complete barber kit with all the essential tools for professional grooming',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'BaBylissPRO ChameleonFX Fade Blade | FX8010C',
                'description' => 'A professional-grade shaver designed for a close and comfortable shave',
            ],
            [
                'seller_id' => rand(1, 3),
                'category_id' => rand(1, 15),
                'title' => 'Spa Treatment Package Dove 16 oz',
                'description' => 'A relaxing spa treatment package that includes a full body massage, facial',
            ],
        ];

        Item::insert($items);
    }
}
