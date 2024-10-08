<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehiculo;
class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehiculo::create([
            "patente" => "00h645",
            "chasis" => "jr56hsga9348h",
            "modelo_id" => 1, //Fiesta
        ]);

        Vehiculo::create([
            "patente" => "dta246",
            "chasis" => "xr56hsa29348h",
            "modelo_id" => 2, //Eco Sport
        ]);

        Vehiculo::create([
            "patente" => "axa266",
            "chasis" => "zr66h3aa9348h",
            "modelo_id" => 3, //Cronos
        ]);

        Vehiculo::create([
            "patente" => "zaa146",
            "chasis" => "gr56gsa29d48h",
            "modelo_id" => 4, //Kangoo
        ]);

    }
}
