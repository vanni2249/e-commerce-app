<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Item;
use App\Models\Product;
use App\Models\State;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            ShopSeeder::class,
            FulfillmentSeeder::class,
            SellerSeeder::class,
            CategorySeeder::class,
            SectionSeeder::class,
            ItemStatusSeeder::class,
            ItemSeeder::class,
            AttributeSeeder::class,
            AddressSeeder::class,
            ClaimCategorySeeder::class,
            BusinessCategorySeeder::class,
            // OrderSeeder::class,
            // SaleSeeder::class,
        ]);

        Item::factory()->count(1000)->create()->each(function ($item) {
            $categories = \App\Models\Category::inRandomOrder()->take(rand(1, 4))->get();
            $item->categories()->attach($categories);
        });

        $this->call([
            ProductSeeder::class,
            InventorySeeder::class,
        ]);

    }
}
