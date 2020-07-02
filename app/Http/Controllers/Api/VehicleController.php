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
        if (!Auth::user()->hasRole(['manager','employe']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        return Vehicle::all();
    }

    public function store(VehicleRequest $request)
    {
        if (!Auth::user()->hasRole(['manager']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        return Vehicle::create($request->all());
    }

    public function show(Vehicle $vehicle)
    {
        if (!Auth::user()->hasRole(['manager','employe']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        return $vehicle;
    }

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        if (!Auth::user()->hasRole(['manager']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $vehicle->update($request->all());
        return $vehicle;
    }

    public function destroy(Vehicle $vehicle)
    {
        if (!Auth::user()->hasRole(['manager']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $vehicle->delete();
        return response()->noContent();
    }
}
