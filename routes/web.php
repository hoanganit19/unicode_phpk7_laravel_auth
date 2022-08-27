<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
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

