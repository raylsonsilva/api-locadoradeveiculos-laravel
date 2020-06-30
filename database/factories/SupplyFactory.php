<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use BitzenTecnologia\Models\Supply;
use Faker\Generator as Faker;
use \BitzenTecnologia\Models\Vehicle;

$factory->define(Supply::class, function (Faker $faker) {
    $vehicles = Vehicle::pluck('id')->toArray();
    return [
        'vehicle_id' => $faker->randomElement($vehicles),
        'supply_km' => $faker->randomFloat(8,4,8),
        'liters_filled' => $faker->randomFloat(8,4,8),
        'amount_paid' => $faker->randomFloat(8,4,8),
        'supply_date' => $faker->dateTimeThisYear(),
        'gas_station' => $faker->randomElement(['Petrobras','Texaco','Shell']),
        'fuel_type' => $faker->randomElement(['Gasoline','Alcohol'])
    ];
});
