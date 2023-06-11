<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DistrictController;
use App\Models\Customer;
use App\Models\District;
use App\Models\Division;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('homepage');
});

// Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
// Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
// Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
// Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
// Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
// Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

Route::resource('employees', EmployeeController::class);

// Customer
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/update/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/delete/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{customer}/data', [CustomerController::class, 'getData'])->name('customers.data');

// Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
// Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');

// Division
Route::resource('divisions', DivisionController::class);

// District
Route::resource('districts', DistrictController::class);
