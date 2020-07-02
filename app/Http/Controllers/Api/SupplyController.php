<?php

namespace BitzenTecnologia\Http\Controllers\Api;

use BitzenTecnologia\Http\Controllers\Controller;
use BitzenTecnologia\Http\Requests\SupplyRequest;
use BitzenTecnologia\Models\Supply;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class SupplyController extends Controller
{

    public function index()
    {
        if (!Auth::user()->hasRole(['manager','employe']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        return Supply::all();
    }

    public function store(SupplyRequest $request)
    {
        if (!Auth::user()->hasRole(['manager','employe']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        return Supply::create($request->all());
    }

    public function show(Supply $supply)
    {
        if (!Auth::user()->hasRole(['manager','employe']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        return $supply;
    }

    public function update(SupplyRequest $request, Supply $supply)
    {
        if (!Auth::user()->hasRole(['manager','employe']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $supply->update($request->all());
        return $supply;
    }

    public function destroy(Supply $supply)
    {
        if (!Auth::user()->hasRole(['manager','employe']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $supply->delete();
        return response()->noContent();
    }
}
