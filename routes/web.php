<?php

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

use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;


Route::redirect('/', '/login');

Route::middleware(['auth'])->group(function () {
    Route::view('/home', 'pages.home')->name('home');


    Route::prefix('/provinces')
        ->group(function() {
            Route::get('/', [ProvinceController::class, 'index'])->name('province.index');

            Route::get('/create', [ProvinceController::class, 'create'])->name('province.create');
            Route::post('/', [ProvinceController::class, 'store'])->name('province.store');

            Route::get('/{province}/edit', [ProvinceController::class, 'edit'])->name('province.edit');
            Route::put('/{province}', [ProvinceController::class, 'update'])->name('province.update');

            Route::delete('/{province}', [ProvinceController::class, 'destroy'])->name('province.destroy');
        });
        
    Route::prefix('/cities')
    ->group(function() {
        Route::get('/', [CityController::class, 'index'])->name('city.index');

        Route::get('/create', [CityController::class, 'create'])->name('city.create');
        Route::post('/', [CityController::class, 'store'])->name('city.store');

        Route::get('/{city}/edit', [CityController::class, 'edit'])->name('city.edit');
        Route::put('/{city}', [CityController::class, 'update'])->name('city.update');

        Route::delete('/{city}', [CityController::class, 'destroy'])->name('city.destroy');
    });


});
