<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index']);

Route::post('/findtable', [UserController::class, 'findTable'])->name('book.table');

Route::get('/searchfood', [UserController::class, 'searchFood'])->name('search-food');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [UserController::class, 'home'])->name('dashboard');
    Route::post('/addtocart', [UserController::class, 'addToCart'])->name('addtocart');
    Route::get('/foodcart', [UserController::class, 'foodCart'])->name('food.cart');
    Route::get('/foodcart/{id}', [UserController::class, 'removeCart'])->name('delete.cart');
    Route::post('/confirm_order', [UserController::class, 'confirmOrderCart'])->name('cart.confirm');
    Route::get('/order_status', [UserController::class, 'orderStatus'])->name('order_status');
});

Route::get('/addfood', [AdminController::class, 'addFood'])->middleware('auth', 'admin')->name('admin.addfood');

Route::post('/addfood', [AdminController::class, 'postAddFood'])->middleware('auth', 'admin')->name('admin.postaddfood');

Route::get('/showfood', [AdminController::class, 'showFood'])->middleware('auth', 'admin')->name('admin.showfood');

Route::get('/deletefood/{id}', [AdminController::class, 'deleteFood'])->middleware('auth', 'admin')->name('admin.deletefood');

Route::get('/updatefood/{id}', [AdminController::class, 'updateFood'])->middleware('auth', 'admin')->name('admin.updatefood');

Route::post('/updatefood/{id}', [AdminController::class, 'postUpdateFood'])->middleware('auth', 'admin')->name('admin.postupdatefood');

Route::get('/vieworders', [AdminController::class, 'viewOrders'])->middleware('auth', 'admin')->name('admin.vieworders');

Route::get('/delivered/{id}', [AdminController::class, 'statusDelivered'])->middleware('auth', 'admin')->name('admin.delivered');

Route::get('/cancel/{id}', [AdminController::class, 'statusCancel'])->middleware('auth', 'admin')->name('admin.cancel');

Route::get('/viewbookedtable', [AdminController::class, 'viewBookedTable'])->middleware('auth', 'admin')->name('admin.viewbookedtable');
