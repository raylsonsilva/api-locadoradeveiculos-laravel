<?php

namespace BitzenTecnologia\Models;

use BitzenTecnologia\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use Uuid;

    protected $fillable = [
        'vehicle_id',
        'supply_km',
        'liters_filled',
        'amount_paid',
        'supply_date',
        'gas_station',
        'fuel_type'
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public function vehicle()
    {
        return $this->belongsTo('BitzenTecnologia\Models\Vehicle');
    }
}
