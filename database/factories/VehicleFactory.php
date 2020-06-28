<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use BitzenTecnologia\Models\Vehicle;
use Faker\Generator as Faker;

$factory->define(Vehicle::class, function (Faker $faker) {
    return [
        'brand' => $faker->randomElement(['fiat','chevrolet','kia','tesla','honda','yamaha']),
        'model' => $faker->randomElement(['sedan','hatch','trail','tour']),
        'year' => $faker->randomElement([2017,2018,2019,2020]),
        'board' => $faker->randomElement(['PNS','OXH','OTP','BHG']).$faker->randomNumber(4),
        'vehicle_type' => $faker->randomElement(['Car','Motorcycle','Truck','Bus']),
        'fuel_type' => $faker->randomElement(['Gasoline','Alcohol']),
        'first_mileage' => 0
    ];
});
