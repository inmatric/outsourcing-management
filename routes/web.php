<?php

use App\Http\Controllers\EmployeeContractController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [ProductController::class, 'test']);

Route::prefix('v1')->group(function () {
    Route::prefix('products')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index');           // GET /api/v1/products
        Route::post('/', 'store');          // POST /api/v1/products
        Route::get('{id}', 'show');         // GET /api/v1/products/{id}
        Route::put('{id}', 'update');       // PUT /api/v1/products/{id}
        Route::delete('{id}', 'destroy');   // DELETE /api/v1/products/{id}
    });
});


Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/', 'store');
    Route::get('/{id}/edit', 'edit');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::prefix('employee-contract')->controller(EmployeeContractController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/', 'store');
    Route::get('/{id}/edit', 'edit');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});
