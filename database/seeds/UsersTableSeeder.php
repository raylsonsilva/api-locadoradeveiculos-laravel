<?php

use Illuminate\Database\Seeder;
use \BitzenTecnologia\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {

        $user = new User();
        $user->name = "Raylson Lima";
        $user->email = "raylson.lima@bitzen.com.br";
        $user->email_verified_at = now();
        $user->password = bcrypt("dev@bitzen2020");
        $user->remember_token = Str::random(10);
        $user->save();

        $user = new User();
        $user->name = "Virginia Nunes";
        $user->email = "virginia.nunes@bitzen.com.br";
        $user->email_verified_at = now();
        $user->password = bcrypt("user@bitzen2020");
        $user->remember_token = Str::random(10);
        $user->save();

    }
}
