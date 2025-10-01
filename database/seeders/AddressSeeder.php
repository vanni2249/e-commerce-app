<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
            [
                'name'=>'Kariani A Colon',
                'type' => 'residencial',
                'line1' => 'Urb Villas de Prado',
                'line2' => 'Calle del Sol #125',
                'city_id' => 77,
                'state_code' => 'pr',
                'postal_code' => '00926',
                'phone' => '7875551234',
                'is_default' => true,
                'is_approved' => true,
                'user_id' => 4
            ],
            [
                'name'=>'Kariani A Colon',
                'type' => 'residencial',
                'line1' => 'Bo Sierrita',
                'line2' => 'Calle Luna #45',
                'city_id' => 77,
                'state_code' => 'pr',
                'postal_code' => '00766',
                'phone' => '7875555678',
                'is_default' => false,
                'is_approved' => true,
                'user_id' => 4
            ],
        ];
        \App\Models\Address::insert($addresses);
    }
}
