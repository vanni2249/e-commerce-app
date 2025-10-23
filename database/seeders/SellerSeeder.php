<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SellerSeeder extends Seeder
{
    use \App\Traits\SellerNumber;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
          [
            'number' => $this->createSellerNumber(),
            'user_id' => null,
            'store_name' => 'By Zierra LLC',
            'store_description' => 'Official store of Zierra LLC',
            'contact_email' => null,
            'contact_phone' => null,
            'is_active' => true,
            'is_verified' => true,
            'is_vacation_mode' => false,
            'is_owner' => true,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'number' => $this->createSellerNumber(),
            'user_id' => 1,
            'store_name' => 'Giovanni Store',
            'store_description' => 'Best products in town',
            'contact_email' => 'vanni2249@gmail.com',
            'contact_phone' => '123-456-7890',
            'is_active' => true,
            'is_verified' => true,
            'is_vacation_mode' => false,
            'is_owner' => false,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'number' => $this->createSellerNumber(),
            'user_id' => 2,
            'store_name' => 'Angel\'s Shop',
            'store_description' => 'Quality items for everyone',
            'contact_email' => 'colon.angel1@gmail.com',
            'contact_phone' => '987-654-3210',
            'is_active' => false,
            'is_verified' => false,
            'is_vacation_mode' => false,
            'is_owner' => false,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'number' => $this->createSellerNumber(),
            'user_id' => 3,
            'store_name' => 'Fabian\'s Emporium',
            'store_description' => 'Your one-stop shop for all needs',
            'contact_email' => 'fabian4126@gmail.com',
            'contact_phone' => '555-555-5555',
            'is_active' => true,
            'is_verified' => true,
            'is_vacation_mode' => false,
            'is_owner' => false,
            'created_at' => now(),
            'updated_at' => now(),
          ],

        ];

        Seller::insert($items);

        $sellers = Seller::all();
        foreach ($sellers as $seller) {
          if ($seller->is_owner) {
            $fulfillments = [1];
          }else{
            $fulfillments = [1, 2];
          }
            $seller->shops()->attach([1, 2], ['is_active' => true]);
            $seller->fulfillments()->attach($fulfillments, ['is_active' => true]);
        }
    }
}
