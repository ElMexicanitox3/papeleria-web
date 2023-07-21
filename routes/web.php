<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
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
        Route::put('products/edit/{uuid}', 'update')->name('products.update');
        Route::post('products/desactivate/{uuid}', 'desactivate')->name('products.desactivate');
        Route::post('products/activate/{uuid}', 'activate')->name('products.activate');
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::get('category', 'index')->name('category.home');
        Route::get('category/create', 'create')->name('category.create');
        Route::post('category/create', 'store')->name('category.store');
        Route::get('category/edit/{uuid}', 'edit')->name('category.edit');
        Route::put('category/edit/{uuid}', 'update')->name('category.update');
        Route::post('category/desactivate/{uuid}', 'desactivate')->name('category.desactivate');
        Route::post('category/activate/{uuid}', 'activate')->name('category.activate');
    });

    Route::controller(SubcategoryController::class)->group(function(){
        Route::get('subcategory', 'index')->name('subcategory.home');
        Route::get('subcategory/create', 'create')->name('subcategory.create');
        Route::post('subcategory/create', 'store')->name('subcategory.store');
        Route::get('subcategory/edit/{uuid}', 'edit')->name('subcategory.edit');
        Route::put('subcategory/edit/{uuid}', 'update')->name('subcategory.update');
    });
});
