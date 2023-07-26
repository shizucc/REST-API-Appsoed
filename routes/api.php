<?php

use App\Http\Controllers\KostController;
use App\Http\Controllers\KostFacilityController;
use App\Http\Controllers\KostImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('/kos', KostController::class);
Route::resource('/fasilitas/kos', KostFacilityController::class);
Route::resource('/image/kos', KostImageController::class);
