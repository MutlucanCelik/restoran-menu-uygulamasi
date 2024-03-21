<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
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

Route::view('/','login')->name('login_page');
Route::post('/login',[LoginController::class,'login'])->name('login');

Route::prefix('/admin')->group(function (){
    Route::get('/index',[DashboardController::class,'show'])->name('index');
    Route::get('/reservations',[ReservationController::class,'show'])->name('reservations');
    Route::get('/messages',[MessageController::class,'show'])->name('messages');
    Route::get('/users',[UserController::class,'show'])->name('users');
    Route::get('/settings',[SettingController::class,'show'])->name('settings');
    Route::post('/settings',[SettingController::class,'store']);
    Route::get('/foods/{id}',[CategoryController::class,'show'])->name('foods');

    Route::post('/foods',[MealController::class,'store'])->name('add_food');
    Route::post('/foods-status',[MealController::class,'changeStatus'])->name('change_status');
});
