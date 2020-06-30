<?php

namespace BitzenTecnologia\Http\Controllers\Api;

use BitzenTecnologia\Http\Controllers\Controller;
use BitzenTecnologia\Http\Requests\VehicleRequest;
use BitzenTecnologia\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function index()
    {
        return Vehicle::all();
    }

    public function store(VehicleRequest $request)
    {
        return Vehicle::create($request->all());
    }

    public function show(Vehicle $vehicle)
    {
        return $vehicle;
    }

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        return $vehicle;
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return response()->noContent();
    }
}
