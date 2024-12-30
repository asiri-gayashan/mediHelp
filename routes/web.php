<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\patientController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/', function () {
    return view('index');
});


Route::get('/index', [patientController::class, 'index'])->name('index');
Route::get('/register', [patientController::class, 'register'])->name('register');
Route::get('/profile', [patientController::class, 'profile'])->name('profile');


Route::get('/adminlogin', [adminController::class, 'adminlogin'])->name('adminlogin');
Route::get('/adminreg', [adminController::class, 'adminreg'])->name('adminreg');


Route::get('/dashboard', [adminController::class, 'dashboard'])->name('dashboard');
Route::post('/store', [patientController::class, 'store'])->name('store');
Route::match(['get', 'post'], '/login', [patientController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/adminloginprocess', [adminController::class, 'adminloginprocess'])->name('adminloginprocess');



Route::put('/update', [patientController::class, 'update'])->name('update');


Route::get('/patientDelete/{patient_id}', [patientController::class, 'patientDelete'])->name('patientDelete');
// Route::get(' /patientDelete/{patient_id}', [PatientController::class, 'patientDelete'])->name('patientDelete');

 
 

Route::middleware(['auth:web'])->group(function () {

    Route::get('/profile', [patientController::class, 'profile'])->name('profile');
});



