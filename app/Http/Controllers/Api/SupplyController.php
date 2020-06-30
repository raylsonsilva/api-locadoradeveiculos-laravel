<?php

namespace BitzenTecnologia\Http\Controllers\Api;

use BitzenTecnologia\Http\Controllers\Controller;
use BitzenTecnologia\Models\Supply;
use Illuminate\Http\Request;

class SupplyController extends Controller
{

    public function index()
    {
        return Supply::all();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Supply $supply)
    {
        //
    }

    public function update(Request $request, Supply $supply)
    {
        //
    }

    public function destroy(Supply $supply)
    {
        //
    }
}
