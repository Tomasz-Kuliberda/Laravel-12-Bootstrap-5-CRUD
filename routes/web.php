<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/companies', [CompaniesController::class, 'index'])->name('companies.index');

Route::get('/companies/create', [CompaniesController::class, 'create'])->name('companies.create');

Route::post('/companies', [CompaniesController::class, 'store'])->name('companies.store');

Route::get('/companies/{company}', [CompaniesController::class, 'show'])->name('companies.show');

Route::get('/companies/{company}/edit', [CompaniesController::class, 'edit'])->name('companies.edit');

Route::put('/companies/{company}', [CompaniesController::class, 'update'])->name('companies.update');

Route::delete('/companies/{company}', [CompaniesController::class, 'destroy'])->name('companies.destroy');

Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');

Route::get('/employees/create', [EmployeesController::class, 'create'])->name('employees.create');

Route::post('/employees', [EmployeesController::class, 'store'])->name('employees.store');

Route::get('/employees/{employee}', [EmployeesController::class, 'show'])->name('employees.show');

Route::get('/employees/{employee}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');

Route::put('/employees/{employee}', [EmployeesController::class, 'update'])->name('employees.update');

Route::delete('/employees/{employee}', [EmployeesController::class, 'destroy'])->name('employees.destroy');
