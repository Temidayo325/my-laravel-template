<?php

use App\Http\Controllers\Auth\UserController as AuthUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// Basic user requests that do not require Auth
Route::view('/register', 'register');
Route::view('/login', 'login')->name('login');
Route::view('/recover-password', 'recover-password');
Route::view('/verify-user', 'verify-email')->name('verify-email');
Route::view('/reset-password', 'reset-password')->name('reset-password');
Route::controller(UserController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post("/register", 'create');
    Route::post('/recover-password', 'initiatePasswordReset')->name('recover-password');
    Route::post('/reset-password', 'resetPassword')->name('reset-password');
    Route::post('/verify-user-email', 'validateEmail');
});
Route::middleware(['auth'])->controller(AuthUserController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});