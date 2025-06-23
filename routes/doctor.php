<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctor\ChatController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Doctor\Auth\LoginController;
use App\Http\Controllers\Doctor\DoctorChatController;
use App\Http\Controllers\Doctor\DoctorDashboardController;

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
        Route::get('appoinment-list', [AppointmentController::class,'appoinmentList'])->name('doctor.appoinment.list');
        // In web.php
        Route::get('prescribe', [AppointmentController::class, 'create'])->name('doctor.prescribe.create');
        Route::post('prescribe', [AppointmentController::class, 'store'])->name('doctor.prescribe.store');
        Route::get('chat', [ChatController::class, 'index'])->name('doctor.chat');


        // Send message
        Route::post('/chat/send', [DoctorChatController::class, 'sendMessage'])->name('doctor.chat.send');

        // Fetch messages
        Route::get('/chat/messages/{appointment}', [DoctorChatController::class, 'fetchMessages']);



    });
});
