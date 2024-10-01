<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Modelo;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modelo::create([
            "nombre" => "Fiesta",
            "marca_id" => 1 //Ford
        ]);

        Modelo::create([
            "nombre" => "Eco Sport",
            "marca_id" => 1 //Ford
        ]);

        Modelo::create([
            "nombre" => "Cronos",
            "marca_id" => 2 //Fiat
        ]);

        Modelo::create([
            "nombre" => "Kangoo",
            "marca_id" => 3 //Renault
        ]);
    }
}
