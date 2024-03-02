<?php

use App\Http\Controllers\Products\brands\BrandsController;
use App\Http\Controllers\Products\category\CategoryController;
use App\Http\Controllers\Products\subcategory\SubCategoryController;
use App\Http\Controllers\Products\products\ProductsController;
use App\Http\Controllers\enterprise\information\EnterpriseInfoController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Storage\Home\StorageController;

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
    
    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('products/subcategory', 'index')->name('subcategory.index');
        Route::get('products/subcategory/create', 'create')->name('subcategory.create');
        Route::post('products/subcategory/create', 'store')->name('subcategory.store');
        Route::get('products/subcategory/edit/{uuid}', 'edit')->name('subcategory.edit');
        Route::put('products/subcategory/edit/{uuid}', 'update')->name('subcategory.update');
        Route::post('products/category/desactivate/{uuid}', 'desactivate')->name('category.desactivate');
        Route::post('products/category/activate/{uuid}', 'activate')->name('category.activate');

        // Get subcategory by category uuid
        Route::get('products/subcategory/getSubcategory/{uuid}', 'getSubcategory')->name('subcategory.get-subcategory');
    });

    Route::controller(ProductsController::class)->group(function(){
        Route::get('products/home', 'index')->name('products.index');
        Route::get('products/home/create', 'create')->name('products.create');
        Route::post('products/create', 'store')->name('products.store');
        Route::get('products/edit/{uuid}', 'edit')->name('products.edit');
        Route::put('products/edit/{uuid}', 'update')->name('products.update');
        Route::post('products/desactivate/{uuid}', 'desactivate')->name('products.desactivate');
        Route::post('products/activate/{uuif}', 'activate')->name('products.activate');
    });

    Route::controller(EnterpriseInfoController::class)->group(function(){
        Route::get('enterprise/information', 'index')->name('enterprise.index');
    });

    Route::controller(StorageController::class)->group(function(){
        Route::get('storage/home', 'index')->name('storage.index');
        // Route::get('storage/home/create', 'create')->name('storage.create');
        // Route::post('storage/create', 'store')->name('storage.store');
        // Route::get('storage/edit/{uuid}', 'edit')->name('storage.edit');
        // Route::put('storage/edit/{uuid}', 'update')->name('storage.update');
        // Route::post('storage/desactivate/{uuid}', 'desactivate')->name('storage.desactivate');
        // Route::post('storage/activate/{uuif}', 'activate')->name('storage.activate');
    });


    
});

