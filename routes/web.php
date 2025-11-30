<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
// Import semua controller baru di sini
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;

Route::get('/', function () {
    return view('welcome');
});

// Route Resource untuk membuat jalur CRUD otomatis
Route::resource('employees', EmployeeController::class);
Route::resource('departements', DepartementController::class);
Route::resource('positions', PositionController::class);
Route::resource('attendance', AttendanceController::class);
Route::resource('salaries', SalaryController::class);