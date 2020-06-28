<?php

use Illuminate\Database\Seeder;
use BitzenTecnologia\Models\Vehicle;

class VehiclesTableSeeder extends Seeder
{

    public function run()
    {
        factory(Vehicle::class,100)->create();
    }
}
