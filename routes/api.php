<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PermintaanBarangController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/items', [ItemController::class, 'index']);
Route::get('/item/{id}', [ItemController::class, 'show']);
Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/employee/{id}', [EmployeeController::class, 'show']);
Route::get('requests', [PermintaanBarangController::class, 'index']);
Route::post('request', [PermintaanBarangController::class, 'store']);
Route::get('requests/{id}', [PermintaanBarangController::class, 'show']);
Route::put('requests/{id}', [PermintaanBarangController::class, 'update']);
Route::delete('requests/{id}', [PermintaanBarangController::class, 'destroy']);