<?php

use App\Http\Controllers\customerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pembayaranController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\reservasiController;
use App\Http\Controllers\roomController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('customer', customerController::class);
Route::resource('pembayaran', pembayaranController::class);
Route::resource('reservasi', reservasiController::class);
Route::resource('room', roomController::class);

Route::get('/cusPdf', [customerController::class,'cusPdf']);
Route::get('/pemPdf', [pembayaranController::class,'pemPdf']);
Route::get('/resPdf', [reservasiController::class,'resPdf']);
Route::get('/roomPdf', [roomController::class,'roomPdf']);

Route::resource('login', loginController::class);
Route::resource('register', registerController::class);
Route::get('/register', [loginController::class, 'register']);

Route::get('register/create', [registerController::class, 'create']);