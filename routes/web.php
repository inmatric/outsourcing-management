<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [ProductController::class, 'test']);
Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');
Route::get('/attendances/creates', [AttendanceController::class, 'creates'])->name('attendances.creates');
Route::delete('/attendances/{id}', [AttendanceController::class, 'destroy'])->name('attendances.destroy');
Route::get('/attendances/{attendance}', [AttendanceController::class, 'show'])->name('attendances.show');
Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store'); // This is the store route
Route::get('/attendances/{id}/edit', [AttendanceController::class, 'edit'])->name('attendances.edit');
Route::put('/attendances/{attendance}', [AttendanceController::class, 'update'])->name('attendances.update');
Route::prefix('v1')->group(function () {
    Route::prefix('products')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index');           // GET /api/v1/products
        Route::post('/', 'store');          // POST /api/v1/products
        Route::get('{id}', 'show');         // GET /api/v1/products/{id}
        Route::put('{id}', 'update');       // PUT /api/v1/products/{id}
        Route::delete('{id}', 'destroy');   // DELETE /api/v1/products/{id}
    });
});