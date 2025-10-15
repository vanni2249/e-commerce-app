<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminSeeder extends Seeder
{
    use \App\Traits\AdminNumber;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
          [
            'number' => $this->createAdminNumber(),
            'name' => 'Giovanni Colon',
            'email' => 'vanni2249@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
          ]  
        ];

        Admin::insert($items);
    }
}
