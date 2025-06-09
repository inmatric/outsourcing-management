<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\CooperationController;
use App\Http\Controllers\EmployeeContractController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LocationDivisionController;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\ItemFoundController;
use App\Http\Controllers\LocationTypeController;
use App\Http\Controllers\ProcessingWDController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkToolsController;
use App\Http\Middleware\AuthMiddleware;


Route::get('/', function () {
    return redirect()->route('login');
});



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


    Route::resource('worktools', WorkToolsController::class);

    Route::resource('cooperations', CooperationController::class);
    Route::resource('funds', FundController::class);

    Route::resource('complaints', ComplaintController::class);
    Route::get('/get-employee/{location}', [ComplaintController::class, 'getEmployeeByLocation']);
    Route::get('/get-employee-by-location/{locationId}', [ComplaintController::class, 'getEmployeeByLocation']);

    Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
    Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');
    Route::get('/attendances/creates', [AttendanceController::class, 'creates'])->name('attendances.creates');
    Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store');
    Route::delete('/attendances/{id}', [AttendanceController::class, 'destroy'])->name('attendances.destroy');
    Route::get('/employees-attendances', [AttendanceController::class, 'indexs'])->name('employees_attendances.index');
    Route::patch('/attendances/{id}/status', [AttendanceController::class, 'updateStatus'])->name('attendances.update-status');

    Route::get('/lostitem', [LostItemController::class, 'index'])->name('lostitem.index');
    Route::get('/lostitem/create', [LostItemController::class, 'create'])->name('lostitem.create');
    Route::post('/lostitem', [LostItemController::class, 'store'])->name('lostitem.store');
    Route::get('/lostitem/{id}/edit', [LostItemController::class, 'edit'])->name('lostitem.edit');
    Route::put('/lostitem/{id}', [LostItemController::class, 'update'])->name('lostitem.update');
    Route::delete('/lostitem/{id}', [LostItemController::class, 'destroy'])->name('lostitem.destroy');

    Route::get('/itemfound/create', [ItemFoundController::class, 'create'])->name('itemfound.create');
    Route::post('/itemfound', [ItemFoundController::class, 'store'])->name('itemfound.store');
    Route::get('/itemfound/{id}/edit', [ItemFoundController::class, 'edit'])->name('itemfound.edit');
    Route::put('/itemfound/{id}', [ItemFoundController::class, 'update'])->name('itemfound.update');
    Route::delete('/itemfound/{id}', [ItemFoundController::class, 'destroy'])->name('itemfound.destroy');

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

    Route::prefix('employee-contract')->controller(EmployeeContractController::class)->name('employee-contract.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('processing_wd')->group(function () {
        Route::get('/', [ProcessingWDController::class, 'index'])
            ->name('processing_wd.index');
        Route::get('/create', [ProcessingWDController::class, 'create'])
            ->name('processing_wd.create');
        Route::post('/', [ProcessingWDController::class, 'store'])
            ->name('processing_wd.store');
        Route::get('/{processing_wd}', [ProcessingWDController::class, 'show'])
            ->name('processing_wd.show');
        Route::get('/{processing_wd}/edit', [ProcessingWDController::class, 'edit'])
            ->name('processing_wd.edit');
        Route::put('/{processing_wd}', [ProcessingWDController::class, 'update'])
            ->name('processing_wd.update');
        Route::delete('/{processing_wd}', [ProcessingWDController::class, 'destroy'])
            ->name('processing_wd.destroy');
    });
});
