<?php

use App\Http\Controllers\Doctor\Auth\LoginController;
use App\Http\Controllers\Doctor\DoctorDashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'doctor', 'middleware' => ['web']], function() {
    // Route::get('vvv', function(){
    //     return "Doctor dash";
    // });
    Route::get('doctor-login', [LoginController::class, 'showLoginForm'])->name('login.doctor');
    Route::post('doctor-login-submit', [LoginController::class, 'authenticate'])->name('login.submit.doctor');
    Route::get('doctor-register', [LoginController::class, 'registerForm'])->name('register.form.doctor');
    Route::post('doctor-register-submit', [LoginController::class, 'registerStore'])->name('register.submit.doctor');
    Route::post('doctor-logout', [LoginController::class, 'doctorLogout'])->name('doctor.logout');

    Route::middleware(['auth:doctor'])->group(function()
    {
        Route::get('dashboard', [DoctorDashboardController::class,'index'])->name('doctor.dashboard');


    });
});
