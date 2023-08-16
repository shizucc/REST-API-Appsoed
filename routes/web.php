<?php

use App\Http\Controllers\Admin\KostController as AdminKostController; 
use App\Http\Controllers\Admin\FacultyController as AdminFacultyController; 
use App\Http\Controllers\Admin\ComicController as AdminComicController;
use App\Http\Controllers\Admin\GensoedMerchandiseController as AdminGensoedMerchandiseController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\KostImageController;
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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.kost.index');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function(){
   Route::resource('/admin/kost', AdminKostController::class)->except(['show'])->names([
        'index' => 'admin.kost.index',
        'create' => 'admin.kost.create',
        'store' => 'admin.kost.store',
        'destroy' => 'admin.kost.destroy',
        'edit' => 'admin.kost.edit',
        'update' => 'admin.kost.update',
   ]);
   Route::resource('/admin/faculty', AdminFacultyController::class)->except('show')->names([
        'index' => 'admin.faculty.index',
        'create' => 'admin.faculty.create',
        'store' => 'admin.faculty.store',
        'destroy' => 'admin.faculty.destroy',
        'edit' => 'admin.faculty.edit',
        'update' => 'admin.faculty.update',
   ]);

   Route::resource('/admin/comic', AdminComicController::class)->except('show')->names([
    'index' => 'admin.comic.index',
    'create' => 'admin.comic.create',
    'store' => 'admin.comic.store',
    'destroy' => 'admin.comic.destroy',
    'edit' => 'admin.comic.edit',
    'update' => 'admin.comic.update',
   ])->except('show');

   Route::resource('/admin/gensoedmerch', AdminGensoedMerchandiseController::class)->except('show')->names([
    'index' => 'admin.gensoedmerch.index',
    'create' => 'admin.gensoedmerch.create',
    'store' => 'admin.gensoedmerch.store',
    'destroy' => 'admin.gensoedmerch.destroy',
    'edit' => 'admin.gensoedmerch.edit',
    'update' => 'admin.gensoedmerch.update',
   ])->except('show');
});

require __DIR__.'/auth.php';
