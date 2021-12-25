<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\dashboard\MainController;
use App\Models\Employers;

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
Route::get('/',[HomeController::class,'index'])->name('chap.index');
Route::get('/about',[HomeController::class,'about']);
Route::get('/services',[HomeController::class,'services']);
Route::get('/contact',[HomeController::class, 'contact']);
Route::get('/adminRegisteration',[HomeController::class,'registerAdmin']);

Route::post('/postAdmin',[HomeController::class,'postAdmin'])->name("postAdmin");
//Athentication Routes

Route::get('/authentication',[HomeController::class,'authentication'])->name("loginAgain");
Route::get('/registeration',[HomeController::class,'userRegister']);
// POST
Route::post('auth1',[HomeController::class, 'handleLogin'])->name('userAuthentication');
Route::get('/logout',[HomeController::class, 'logout'])->name('loggingOut');
Route::get('/sessionDestroyed',[HomeController::class, 'logout2'])->name('loggingOut');
// Employers Routes
Route::get('/user/dash',[HomeController::class,'userDashView'])->middleware('auth:webemployers');

//Admin Routes

// WEB POST ROUTES
Route::post('/registerUser',[HomeController::class,'saveUser'])->name('userSaving');
//Dashboard Routes
Route::get('/dash/admin',[MainController::class,'index'])->name("admin.index")->middleware('auth:webadmins');
Route::get('/removeEmployee/{id}',[MainController::class,'removeEmployee'])->name("deleteEmployee.id")->middleware('auth:webadmins');
Route::get('/recruitedEmployee',[MainController::class, 'recruitePage'])->middleware("auth:webadmins");
Route::get('/emp/reg',[MainController::class, 'registerEmp'])->name("admin.addRegister")->middleware("auth:webadmins");
Route::post('/postEmployee',[MainController::class, 'saveEmployee'])->name("admin.postEmployees")->middleware("auth:webadmins");

//Routes
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Cart Controller
Route::get('casual/{id}',[HomeController::class,'addToList'])->name('employeeToList');
Route::get('savedList',[HomeController::class, 'mySavedList'])->name('recruites');

// The route that the button calls to initialize payment
Route::post('/pay', [HomeController::class, 'initialize'])->name('pay');

// The callback url after a payment
Route::get('/rave/callback', [HomeController::class, 'callback'])->name('callback');

Route::get('users',[HomeController::class, 'validAuth']);
Route::post('/userCart', [HomeController::class, 'employeeCart']);

Route::get('/saveRecruited', [HomeController::class,'saveRecruited'])->name('recruitedT');

Route::get('/listRemoving/{employerId}/{employeeId}',[HomeController::class,'removeFromList']);