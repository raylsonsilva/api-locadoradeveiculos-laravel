<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(VehiclesTableSeeder::class);
        $this->call(SuppliesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AccessControlListSeeder::class);
    }
}
