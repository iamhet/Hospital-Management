<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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
    Route::get('/cancle_appointment/{id}', 'cancle_appointment');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::controller(AppointmentController::class)->group(function () {
    Route::post('create_appointment','create');
    Route::get('show_appointment','show');
    Route::get('/appointment', 'appointment');
    Route::get('/cancled_appointment', 'cancled_appointment');
});

Route::controller(DoctorController::class)->group(function () {
    Route::get('doctor_index','index');
    Route::get('doctor_destroy/{id}','destroy');
    Route::post('doctor_store','store');
    Route::post('doctor_update/{id}','update');
});
Route::controller(RoleController::class)->group(function () {
    Route::get('roles_destroy/{id}','destroy');
    Route::post('roles_update/{id}','update');
});
    Route::resource('appointment',AppointmentController::class);
    Route::resource('doctor',DoctorController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);