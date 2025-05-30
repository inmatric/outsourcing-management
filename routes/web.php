<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Halaman utama daftar karyawan
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

// Halaman form untuk menambahkan karyawan baru
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');

// Menyimpan data karyawan baru
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

// Halaman untuk melihat detail karyawan
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');

// Halaman form untuk mengedit data karyawan
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

// Menyimpan perubahan data karyawan
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');

// Menghapus data karyawan
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [ProductController::class, 'test']);
Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');
Route::get('/attendances/creates', [AttendanceController::class, 'creates'])->name('attendances.creates');
Route::delete('/attendances/{id}', [AttendanceController::class, 'destroy'])->name('attendances.destroy');

Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store'); // This is the store route
Route::get('/employees-attendances', [AttendanceController::class, 'indexs'])->name('employees_attendances.index');
Route::patch('/attendances/{id}/status', [AttendanceController::class, 'updateStatus'])->name('attendances.update-status');


Route::prefix('v1')->group(function () {
    Route::prefix('products')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index');           // GET /api/v1/products
        Route::post('/', 'store');          // POST /api/v1/products
        Route::get('{id}', 'show');         // GET /api/v1/products/{id}
        Route::put('{id}', 'update');       // PUT /api/v1/products/{id}
        Route::delete('{id}', 'destroy');   // DELETE /api/v1/products/{id}
    });
});