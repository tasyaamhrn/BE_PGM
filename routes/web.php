<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\MeetingController;
use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Route;

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

Route::get('/layouts', function () {
    return view('layouts.app');
});

Route::get('/', function () {
    return view('admin.form-login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'index']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//employee

Route::group(['middleware' => ['admin']], function () {
    Route::GET('/employee',[EmployeeController::class,'index']);
    Route::post('employee',[EmployeeController::class,'store'])->name('employee.store');
    Route::delete('employee/delete/{user_id}',[EmployeeController::class,'delete'])->name('employee.destroy');
    Route::GET('/department',[DepartmentController::class,'index'])->name('department');
    Route::post('department',[DepartmentController::class,'store'])->name('department.store');
    Route::put('department/edit/{id}',[DepartmentController::class,'update'])->name('department.update');
    Route::delete('/department/{id}',[DepartmentController::class,'destroy'])->name('department.destroy');
    Route::post('employee/edit/{id}',[EmployeeController::class,'update'])->name('employee.update');
    Route::post('/employee/{id}',[EmployeeController::class,'destroy'])->name('employee.destroy');
    Route::GET('/categories',[CategoriesController::class,'index']);
    Route::post('/categories',[CategoriesController::class,'store'])->name('category.store');
    Route::put('categories/edit/{id}',[CategoriesController::class,'update'])->name('category.update');
    Route::delete('/categories/{id}',[CategoriesController::class,'destroy'])->name('category.destroy');
    Route::GET('/customer',[CustomerController::class,'index']);
    Route::post('customer',[CustomerController::class,'store'])->name('customer.store');
    Route::delete('customer/delete/{user_id}',[CustomerController::class,'delete'])->name('customer.destroy');
    Route::post('customer/edit/{id}',[CustomerController::class,'update'])->name('customer.update');
    Route::GET('/meeting',[MeetingController::class,'index']);
});
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

