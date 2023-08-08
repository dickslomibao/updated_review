<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;

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

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index');
    Route::POST('/register', 'create');

});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index');
    Route::POST('/magloginako', 'login');

});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index');
    Route::get('/admin/create', 'create');
    Route::POST('/admin/create', 'store');
    Route::get('/admin/user/{id}', 'destroy');
    Route::get('/admin/user/edit/{id}', 'show');
    Route::POST('/admin/user/update/{id}', 'update');
});

Route::controller(VoucherController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/voucher/{id}', 'destroy');
    Route::get('/view/{id}', 'show');
    Route::POST('/createToken', 'store');
    Route::get('/logout', 'logout');
});