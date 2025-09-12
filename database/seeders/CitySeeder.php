<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['state_code' => 'pr', 'name' => 'Adjuntas'],
            ['state_code' => 'pr', 'name' => 'Aguada'],
            ['state_code' => 'pr', 'name' => 'Aguadilla'],
            ['state_code' => 'pr', 'name' => 'Aguas Buenas'],
            ['state_code' => 'pr', 'name' => 'Aibonito'],
            ['state_code' => 'pr', 'name' => 'Añasco'],
            ['state_code' => 'pr', 'name' => 'Arecibo'],
            ['state_code' => 'pr', 'name' => 'Arroyo'],
            ['state_code' => 'pr', 'name' => 'Barceloneta'],
            ['state_code' => 'pr', 'name' => 'Barranquitas'],
            ['state_code' => 'pr', 'name' => 'Bayamón'],
            ['state_code' => 'pr', 'name' => 'Cabo Rojo'],
            ['state_code' => 'pr', 'name' => 'Caguas'],
            ['state_code' => 'pr', 'name' => 'Camuy'],
            ['state_code' => 'pr', 'name' => 'Canóvanas'],
            ['state_code' => 'pr', 'name' => 'Carolina'],
            ['state_code' => 'pr', 'name' => 'Cataño'],
            ['state_code' => 'pr', 'name' => 'Cayey'],
            ['state_code' => 'pr', 'name' => 'Ceiba'],
            ['state_code' => 'pr', 'name' => 'Ciales'],
            ['state_code' => 'pr', 'name' => 'Cidra'],
            ['state_code' => 'pr', 'name' => 'Coamo'],
            ['state_code' => 'pr', 'name' => 'Comerío'],
            ['state_code' => 'pr', 'name' => 'Corozal'],
            ['state_code' => 'pr', 'name' => 'Culebra'],
            ['state_code' => 'pr', 'name' => 'Dorado'],
            ['state_code' => 'pr', 'name' => 'Fajardo'],
            ['state_code' => 'pr', 'name' => 'Florida'],
            ['state_code' => 'pr', 'name' => 'Guánica'],
            ['state_code' => 'pr', 'name' => 'Guayama'],
            ['state_code' => 'pr', 'name' => 'Guayanilla'],
            ['state_code' => 'pr', 'name' => 'Guaynabo'],
            ['state_code' => 'pr', 'name' => 'Gurabo'],
            ['state_code' => 'pr', 'name' => 'Hatillo'],
            ['state_code' => 'pr', 'name' => 'Hormigueros'],
            ['state_code' => 'pr', 'name' => 'Humacao'],
            ['state_code' => 'pr', 'name' => 'Isabela'],
            ['state_code' => 'pr', 'name' => 'Jayuya'],
            ['state_code' => 'pr', 'name' => 'Juana Díaz'],
            ['state_code' => 'pr', 'name' => 'Juncos'],
            ['state_code' => 'pr', 'name' => 'Lajas'],
            ['state_code' => 'pr', 'name' => 'Lares'],
            ['state_code' => 'pr', 'name' => 'Las Marías'],
            ['state_code' => 'pr', 'name' => 'Las Piedras'],
            ['state_code' => 'pr', 'name' => 'Loíza'],
            ['state_code' => 'pr', 'name' => 'Luquillo'],
            ['state_code' => 'pr', 'name' => 'Manatí'],
            ['state_code' => 'pr', 'name' => 'Maricao'],
            ['state_code' => 'pr', 'name' => 'Maunabo'],
            ['state_code' => 'pr', 'name' => 'Mayagüez'],
            ['state_code' => 'pr', 'name' => 'Moca'],
            ['state_code' => 'pr', 'name' => 'Morovis'],
            ['state_code' => 'pr', 'name' => 'Naguabo'],
            ['state_code' => 'pr', 'name' => 'Naranjito'],
            ['state_code' => 'pr', 'name' => 'Orocovis'],
            ['state_code' => 'pr', 'name' => 'Patillas'],
            ['state_code' => 'pr', 'name' => 'Peñuelas'],
            ['state_code' => 'pr', 'name' => 'Ponce'],
            ['state_code' => 'pr', 'name' => 'Quebradillas'],
            ['state_code' => 'pr', 'name' => 'Rincón'],
            ['state_code' => 'pr', 'name' => 'Río Grande'],
            ['state_code' => 'pr', 'name' => 'Sabana Grande'],
            ['state_code' => 'pr', 'name' => 'Salinas'],
            ['state_code' => 'pr', 'name' => 'San Germán'],
            ['state_code' => 'pr', 'name' => 'San Juan'],
            ['state_code' => 'pr', 'name' => 'San Lorenzo'],
            ['state_code' => 'pr', 'name' => 'San Sebastián'],
            ['state_code' => 'pr', 'name' => 'Santa Isabel'],
            ['state_code' => 'pr', 'name' => 'Toa Alta'],
            ['state_code' => 'pr', 'name' => 'Toa Baja'],
            ['state_code' => 'pr', 'name' => 'Trujillo Alto'],
            ['state_code' => 'pr', 'name' => 'Utuado'],
            ['state_code' => 'pr', 'name' => 'Vega Alta'],
            ['state_code' => 'pr', 'name' => 'Vega Baja'],
            ['state_code' => 'pr', 'name' => 'Vieques'],
            ['state_code' => 'pr', 'name' => 'Villalba'],
            ['state_code' => 'pr', 'name' => 'Yabucoa'],
            ['state_code' => 'pr', 'name' => 'Yauco']
        ];


        City::insert($cities);
    }
}
