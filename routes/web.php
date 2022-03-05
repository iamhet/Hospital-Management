<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'redirect');
    Route::get('/', 'index');
    Route::post('/appointment', 'appointment');
    Route::get('/appointment_user', 'appointment_user');
    Route::get('/cancle_appointment/{id}', 'cancle_appointment');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::controller(AdminController::class)->group(function () {
    Route::get('/add_doctor', 'create');
    Route::post('/store', 'store');
    Route::get('/aprove_appointment', 'show');
    Route::get('/approve/{id}', 'approved');
    Route::get('/cancle/{id}', 'cancle');
    Route::get('/manage_doctor', 'manage_doctor');
    Route::get('/update_d/{id}', 'update_doctor');
    Route::post('/update/{id}', 'update');
    Route::get('/delete_d/{id}', 'delete_doctor');
});