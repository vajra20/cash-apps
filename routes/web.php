<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login/auth', [AuthController::class, 'auth'])->name('login.auth');

// Admin
Route::get('/admin', [AuthController::class, 'admin'])->name('admin');

// Product Admin
Route::get('/product', [ProductController::class, 'index'])->name('product.admin');
Route::post('/product/stores', [ProductController::class, 'store'])->name('product.creates');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.updates');
Route::post('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

// Sale
Route::get('/sale', [SaleController::class, 'index'])->name('sale.admin');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/stores', [AuthController::class, 'store'])->name('register.stores');
Route::post('/register/update/{id}', [AuthController::class, 'update'])->name('register.updates');
Route::post('/register/delete/{id}', [AuthController::class, 'delete'])->name('register.deletes');

// User
Route::get('/user', [AuthController::class, 'user'])->name('user');

// Product
Route::get('/user/product', [ProductController::class, 'productUser'])->name('product.user');

// Payment
Route::get('/user/payment', [SaleController::class, 'paymentUser'])->name('payment.user');
Route::get('/user/payment/detail', [SaleController::class, 'paymentDetail'])->name('payment.detail');
Route::post('/user/payment/detail/create', [SaleController::class, 'DetailStore'])->name('detail.store');
Route::get('/user/payment/export', [SaleController::class, 'export'])->name('payment.export');
Route::get('/user/payment/pdf', [SaleController::class, 'pdf'])->name('payment.pdf');

// Customer
Route::get('/user/payment/detail/customer', [CustomerController::class, 'Customer'])->name('customer.form');
Route::post('/user/payment/detail/customer/create', [CustomerController::class, 'store'])->name('customer.store');
Route::post('/user/payment/detail/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
