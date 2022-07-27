<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a Group which
| contains the "web" middleware Group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
