<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::get('/balance', [RegisterController::class, 'indexBalance'])->middleware('auth');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/balance', [RegisterController::class, 'balance']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/profile', [UserController::class, 'index'])->middleware('auth');

Route::resource('/transactions', TransactionController::class)->middleware('auth');

Route::resource('/wallets', WalletController::class)->middleware('auth');
Route::post('/wallets/delete', [WalletController::class, 'destroyWallets'])->middleware('auth');

Route::get('/reports', [TransactionController::class, 'reports'])->middleware('auth');
