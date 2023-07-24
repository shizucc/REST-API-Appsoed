<?php

use App\Http\Controllers\Admin\KostController as AdminKostController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function(){
   Route::resource('/admin/kosts/', AdminKostController::class)->names([
        'index' => 'admin.kosts.index',
        'create' => 'admin.kosts.create',
        'store' => 'admin.kosts.store',
        'edit' => 'admin.kosts.edit',
        'update' => 'admin.kosts.update',
        'destroy' => 'admin.kosts.destroy'
   ]);
});

Route::get('/kosts', [KostController::class,'index'])->name('kosts.index');
Route::get('/kosts/{id}', [KostController::class,'show'])->name('kosts.show');
require __DIR__.'/auth.php';
