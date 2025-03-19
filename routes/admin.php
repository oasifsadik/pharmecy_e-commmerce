<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
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
        //end Product Stock
        Route::get('orders',[OrderController::class,'index'])->name('admin.orders');
        Route::get('orders-details/{id}',[OrderController::class,'ordersDetails'])->name('admin.orders.details');
        Route::post('confirm-order/{id}',[OrderController::class,'confirmOrder'])->name('admin.order.confirm');
        Route::get('confirm-order/list',[OrderController::class,'confirmOrderList'])->name('admin.order.confirm.list');
        Route::get('confirm-order/filter/{status}',[OrderController::class,'confirmOrderList'])->name('admin.order.confirm.filter');
        Route::put('/admin/orders/{id}/update-status', [OrderController::class, 'updateOrderStatus'])->name('admin.orders.updateStatus');
        Route::get('/admin/orders/history', [OrderController::class, 'orderHistory'])->name('admin.orders.history');


    });
});
