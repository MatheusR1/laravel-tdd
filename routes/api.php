<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/cities', CityController::class);
Route::apiResource('/states', StateController::class);
