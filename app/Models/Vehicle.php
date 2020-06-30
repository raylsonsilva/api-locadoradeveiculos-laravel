<?php

namespace BitzenTecnologia\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'year',
        'board',
        'vehicle_type',
        'fuel_type',
        'first_mileage'
    ];

}
