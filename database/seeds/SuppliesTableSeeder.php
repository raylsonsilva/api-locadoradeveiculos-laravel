<?php

use Illuminate\Database\Seeder;
use \BitzenTecnologia\Models\Supply;

class SuppliesTableSeeder extends Seeder
{

    public function run()
    {
        factory(Supply::class,100)->create();
    }
}
