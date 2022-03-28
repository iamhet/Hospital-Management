<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NewsController;
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
    Route::get('/appointment_destroy/{id}', 'appointment_destroy');
    Route::get('/aboutus','about');
    Route::get('/doctors','doctors');
    Route::get('/newsdetail','news');
    Route::get('/news_open/{id}','news_open');
    Route::get('/contact','contact');
    Route::get('/download_pdf/{id}','download_pdf');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::controller(AppointmentController::class)->group(function () {
    Route::post('create_appointment','create');
    Route::get('show_appointment','show');
    Route::get('/approve_appointment', 'appointment');
    Route::get('/cancled_appointment', 'cancled_appointment');
});
Route::controller(DoctorController::class)->group(function () {
    Route::get('doctor_index','index');
    Route::get('doctor_destroy/{id}','destroy');
    Route::post('doctor_store','store');
    Route::post('doctor_edit/{id}','edit');
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
    Route::resource('news', NewsController::class);
