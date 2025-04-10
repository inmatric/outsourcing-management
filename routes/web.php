<?php

use App\Http\Controllers\OffenceController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [ProductController::class, 'test']);
Route::get('/offence', [OffenceController::class, 'index']);
Route::get('/offence/create', [OffenceController::class, 'create'])->name('offence.create');



Route::prefix('v1')->group(function () {
    Route::prefix('products')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index');           // GET /api/v1/products
        Route::post('/', 'store');          // POST /api/v1/products
        Route::get('{id}', 'show');         // GET /api/v1/products/{id}
        Route::put('{id}', 'update');       // PUT /api/v1/products/{id}
        Route::delete('{id}', 'destroy');   // DELETE /api/v1/products/{id}
    });
});