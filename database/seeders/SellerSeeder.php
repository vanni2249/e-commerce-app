<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
          [
            'user_id' => 1,
            'store_name' => 'Gioavanni Store',
            'store_description' => 'Best products in town',
            'contact_email' => 'vanni2249@gmail.com',
            'contact_phone' => '123-456-7890',
            'is_active' => true,
            'is_verified' => true,
            'is_vacation_mode' => false,
          ],
          [
            'user_id' => 2,
            'store_name' => 'Angel\'s Shop',
            'store_description' => 'Quality items for everyone',
            'contact_email' => 'colon.angel1@gmail.com',
            'contact_phone' => '987-654-3210',
            'is_active' => true,
            'is_verified' => false,
            'is_vacation_mode' => false,
          ],
          [
            'user_id' => 3,
            'store_name' => 'Fabian\'s Emporium',
            'store_description' => 'Your one-stop shop for all needs',
            'contact_email' => 'fabian4126@gmail.com',
            'contact_phone' => '555-555-5555',
            'is_active' => true,
            'is_verified' => true,
            'is_vacation_mode' => false,
          ],

        ];

        Seller::insert($items);
    }
}
