<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProcessingWDController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [ProductController::class, 'test']);
Route::get('/processing_wd', [ProcessingWDController::class, 'index']);
Route::get('/processing_wd/create', [ProcessingWDController::class, 'create'])->name('processing_wd.create');


Route::prefix('v1')->group(function () {
    Route::prefix('products')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index');           // GET /api/v1/products
        Route::post('/', 'store');          // POST /api/v1/products
        Route::get('{id}', 'show');         // GET /api/v1/products/{id}
        Route::put('{id}', 'update');       // PUT /api/v1/products/{id}
        Route::delete('{id}', 'destroy');   // DELETE /api/v1/products/{id}
    });
});