<?php

namespace BitzenTecnologia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'brand' => 'required|max:255',
            'model' => 'required|max:255',
            'year' => 'required|min:4|max:4',
            'board' => 'unique:vehicles,board|required|min:7|max:7',
            'vehicle_type' => 'required|max:255',
            'fuel_type' => 'required|max:255',
            'first_mileage' => 'required'
        ];
    }
}
