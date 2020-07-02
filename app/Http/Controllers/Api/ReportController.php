<?php

namespace BitzenTecnologia\Http\Controllers\Api;

use BitzenTecnologia\Models\Supply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use BitzenTecnologia\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Exceptions\UnauthorizedException;

class ReportController extends Controller
{

    public function getMonthlyQuantityLitersSupplied(Request $request)
    {
        if (!Auth::user()->hasRole(['manager']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $period = [
            $request->initialDate,
            $request->finalDate
        ];

        $quantityLitersSuppliedByMonth = Supply::select([DB::raw('year(supply_date) as year, month(supply_date) as month, SUM(liters_filled) as total_liters_filled')])
            ->whereBetween('supply_date', $period)
            ->groupBy(['year','month'])
            ->get();

        return $quantityLitersSuppliedByMonth;

    }

    public function getMonthlyAmountPaid(Request $request)
    {
        if (!Auth::user()->hasRole(['manager']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $period = [
            $request->initialDate,
            $request->finalDate
        ];

        $amountPaidByMonth = Supply::select([DB::raw('year(supply_date) as year, month(supply_date) as month, SUM(amount_paid) as total_amount_paid')])
            ->whereBetween('supply_date', $period)
            ->groupBy(['year','month'])
            ->get();

        return $amountPaidByMonth;

    }

    public function getMonthlyMileage(Request $request)
    {
        if (!Auth::user()->hasRole(['manager']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $period = [
            $request->initialDate,
            $request->finalDate
        ];

        $mileageByMonth = Supply::select([DB::raw('year(supply_date) as year, month(supply_date) as month, SUM(supply_km) as total_supply_km')])
            ->whereBetween('supply_date', $period)
            ->groupBy(['year','month'])
            ->get();

        return $mileageByMonth;

    }

    public function getMonthlyAverageValuesByCar(Request $request)
    {
        if (!Auth::user()->hasRole(['manager']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $averageValuesByCar = Supply::select([DB::raw('vehicle_id as vehicle, year(supply_date) as year, month(supply_date) as month, AVG(liters_filled) as avg_liters_filled, AVG(amount_paid) as avg_amount_paid, AVG(supply_km) as avg_supply_km')])
            ->groupBy(['vehicle','year','month'])
            ->orderBy('vehicle')
            ->get();

        return $averageValuesByCar;

    }

}
