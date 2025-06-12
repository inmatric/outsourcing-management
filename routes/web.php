<?php


use App\Http\Controllers\LocationController;
use App\Http\Controllers\LocationTypeController;

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeContractController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProcessingWDController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OffenceController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ComplaintResolutionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CooperationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeEvaluationController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\ItemFoundController;
use App\Http\Controllers\LocationDivisionController;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\PermissionRequestController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\WorkToolsController;
use App\Http\Controllers\WorkEquipmentController;
use App\Http\Controllers\WorkReportController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsHrd;
use App\Http\Controllers\WorkController;
// Redirect root to login
Route::get('/', fn() => redirect()->route('login'));

// Public route (bisa diakses tanpa login)
Route::get('/worktools/create', [WorkToolsController::class, 'create'])->name('worktools.create');
Route::post('/test-worktools', [WorkToolsController::class, 'store'])->name('worktools.store');



// List worktools (opsional, bisa dijadikan public)
Route::get('test-worktools', [WorkToolsController::class, 'index'])->name('worktools.index');
Route::redirect('/worktools', '/test-worktools');

Route::get('/worktools/{id}/edit', [WorkToolsController::class, 'edit'])->name('worktools.edit');
Route::put('/worktools/{id}', [WorkToolsController::class, 'update'])->name('worktools.update');
Route::delete('/worktools/{id}', [WorkToolsController::class, 'destroy'])->name('worktools.destroy');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::get('/location/pdf', [LocationController::class, 'downloadPDF'])->name('location.pdf');
Route::resource('location', LocationController::class);
Route::resource('location-type', LocationTypeController::class);

// Public location routes
Route::get('/test', [ProductController::class, 'test']);

Route::prefix('v1')->group(function () {
    Route::prefix('products')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'destroy');
    });
});

Route::middleware([AuthMiddleware::class])->group(function () {

    // Dashboard
    Route::get('/dashboard', [LoginController::class, 'dashboard']);

    // Profile routes
    Route::get('/profile/{id}/edit', [ProfileController::class, 'show'])->name('profileform');
    Route::put('/profile/{id}/edit', [ProfileController::class, 'update'])->name('profileaction');

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // 🛡 Admin only routes
    Route::middleware([IsAdmin::class])->group(function () {
        // User management
        Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // Admin resourcesF
        Route::resource('cooperations', CooperationController::class);
        Route::resource('funds', FundController::class);
    });

    // 🛡 HRD only routes
    Route::middleware([IsHrd::class])->group(function () {
        // Worktools (except create and store which are public)
        Route::get('/worktools/{id}/edit', [WorkToolsController::class, 'edit'])->name('worktools.edit');
        Route::put('/worktools/{id}', [WorkToolsController::class, 'update'])->name('worktools.update');
        Route::delete('/worktools/{id}', [WorkToolsController::class, 'destroy'])->name('worktools.destroy');

        Route::get('/location/pdf', [LocationController::class, 'downloadPDF'])->name('location.pdf');
        Route::resource('location', LocationController::class);
        Route::resource('location-type', LocationTypeController::class);

        // API routes
        // Location Division
        Route::prefix('location-divisions')->controller(LocationDivisionController::class)->name('location-division.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
            Route::get('/petugas', 'indexPetugas')->name('index-petugas');
            Route::put('/update-status/{id}', 'updateStatus')->name('update-status');
        });

        // Employee Contract
        Route::prefix('employee-contracts')->controller(EmployeeContractController::class)->name('employee-contract.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // Processing WD
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

    // Location Routes
    Route::prefix('location')->controller(LocationController::class)->name('location.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::get('/{id}/show', 'show')->name('show');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
    Route::prefix('location-type')->controller(LocationTypeController::class)->name('location-type.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });


    // 📋 Routes accessible by all logged-in users
    // Attendances
    Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
    Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');
    Route::get('/attendances/creates', [AttendanceController::class, 'creates'])->name('attendances.creates');
    Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store');
    Route::delete('/attendances/{id}', [AttendanceController::class, 'destroy'])->name('attendances.destroy');
    Route::get('/employees-attendances', [AttendanceController::class, 'indexs'])->name('employees_attendances.index');
    Route::patch('/attendances/{id}/status', [AttendanceController::class, 'updateStatus'])->name('attendances.update-status');

    // Complaints
    Route::resource('complaints', ComplaintController::class);
    Route::get('/get-employee/{location}', [ComplaintController::class, 'getEmployeeByLocation']);
    Route::get('/get-employee-by-location/{locationId}', [ComplaintController::class, 'getEmployeeByLocation']);

    // Complaint Resolutions
    Route::get('/complaint_resolutions', [ComplaintResolutionController::class, 'index'])->name('complaint_resolution.index');
    Route::get('/complaint_resolutions/create', [ComplaintResolutionController::class, 'create'])->name('complaint_resolution.create');
    Route::post('/complaint_resolutions', [ComplaintResolutionController::class, 'store'])->name('complaint_resolution.store');
    Route::get('/complaint_resolutions/{id}/edit', [ComplaintResolutionController::class, 'edit'])->name('complaint_resolution.edit');
    Route::put('/complaint_resolutions/{id}', [ComplaintResolutionController::class, 'update'])->name('complaint_resolution.update');
    Route::delete('/complaint_resolutions/{id}', [ComplaintResolutionController::class, 'destroy'])->name('complaint_resolution.destroy');
    Route::get('/get-complaint-detail/{id}', [ComplaintController::class, 'getDetail']);

    Route::get('/offences', [OffenceController::class, 'index'])->name('offence.index');
    Route::get('/offences/create', [OffenceController::class, 'create'])->name('offence.create');
    Route::post('/offences', [OffenceController::class, 'store'])->name('offence.store');
    Route::get('/offences/{id}/edit', [OffenceController::class, 'edit'])->name('offence.edit');
    Route::put('/offences/{id}', [OffenceController::class, 'update'])->name('offence.update');
    Route::delete('/offences/{id}', [OffenceController::class, 'destroy'])->name('offence.destroy');
    Route::get('/offences/search', [OffenceController::class, 'search'])->name('offence.search');
    Route::get('/offences/show/{id}', [OffenceController::class, 'show'])->name('offence.show');

    Route::prefix('workreports')->controller(WorkReportController::class)->group(function () {
        Route::get('/', 'index')->name('workreports.index');
        Route::get('/create', 'create')->name('workreports.create');
        Route::post('/', 'store')->name('workreports.store');
        Route::get('/{id}/edit', 'edit')->name('workreports.edit');
        Route::put('/{id}', 'update')->name('workreports.update');
        Route::delete('/{id}', 'destroy')->name('workreports.destroy');
    });

    Route::get('/lostitems', [LostItemController::class, 'index'])->name('lostitem.index');
    Route::get('/lostitems/create', [LostItemController::class, 'create'])->name('lostitem.create');
    Route::post('/lostitems', [LostItemController::class, 'store'])->name('lostitem.store');
    Route::get('/lostitems/{id}/edit', [LostItemController::class, 'edit'])->name('lostitem.edit');
    Route::put('/lostitems/{id}', [LostItemController::class, 'update'])->name('lostitem.update');
    Route::delete('/lostitems/{id}', [LostItemController::class, 'destroy'])->name('lostitem.destroy');

    Route::get('/itemfounds/create', [ItemFoundController::class, 'create'])->name('itemfound.create');
    Route::post('/itemfounds', [ItemFoundController::class, 'store'])->name('itemfound.store');
    Route::get('/itemfounds/{id}/edit', [ItemFoundController::class, 'edit'])->name('itemfound.edit');
    Route::put('/itemfounds/{id}', [ItemFoundController::class, 'update'])->name('itemfound.update');
    Route::delete('/itemfounds/{id}', [ItemFoundController::class, 'destroy'])->name('itemfound.destroy');
    
    Route::resource('employes', controller: EmployeeController::class);
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

Route::prefix('permission-request')->controller(PermissionRequestController::class)->group(function () {
    Route::get('/', 'index')->name('permission-request.index');
    Route::get('/create', 'create')->name('permission-request.create');
    Route::post('/', 'store')->name('permission-request.store');
    Route::get('/{id}/edit', 'edit')->name('permission-request.edit');
    Route::put('/{id}', 'update')->name('permission-request.update');
    Route::delete('/{id}', 'destroy')->name('permission-request.destroy');
});

// Tambahkan route worktools disini
Route::prefix('worktools')->controller(WorkToolsController::class)->group(function () {
    Route::get('/', 'index')->name('worktools.index');
    Route::get('/create', 'create')->name('worktools.create');
    Route::post('/', 'store')->name('worktools.store');
    Route::get('/{id}/edit', 'edit')->name('worktools.edit');
    Route::put('/{id}', 'update')->name('worktools.update');
    Route::delete('/{id}', 'destroy')->name('worktools.destroy');
});

Route::prefix('work')->controller(WorkController::class)->group(function () {
    Route::get('/', 'index')->name('work.index');
    Route::get('/create', 'create')->name('work.create');
    Route::post('/', 'store')->name('work.store');
    Route::get('/{id}/edit', 'edit')->name('work.edit');
    Route::put('/{id}', 'update')->name('work.update');
    Route::delete('/{id}', 'destroy')->name('work.destroy');

    // Jika ada fitur pencarian
    Route::get('/search', 'search')->name('work.search');
});


Route::prefix('workequipment')->controller(WorkEquipmentController::class)->group(function () {
    Route::get('/', 'index')->name('workequipment.index');
    Route::get('/create', 'create')->name('workequipment.create');
    Route::post('/', 'store')->name('workequipment.store');
    Route::get('/{id}/edit', 'edit')->name('workequipment.edit');
    Route::put('/{id}', 'update')->name('workequipment.update');
    Route::delete('/{id}', 'destroy')->name('workequipment.destroy');
});


Route::prefix('workreport')->controller(WorkReportController::class)->group(function () {
    Route::get('/', 'index')->name('workreport.index');
    Route::get('/create', 'create')->name('workreport.create');
    Route::post('/', 'store')->name('workreport.store');
    Route::get('/{id}/edit', 'edit')->name('workreport.edit');
    Route::put('/{id}', 'update')->name('workreport.update');
    Route::delete('/{id}', 'destroy')->name('workreport.destroy');
});


Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');
Route::get('/attendances/creates', [AttendanceController::class, 'creates'])->name('attendances.creates');
Route::delete('/attendances/{id}', [AttendanceController::class, 'destroy'])->name('attendances.destroy');

Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store'); // This is the store route
Route::get('/employees-attendances', [AttendanceController::class, 'indexs'])->name('employees_attendances.index');
Route::patch('/attendances/{id}/status', [AttendanceController::class, 'updateStatus'])->name('attendances.update-status');

Route::resource('complaints', ComplaintController::class);
Route::get('/get-employee/{location}', [ComplaintController::class, 'getEmployeeByLocation']);
Route::get('/get-employee-by-location/{locationId}', [ComplaintController::class, 'getEmployeeByLocation']);

