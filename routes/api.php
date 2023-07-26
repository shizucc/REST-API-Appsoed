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

Route::resource('/kost/facility', KostFacilityController::class)->names([
    'index' => 'kost.facility.index',
    'create' => 'kost.facility.create',
    'show' => 'kost.facility.show',
    'edit' => 'kost.facility.edit',
    'update' => 'kost.facility.update',
    'delete' => 'kost.facility.delete',
]);
Route::resource('/kost/image', KostImageController::class)->names([
    'index' => 'kost.image.index',
    'create' => 'kost.image.create',
    'show' => 'kost.image.show',
    'edit' => 'kost.image.edit',
    'update' => 'kost.image.update',
    'delete' => 'kost.image.delete',
]);
Route::resource('/kost', KostController::class);
