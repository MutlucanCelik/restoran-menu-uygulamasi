<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\MealController;
use App\Http\Controllers\api\MessageController;
use App\Http\Controllers\api\ReservationController;
use App\Http\Controllers\api\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/categories',[CategoryController::class,'getCategories']);
Route::get('/meals',[MealController::class,'getMeals']);
Route::get('/company-info',[SettingController::class,'getCompanyInfo']);

Route::prefix('/auth')->group(function(){
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);
});

Route::post('/send-message',[MessageController::class,'send']);
Route::post('create-reservation',[ReservationController::class,'store']);
