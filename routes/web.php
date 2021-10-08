<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\dashboard\MainController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

//Web routes
Route::get('/',[HomeController::class,'index']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/services',[HomeController::class,'services']);
Route::get('/contact',[HomeController::class, 'contact']);
Route::get('/authentication',[HomeController::class,'authentication'])->name("logging");
Route::get('/registeration',[HomeController::class,'userRegister']);
//POST ROUTES
Route::post('/registerUser',[HomeController::class,'saveUser'])->name('userSaving');
Route::post('auth1',[HomeController::class, 'authUser']);
//Dashboard Routes
Route::get('/dash/admin',[MainController::class,'index']);