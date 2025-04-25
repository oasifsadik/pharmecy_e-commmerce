<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\WebsiteController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\Admin\AmbulanceController;
use App\Http\Controllers\SslCommerzPaymentController;

Route::get('/',[WebsiteController::class,'index'])->name('home');
Route::get('/ambulance-services',[WebsiteController::class,'ambulanceServices'])->name('ambulance.services');
Route::get('/lab-test-services',[WebsiteController::class,'labServices'])->name('lab.test.services');
Route::get('/lab-test-booking-form/{id}',[WebsiteController::class,'labServicesBooking'])->name('lab.test.services.booking.form');
Route::get('/ambulance-booikng-form/{id}',[WebsiteController::class,'ambulanceBookingForm'])->name('ambulance.booikng.form');
Route::post('/ambulance-booikng',[AmbulanceController::class,'ambulanceBooking'])->name('ambulance.booikng');
Route::post('/ambulance-booikng-review',[AmbulanceController::class,'ambulanceBookingReview'])->name('ambulance.booikng.review');
Route::get('single-product/{id}',[WebsiteController::class,'singleProduct'])->name('singleProduct');
Route::get('doctors',[WebsiteController::class,'doctors'])->name('doctors');
Route::get('shops',[WebsiteController::class,'shops'])->name('shops');
Route::post('add-to-cart',[CartController::class,'addToCart'])->name('add.cart');
Route::get('cart-product',[CartController::class,'index'])->name('cart.products');
Route::get('cart/remove/{rowId}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/checkout/page', [CheckoutController::class, 'page'])->name('checkout.page');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

Route::get('User-profile/{id}',[ProfileController::class,'profile'])->name('user.profile');
Route::get('User-order/{id}',[ProfileController::class,'userOrder'])->name('user.order');
Route::get('User-order-deliver/{id}',[ProfileController::class,'userOrderDeliver'])->name('user.order.deliver');
Route::get('/category/{id}', [ProfileController::class, 'showProductsByCategory'])->name('category.products');

Route::get('prescription', [WebsiteController::class, 'prescription'])->name('prescription');



Route::get('/clear-all', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');
    Artisan::call('storage:link');
    dd('All Cleared...');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('jisan',[UserController::class,'jisan']);
// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);

Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
