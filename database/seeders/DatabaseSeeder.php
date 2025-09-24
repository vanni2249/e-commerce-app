<?php

namespace Database\Seeders;

use App\Models\Address;
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
            SellerSeeder::class,
            CategorySeeder::class,
            SectionSeeder::class,
            ItemSeeder::class,
            AttributeSeeder::class,
            ProductSeeder::class,
            InventorySeeder::class,
            AddressSeeder::class,
            ClaimCategorySeeder::class,
            // OrderSeeder::class,
            // SaleSeeder::class,
        ]);
    }
}
