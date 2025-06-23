<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AmbulanceBookingController;
use App\Http\Controllers\Admin\AmbulanceController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LabTestController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductStock;
use App\Http\Controllers\Admin\ProductStockController;

Route::group(['prefix' => 'admin', 'middleware' => ['web']], function() {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class,'authenticate'])->name('admin.login.submit');
    Route::post('logout', [LoginController::class, 'adminLogout'])->name('admin.logout');

    Route::middleware(['auth:admin'])->group(function()
    {
        Route::get('dashboard', [AdminController::class,'index'])->name('admin.dashboard');
        Route::resource('category',CategoryController::class);
        Route::resource('brand',BrandController::class);
        Route::resource('products', ProductController::class);
        //product Stock
        Route::get('product-stock',[ProductStockController::class,'productStock'])->name('admin.product.stock');
        Route::post('product-stock/store',[ProductStockController::class,'stockStore'])->name('admin.product.stock.store');
        Route::get('product-stock-list',[ProductStockController::class,'productStockList'])->name('admin.product.stock.list');
        Route::get('product-stock-view/{id}',[ProductStockController::class,'productStockView'])->name('admin.product.stock.view');
        Route::get('product-stock-edit/{id}',[ProductStockController::class,'productStockEdit'])->name('admin.product.stock.edit');
        Route::post('product-stock-update/{id}',[ProductStockController::class,'productStockUpdate'])->name('admin.product.stock.update');
        Route::delete('product-stock-delete/{id}',[ProductStockController::class,'productStockDelete'])->name('admin.product.stock.delete');

        //Ambulnce
        Route::get('ambulance',[AmbulanceController::class,'ambulance'])->name('admin.ambulance');
        Route::get('ambulance-create',[AmbulanceController::class,'create'])->name('admin.ambulance.create');
        Route::post('ambulance-store',[AmbulanceController::class,'store'])->name('admin.ambulance.store');
        Route::get('ambulance-edit/{id}',[AmbulanceController::class,'edit'])->name('admin.ambulance.edit');
        Route::get('ambulance-show/{id}',[AmbulanceController::class,'show'])->name('admin.ambulance.show');
        Route::post('ambulance-update/{id}',[AmbulanceController::class,'update'])->name('admin.ambulance.update');
        Route::delete('ambulance-delete/{id}',[AmbulanceController::class,'delete'])->name('admin.ambulance.delete');

        //Ambulance Booking
        Route::get('ambulance-booking-list',[AmbulanceBookingController::class,'ambulanceBookingList'])->name('admin.ambulance.booking.List');
        Route::get('ambulance-booking-confirm-list',[AmbulanceBookingController::class,'ambulanceBookingConfirmList'])->name('admin.ambulance.booking.confirm.List');
        Route::get('ambulance-booking-cancel-list',[AmbulanceBookingController::class,'ambulanceBookingCancelList'])->name('admin.ambulance.booking.cancel.List');
        Route::get('ambulance-booking-show/{id}',[AmbulanceBookingController::class,'ambulanceBookingShow'])->name('admin.ambulance.booking.show');
        Route::patch('/admin/ambulance-booking/{id}/confirm', [AmbulanceBookingController::class, 'confirm'])->name('ambulanceBooking.confirm');
        Route::get('/admin/ambulance-booking/{id}/cancel', [AmbulanceBookingController::class, 'cancel'])->name('ambulanceBooking.cancel');




        //Lab test
        Route::get('lab-test',[LabTestController::class,'labTest'])->name('admin.lab.test');
        Route::get('lab-test-create',[LabTestController::class,'create'])->name('admin.lab.test.create');
        Route::post('store',[LabTestController::class,'store'])->name('admin.lab.test.store');
        Route::get('lab-test-edit/{id}',[LabTestController::class,'edit'])->name('admin.lab.test.edit');
        Route::post('lab-test-update/{id}',[LabTestController::class,'update'])->name('admin.lab.test.update');
        Route::get('lab-test-show/{id}',[LabTestController::class,'show'])->name('admin.lab.test.show');
        Route::delete('lab-test-delete/{id}',[LabTestController::class,'delete'])->name('admin.lab.test.delete');

        Route::get('lab-test-booking-list',[LabTestController::class,'labTestBookingList'])->name('admin.lab.test.booking.list');
        Route::get('lab-test-booking-view/{id}',[LabTestController::class,'labTestBookingView'])->name('admin.lab.test.booking.view');
        Route::post('/send-booking-mail/{id}', [LabTestController::class, 'sendMail'])->name('send.booking.mail');

        //end Product Stock
        Route::get('orders',[OrderController::class,'index'])->name('admin.orders');
        Route::get('orders-details/{id}',[OrderController::class,'ordersDetails'])->name('admin.orders.details');
        Route::post('confirm-order/{id}',[OrderController::class,'confirmOrder'])->name('admin.order.confirm');
        Route::get('confirm-order/list',[OrderController::class,'confirmOrderList'])->name('admin.order.confirm.list');
        Route::get('confirm-order/filter/{status}',[OrderController::class,'confirmOrderList'])->name('admin.order.confirm.filter');
        Route::put('/admin/orders/{id}/update-status', [OrderController::class, 'updateOrderStatus'])->name('admin.orders.updateStatus');
        Route::get('/admin/orders/history', [OrderController::class, 'orderHistory'])->name('admin.orders.history');

        Route::get('prescrip-orders',[OrderController::class,'prescripIndex'])->name('admin.prescrip.orders');
        Route::get('prescrip-orders-details/{id}',[OrderController::class,'prescripPrdersDetails'])->name('admin.prescrip.orders.details');
        Route::get('prescrib-confirm-order/list',[OrderController::class,'prescribConfirmOrderList'])->name('admin.order.confirm.list.prescrib');
    });
});
