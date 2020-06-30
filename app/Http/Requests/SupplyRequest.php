<?php

namespace BitzenTecnologia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplyRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'vehicle_id' => 'required|exists:vehicles,id',
            'supply_km' => 'required',
            'liters_filled' => 'required',
            'amount_paid' => 'required',
            'supply_date' => 'required',
            'gas_station' => 'required|max:255',
            'fuel_type' => 'required|max:255'
        ];
    }
}
