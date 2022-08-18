<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', [AuthController::class, 'index'])->name('login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('login.auth');
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('/products', ProductController::class);
        Route::resource('/categories', CategoryController::class);
    });
});


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/{category}/products', [\App\Http\Controllers\CategoryController::class, 'show'])->name('category.get_products');
Route::get('/products/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.get_product');
