<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request)
{
    return $request->user();
});

Route::group(['namespace' => 'Api'], function ()
{
    Route::resource('vehicles', 'VehicleController', ['except' => ['create','edit']]);
    Route::resource('supplies', 'SupplyController', ['except' => ['create','edit']]);
});

Route::group(['namespace' => 'Auth'], function ()
{
    Route::resource('roles', 'RoleController', ['except' => ['create','edit']]);
    Route::resource('permissions', 'PermissionController', ['except' => ['create','edit']]);
});


Route::prefix('reports')->group(function ()
{
    Route::get('monthly_quantity_liters_supplied/{initialDate}/{finalDate}','Api\ReportController@getMonthlyQuantityLitersSupplied');
    Route::get('monthly_amount_paid/{initialDate}/{finalDate}','Api\ReportController@getMonthlyAmountPaid');
    Route::get('monthly_mileage/{initialDate}/{finalDate}','Api\ReportController@getMonthlyMileage');
    Route::get('monthly_average_values_by_car','Api\ReportController@getMonthlyAverageValuesByCar');
});

