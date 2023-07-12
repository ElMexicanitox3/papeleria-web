<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
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

    Route::controller(ProductsController::class)->group(function(){
        Route::get('products', 'index')->name('products.home');
        Route::get('products/create', 'create')->name('products.create');
        Route::post('products/create', 'store')->name('products.store');
        Route::get('products/edit/{uuid}', 'edit')->name('products.edit');
    });
});
