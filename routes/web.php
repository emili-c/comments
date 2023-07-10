<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
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

Route::any('/', [LoginController::class, 'index'])->name('home');

Route::any('/logout', [LoginController::class, 'logout'])->name('logout');

Route::any('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::any('/customer/login', [LoginController::class, 'customerLogin'])->name('customer.login');

Route::any('/verifyLogin', [LoginController::class, 'verifyLogin'])->name('login');

Route::group(['middleware' => 'auth:admin'], function () {
    Route::any('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::any('/admin/saveComment', [CommentController::class, 'saveComment'])->name('admin.saveComment');
});

Route::group(['middleware' => 'auth:customer'], function () {
    Route::any('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::any('/customer/saveComment', [CommentController::class, 'saveCusComment'])->name('customer.saveComment');
});

