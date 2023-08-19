<?php

use App\Http\Controllers\BrandsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home.index');
    Route::get('login', 'login')->name('home.login');
    Route::post('login', 'loginUser')->name('home.loginUser');
    Route::get('register', 'register')->name('home.register');
    Route::post('register', 'newUser')->name('home.newUser');
});


Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', function () {
        return view('dashboard.home');
    })->name('dashboard');

    Route::controller(BrandsController::class)->group(function(){
        Route::get('products/brands', 'index')->name('brands.index');
        // Route::get('brands/create', 'create')->name('brands.create');
        // Route::post('brands/create', 'store')->name('brands.store');
        // Route::get('brands/{id}/edit', 'edit')->name('brands.edit');
        // Route::post('brands/{id}/edit', 'update')->name('brands.update');
        // Route::get('brands/{id}/delete', 'delete')->name('brands.delete');
        // Route::post('brands/{id}/delete', 'destroy')->name('brands.destroy');
    });
    
});

