<?php

namespace BitzenTecnologia\Http\Controllers\Api;

use BitzenTecnologia\Http\Controllers\Controller;
use BitzenTecnologia\Http\Requests\SupplyRequest;
use BitzenTecnologia\Models\Supply;

class SupplyController extends Controller
{

    public function index()
    {
        return Supply::all();
    }

    public function store(SupplyRequest $request)
    {
        return Supply::create($request->all());
    }

    public function show(Supply $supply)
    {
        return $supply;
    }

    public function update(SupplyRequest $request, Supply $supply)
    {
        $supply->update($request->all());
        return $supply;
    }

    public function destroy(Supply $supply)
    {
        $supply->delete();
        return response()->noContent();
    }
}
