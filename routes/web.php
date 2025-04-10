<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FundController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\AuthMiddleware;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/location-division', [LocationDivisionController::class, 'index'])->name('location-division.index');
Route::get('/location-division/create', [LocationDivisionController::class, 'create'])->name('location-division.create');
Route::post('/location-division', [LocationDivisionController::class, 'store'])->name('location-division.store');
Route::get('/location-division/{id}/edit', [LocationDivisionController::class, 'edit'])->name('location-division.edit');
Route::put('/location-division/{id}', [LocationDivisionController::class, 'update'])->name('location-division.update');
Route::delete('/location-division/{id}', [LocationDivisionController::class, 'destroy'])->name('location-division.destroy');

Route::resource('funds', FundController::class);

Route::prefix('v1')->group(function () {
    Route::prefix('products')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index');           // GET /api/v1/products
        Route::post('/', 'store');          // POST /api/v1/products
        Route::get('{id}', 'show');         // GET /api/v1/products/{id}
        Route::put('{id}', 'update');       // PUT /api/v1/products/{id}
        Route::delete('{id}', 'destroy');   // DELETE /api/v1/products/{id}
    });
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
});

Route::prefix('employee-contract')->controller(EmployeeContractController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/', 'store');
    Route::get('/{id}/edit', 'edit');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});
