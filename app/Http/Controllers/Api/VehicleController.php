<?php

namespace BitzenTecnologia\Http\Controllers\Api;

use BitzenTecnologia\Http\Controllers\Controller;
use BitzenTecnologia\Http\Requests\VehicleRequest;
use BitzenTecnologia\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;


class VehicleController extends Controller
{

    public function index()
    {
        if (!Auth::user()->hasRole('manager'))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }
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
