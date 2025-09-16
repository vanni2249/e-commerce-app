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
            ['state_code' => 'pr', 'name' => 'Adjuntas', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Aguadilla', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Aguada', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Aguadilla', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Aguas Buenas', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Aibonito', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Añasco', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Arecibo', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Arroyo', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Barceloneta', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Barranquitas', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Bayamón', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Cabo Rojo', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Caguas', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Camuy', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Canóvanas', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Carolina', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Cataño', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Cayey', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Ceiba', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Ciales', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Cidra', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Coamo', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Comerío', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Corozal', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Culebra', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Dorado', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Fajardo', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Florida', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Guánica', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Guayama', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Guayanilla', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Guaynabo', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Gurabo', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Hatillo', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Hormigueros', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Humacao', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Isabela', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Jayuya', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Juana Díaz', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Juncos', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Lajas', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Lares', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Las Marías', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Las Piedras', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Loíza', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Luquillo', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Manatí', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Maricao', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Maunabo', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Mayagüez', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Moca', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Morovis', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Naguabo', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Naranjito', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Orocovis', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Patillas', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Peñuelas', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Ponce', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Quebradillas', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Rincón', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Río Grande', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Sabana Grande', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Salinas', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'San Germán', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'San Juan', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'San Lorenzo', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'San Sebastián', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Santa Isabel', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Toa Alta', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Toa Baja', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Trujillo Alto', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Utuado', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Vega Alta', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Vega Baja', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Vieques', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Villalba', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Yabucoa', 'is_active' => true],
            ['state_code' => 'pr', 'name' => 'Yauco', 'is_active' => true]
        ];


        City::insert($cities);
    }
}
