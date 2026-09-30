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