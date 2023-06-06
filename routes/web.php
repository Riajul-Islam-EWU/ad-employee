<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
// Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
// Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
// Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
// Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
// Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

Route::resource('employees', EmployeeController::class);


Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/edit/{customer}', [CustomerController::class, 'edit'])->name('customers.edit');
Route::patch('/update/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/destroy/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');

