<?php

use App\Http\Controllers\products\brands\BrandsController;
use App\Http\Controllers\products\category\CategoryController;
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
        Route::get('products/brands/create', 'create')->name('brands.create');
        Route::post('products/brands/create', 'store')->name('brands.store');
        Route::get('products/brands/edit/{id}', 'edit')->name('brands.edit');
        Route::put('products/brands/edit/{uuid}', 'update')->name('brands.update');
        Route::post('products/brands/{id}/desactivate', 'desactivate')->name('brands.desactivate');
        Route::post('products/brands/{id}/activate', 'activate')->name('brands.activate');
    });


    Route::controller(CategoryController::class)->group(function(){
        Route::get('products/category', 'index')->name('category.index');
        Route::get('products/category/create', 'create')->name('category.create');
        Route::post('products/category/create', 'store')->name('category.store');
        Route::get('products/category/edit/{uuid}', 'edit')->name('category.edit');
        Route::put('products/category/edit/{uuid}', 'update')->name('category.update');
        Route::post('products/category/desactivate/{uuid}', 'desactivate')->name('category.desactivate');
        Route::post('products/category/activate/{uuif}', 'activate')->name('category.activate');

    });
    
});

