<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\LocationTypeController;

use App\Http\Controllers\EmployeeContractController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProcessingWDController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FundController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CooperationController;
use App\Http\Controllers\EmployeeEvaluationController;
use App\Http\Controllers\LocationDivisionController;
use App\Http\Controllers\PermissionRequestController;
use App\Http\Middleware\AuthMiddleware;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/test', [ProductController::class, 'test']);
Route::get('/processing_wd', [ProcessingWDController::class, 'index']);
Route::get('/processing_wd/create', [ProcessingWDController::class, 'create'])->name('processing_wd.create');


Route::get('/location/pdf', [LocationController::class, 'downloadPDF'])->name('location.pdf');
Route::resource('location', LocationController::class);
Route::resource('location-type', LocationTypeController::class);

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
    Route::get('/profile/{id}/edit', [ProfileController::class, 'show'])->name('profileform');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::resource('cooperations', CooperationController::class);
    Route::resource('funds', FundController::class);


    Route::prefix('employee-contract')->controller(EmployeeContractController::class)->group(function () {
        Route::get('/', 'index')->name('employee-contract.index');
        Route::get('/create', 'create')->name('employee-contract.create');
        Route::post('/', 'store')->name('employee-contract.store');
        Route::get('/{employeeContract}/edit', 'edit')->name('employee-contract.edit');
        Route::put('/{employeeContract}', 'update')->name('employee-contract.update');
        Route::delete('/{employeeContract}', 'destroy')->name('employee-contract.destroy');
        Route::get('/{employeeContract}', 'show')->name('employee-contract.show');
    });

    Route::get('/employee-evaluation', [EmployeeEvaluationController::class, 'index']);
    Route::get('/employee-evaluation/create', [EmployeeEvaluationController::class, 'create'])->name('employee-evaluation.create');
    Route::get('/employee-evaluation/index', [EmployeeEvaluationController::class, 'index'])->name('employee-evaluation.index');
    Route::get('/employee-evaluation/{employeeEvaluation}/edit', [EmployeeEvaluationController::class, 'edit'])->name('employee-evaluation.edit');
    Route::put('/employee-evaluation/{employeeEvaluation}/update', [EmployeeEvaluationController::class, 'update'])->name('employee-evaluation.update');
    Route::get('/employee-evaluation/search', [EmployeeEvaluationController::class, 'search'])->name('employee-evaluation.search');
    Route::delete('/employee-evaluation/{id}', [EmployeeEvaluationController::class, 'destroy'])->name('employee-evaluation.destroy');
    Route::get('/employee/{id}/absensi', [EmployeeEvaluationController::class, 'showAbsensi'])->name('employee.absensi');
    Route::get('/employee/{id}/datakerja', [EmployeeEvaluationController::class, 'showDataKerja'])->name('employee.datakerja');

    Route::post('/employee-evaluation', [EmployeeEvaluationController::class, 'store'])->name('employee-evaluation.store');

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

Route::prefix('permission-request')->controller(PermissionRequestController::class)->name('permissions-request.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});
