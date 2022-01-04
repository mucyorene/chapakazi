<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\dashboard\MainController;
use App\Models\Employers;
use Laravel\Socialite\Facades\Socialite;

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

//Route::get('/confirmAccount/{id}',[HomeController::class, 'confirmEmployerAccount']);

Route::get('/adminRegisteration',[HomeController::class,'registerAdmin']);
Route::get('/viewCasual/{id}',[HomeController::class,'showCasual']);
Route::get('/eRecruite',[HomeController::class,'employeePage']);

Route::post('/postAdmin',[HomeController::class,'postAdmin'])->name("postAdmin");

Route::get('/loadEmployee',[HomeController::class,'loadEmployees']);

//Search
Route::get('/chapa/searching/{search}',[HomeController::class,'indexSearch']);
Route::get('/chapa/search/category/{category}',[HomeController::class,'searchByCategory']);

//Rating system

Route::get('/rateNow/{ratings}/{employeeId}/{employerId}',[HomeController::class,'rateEmployee']);
Route::get('/rate/{id}',[HomeController::class, 'rating']);

// Route::get('/loadEmployee', function () {
//     return view('pages/load_employee');
// });


//Socialite

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    // $user->token
});

//Facebook
Route::get('/auth/redirect', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('facebook')->user();
    // $user->token
});


//Facebook
Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('google')->user();
    // $user->token
});




//Athentication Routes

Route::get('/authentication',[HomeController::class,'authentication'])->name("loginAgain");
Route::get('/registeration',[HomeController::class,'userRegister']);
// POST
Route::post('auth1',[HomeController::class, 'handleLogin'])->name('userAuthentication');
Route::get('/logout',[HomeController::class, 'logout'])->name('loggingOut');
Route::get('/sessionDestroyed',[HomeController::class, 'logout2'])->name('loggingOut');



// Employers Routes
Route::get('/user/dash',[HomeController::class,'userDashView'])->middleware('auth:webemployers');
Route::post('dash/user/update/{id}',[HomeController::class,'updateUser'])->middleware('auth:webemployers');
Route::get('/employerOwns', [HomeController::class,'myCasuals'])->middleware('auth:webemployers');
Route::get('/removeCasual/{id}',[HomeController::class, 'removeMyCasual'])->middleware('auth:webemployers');
Route::get('/removeMyAllCasuals',[HomeController::class,'removeAllCasuals'])->middleware('auth:webemployers');
Route::get('/userProfiles',[HomeController::class, 'employerProfile'])->middleware('auth:webemployers');


//Admin Routes

// WEB POST ROUTES
Route::post('/registerUser',[HomeController::class,'saveUser'])->name('userSaving');

//Dashboard Routes
Route::get('/dash/admin',[MainController::class,'index'])->name("admin.index")->middleware('auth:webadmins');

Route::get('/dash/allCasual',[MainController::class,'systemCasuals'])->name("admin.casual")->middleware('auth:webadmins');

Route::get('/allEmployers',[MainController::class,'systemEmployers'])->name("admin.employers")->middleware('auth:webadmins');
//Remove employer /admin
Route::get('/removeEmployer/{id}',[MainController::class,'deleteEmployer'])->name("admin.deleteEmp")->middleware('auth:webadmins');
//Remove all Employers
Route::get('/removeMyAllEmployers',[HomeController::class,'deleteAllEmployers'])->name("admin.deleteEmpAll")->middleware('auth:webadmins');

Route::get('/removeEmployee/{id}',[MainController::class,'removeEmployee'])->name("deleteEmployee.id")->middleware('auth:webadmins');
Route::get('/recruitedEmployee',[MainController::class, 'recruitePage'])->middleware("auth:webadmins");
Route::get('/emp/reg',[MainController::class, 'registerEmp'])->name("admin.addRegister")->middleware("auth:webadmins");
Route::post('/postEmployee',[MainController::class, 'saveEmployee'])->name("admin.postEmployees")->middleware("auth:webadmins");
Route::get('/admin/profile',[MainController::class, 'adminProfile'])->name("admin.addRegister")->middleware("auth:webadmins");
Route::post('/admin/updateProfile/{id}',[MainController::class, 'updateProfile'])->name("admin.update")->middleware("auth:webadmins");






//Routes
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Cart Controller
Route::get('casual/{id}',[HomeController::class,'addToList'])->name('employeeToList');
Route::get('/savedList',[HomeController::class, 'mySavedList'])->name('recruites')->middleware('auth:webemployers');

// The route that the button calls to initialize payment
Route::post('/pay', [HomeController::class, 'initialize'])->name('pay');

Route::get('/dash/employeeRequested',[MainController::class,'requestedEmployees'])->name('auth:webadmins');
Route::get('/dash/recruiteStatus/{id}',[MainController::class,'updateRequestStatus'])->name('auth:webadmins');
// The callback url after a payment
Route::get('/rave/callback', [HomeController::class, 'callback'])->name('callback');

Route::get('users',[HomeController::class, 'validAuth']);
Route::post('/userCart', [HomeController::class, 'employeeCart']);

Route::get('/saveRecruited', [HomeController::class,'saveRecruited'])->name('recruitedT');

Route::get('/listRemoving/{employerId}/{employeeId}',[HomeController::class,'removeFromList']);
