<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DiscontController;
use App\Http\Controllers\GroupCityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/cities', CityController::class);
    Route::apiResource('/states', StateController::class);
    Route::apiResource('/campaigns', CampaignController::class);
    Route::apiResource('/disconts', DiscontController::class);
    Route::apiResource('/group_cities', GroupCityController::class);
    Route::apiResource('/products', ProductController::class);
});
