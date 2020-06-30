<?php

namespace BitzenTecnologia\Models;

use BitzenTecnologia\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;


class Vehicle extends Model
{
    use Uuid;

    protected $fillable = [
        'brand',
        'model',
        'year',
        'board',
        'vehicle_type',
        'fuel_type',
        'first_mileage'
    ];

    protected $casts = [
        'id' => 'string'
    ];

}
