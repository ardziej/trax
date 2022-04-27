<?php

use App\Http\Controllers\API\CarController;
use App\Http\Controllers\API\TripController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('cars', CarController::class)->except(['update']);
    Route::apiResource('trips', TripController::class)->only(['index', 'store']);
});
