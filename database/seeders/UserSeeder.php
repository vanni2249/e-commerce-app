<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
          [
            'name' => 'Giovanni Colon',
            'email' => 'vanni2249@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
          ],
          [
            'name' => 'Jane Doe',
            'email' => 'colon.angel1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
          ],
          [
            'name' => 'Angel F. Colon',
            'email' => 'fabian4126@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
          ],
          [
            'name' => 'Regular User',
            'email' => 'user@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
          ]  
        ];

        User::insert($items);
    }
}
