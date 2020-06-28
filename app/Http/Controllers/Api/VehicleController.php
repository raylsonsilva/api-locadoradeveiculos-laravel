<?php

namespace BitzenTecnologia\Http\Controllers\Api;

use BitzenTecnologia\Http\Controllers\Controller;
use BitzenTecnologia\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function index()
    {
        return Vehicle::all();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Vehicle $vehicle)
    {
        return $vehicle;
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
