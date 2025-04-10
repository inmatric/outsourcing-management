<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LocationDivisionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [ProductController::class, 'test']);

Route::get('/location-division', [LocationDivisionController::class, 'index'])->name('location-division.index');
Route::get('/location-division/create', [LocationDivisionController::class, 'create'])->name('location-division.create');
Route::post('/location-division', [LocationDivisionController::class, 'store'])->name('location-division.store');
Route::get('/location-division/{id}/edit', [LocationDivisionController::class, 'edit'])->name('location-division.edit');
Route::put('/location-division/{id}', [LocationDivisionController::class, 'update'])->name('location-division.update');
Route::delete('/location-division/{id}', [LocationDivisionController::class, 'destroy'])->name('location-division.destroy');

Route::prefix('v1')->group(function () {
    Route::prefix('products')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index');           // GET /api/v1/products
        Route::post('/', 'store');          // POST /api/v1/products
        Route::get('{id}', 'show');         // GET /api/v1/products/{id}
        Route::put('{id}', 'update');       // PUT /api/v1/products/{id}
        Route::delete('{id}', 'destroy');   // DELETE /api/v1/products/{id}
    });
});