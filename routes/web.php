<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LocationTypeController;
use App\Http\Controllers\AttendanceController;

use App\Http\Controllers\EmployeeContractController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProcessingWDController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\WorkToolsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CooperationController;
use App\Http\Controllers\ItemFoundController;
use App\Http\Controllers\LocationDivisionController;
use App\Http\Controllers\LostItemController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsHrd;

// Redirect root to login
Route::get('/', fn() => redirect()->route('login'));

// Public routes (accessible without login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Public worktools routes
Route::get('/worktools/create', [WorkToolsController::class, 'create'])->name('worktools.create');
Route::post('/test-worktools', [WorkToolsController::class, 'store'])->name('worktools.store');
Route::get('test-worktools', [WorkToolsController::class, 'index'])->name('worktools.index');
Route::redirect('/worktools', '/test-worktools');

// Public location routes
Route::get('/test', [ProductController::class, 'test']);
Route::get('/location/pdf', [LocationController::class, 'downloadPDF'])->name('location.pdf');
Route::resource('location', LocationController::class);
Route::resource('location-type', LocationTypeController::class);


Route::prefix('v1')->group(function () {
    Route::prefix('products')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'destroy');
    });
});

// Protected routes (only accessible if logged in)
Route::middleware([AuthMiddleware::class])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [LoginController::class, 'dashboard']);
    
    // Profile routes
    Route::get('/profile', fn() => view('profile'))->name('profile.edit');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'show'])->name('profileform');
    
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('worktools', WorkToolsController::class)->except(['create', 'store']);

    Route::prefix('location-division')->controller(LocationDivisionController::class)->name('location-division.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });


    Route::prefix('employee-contract')->controller(EmployeeContractController::class)->name('employee-contract.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::get('/processing_wd', [ProcessingWDController::class, 'index']);
    Route::get('/processing_wd/create', [ProcessingWDController::class, 'create'])->name('processing_wd.create');
});


    Route::resource('cooperations', CooperationController::class);
    Route::resource('funds', FundController::class);


    Route::prefix('employee-contract')->controller(EmployeeContractController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/', 'store');
        Route::get('/edit', 'edit');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });

    Route::prefix('location-division')->controller(LocationDivisionController::class)->name('location-division.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::get('/petugas', 'indexPetugas')->name('index-petugas');
        Route::put('/update-status/{id}', 'updateStatus')->name('update-status'); 
    });

});


Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');
Route::get('/attendances/creates', [AttendanceController::class, 'creates'])->name('attendances.creates');
Route::delete('/attendances/{id}', [AttendanceController::class, 'destroy'])->name('attendances.destroy');

Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store'); // This is the store route
Route::get('/employees-attendances', [AttendanceController::class, 'indexs'])->name('employees_attendances.index');
Route::patch('/attendances/{id}/status', [AttendanceController::class, 'updateStatus'])->name('attendances.update-status');

    // Complaints
    Route::resource('complaints', ComplaintController::class);
    Route::get('/get-employee/{location}', [ComplaintController::class, 'getEmployeeByLocation']);
    Route::get('/get-employee-by-location/{locationId}', [ComplaintController::class, 'getEmployeeByLocation']);
