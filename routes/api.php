<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\CategorytController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/role',[RoleController::class,'index']);
Route::get('/role/{id}', [RoleController::class, 'show']);
Route::post('/role',[RoleController::class,'store']);
Route::post('/role/edit/{role}',[RoleController::class,'update']);
Route::get('/departemen',[DepartementController::class,'index']);
Route::post('/departemen',[DepartementController::class,'store']);
Route::get('/departemen/{id}', [DepartementController::class, 'show']);
Route::post('/departemen/edit/{departemen}',[DepartementController::class,'update']);
Route::delete('/departemen/{id}',[DepartementController::class,'destroy']);
