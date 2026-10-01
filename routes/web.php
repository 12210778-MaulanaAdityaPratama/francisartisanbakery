<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/store', [StoreController::class, 'index'])->name('store');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// New Routes
Route::get('/menu/{slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::get('/hampers', [\App\Http\Controllers\HampersController::class, 'index'])->name('hampers');
Route::get('/care', [\App\Http\Controllers\CareController::class, 'index'])->name('care');
Route::get('/wholesale', [\App\Http\Controllers\WholesaleController::class, 'index'])->name('wholesale');
Route::get('/career', [\App\Http\Controllers\CareerController::class, 'index'])->name('career');