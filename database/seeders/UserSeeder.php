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
            'phone' => '7872249249',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
          ],
          [
            'name' => 'Angel M. Colon',
            'email' => 'colon.angel1@gmail.com',
            'phone' => '7875555555',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
          ],
          [
            'name' => 'Angel F. Colon',
            'email' => 'fabian4126@gmail.com',
            'phone' => '7875555555',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
          ],
          [
            'name' => 'Kariani A Colon Santiago',
            'email' => 'user@email.com',
            'phone' => '7875555555',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
          ]  
        ];

        User::insert($items);

        foreach ($items as $item) {
            $user = User::where('email', $item['email'])->first();
            $user->favorites()->create([
              'is_default' => true,
            ]);
        }
    }
}
