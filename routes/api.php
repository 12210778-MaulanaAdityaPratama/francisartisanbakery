<?php

use App\Http\Controllers\Api\AboutUsController;
use App\Http\Controllers\Api\BreadCareController;
use App\Http\Controllers\Api\HamperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Hampers API
Route::prefix('hampers')->group(function () {
    Route::get('/', [HamperController::class, 'index']);
    Route::get('/{slug}', [HamperController::class, 'show']);
});

// About Us API
Route::get('about-us', [AboutUsController::class, 'index']);

// Bread Care API
Route::prefix('bread-care')->group(function () {
    Route::get('/', [BreadCareController::class, 'index']);
    Route::get('/{id}', [BreadCareController::class, 'show']);
});