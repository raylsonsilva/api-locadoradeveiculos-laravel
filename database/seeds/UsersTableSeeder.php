<?php

use Illuminate\Database\Seeder;
use \BitzenTecnologia\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        factory(User::class,3)->create();
    }
}
