<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Doctors\Auth\LoginController as DoctorLoginController;
use App\Http\Controllers\Doctors\DoctorController;
use App\Http\Controllers\Doctors\Auth\ForgotPasswordController;
use App\Http\Controllers\Doctors\Auth\ResetPasswordController;
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

Auth::routes([
   // 'register' => false
]);

Route::get('dang-nhap', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('dang-nhap', [LoginController::class, 'login']);

Route::get('dang-ky', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('dang-ky', [RegisterController::class, 'register']);

Route::get('dang-xuat', function (){
    Auth::logout();
    return redirect()->route('login');
})->name('custom-logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', [DashboardController::class, 'index']);
});

//Custom Authentication

Route::prefix('doctors')->name('doctors.')->group(function(){

    Route::get('/', [DoctorController::class, 'index'])->name('index')->middleware('auth:doctor');

    Route::get('login', [DoctorLoginController::class, 'login'])->name('login')->middleware('guest:doctor');

    Route::post('login', [DoctorLoginController::class, 'handleLogin']);

    Route::post('logout', [DoctorLoginController::class, 'logout'])->name('logout')->middleware('auth:doctor');

    Route::get('forgot-password', [ForgotPasswordController::class, 'showForm'])->name('forgot');

    Route::post('forgot-password', [ForgotPasswordController::class, 'sendEmail']);

    Route::get('reset-password', [ResetPasswordController::class, 'showForm'])->name('reset');
});








