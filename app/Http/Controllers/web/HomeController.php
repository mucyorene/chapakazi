<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admins;
use Illuminate\Support\Facades\Hash;
use App\Models\employers;
use App\Models\Employers as ModelsEmployers;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }
    public function about(){
        return view('pages/about');
    }
    public function services(){
        return view('pages/services');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function authentication(){
        return view('pages.login');
    }

    public function userRegister(){
        return view("pages.register");
    }

    public function registerAdmin(){
        return view("pages/regAdmin");
    }
    public function postAdmin(Request $request){

        $request->validate([
            'names'=>'required|min:5|max:40',
            'email'=>'required|email|unique:admins',
            'username'=>'required',
            'password'=>'required|min:3|max:20',
        ]);
        
        $newAdmin = new Admins();

        $newAdmin->names  = $request->input("names");
        $newAdmin->email  = $request->input("email");
        $newAdmin->username  = $request->input("username");
        $newAdmin->password  = Hash::make($request->password);

        $newAdmin->save();
        if ($newAdmin) {
           return back()->with('success','Thanks for registering new administrator');
        }
    }

    public function saveUser(Request $request){
        // return $request->input();
        $request->validate([
            'names'=>'required|min:5|max:40',
            'phone'=>'required|min:10|max:14',
            'email'=>'required|email|unique:admins',
            'address'=>'required',
            'username'=>'required',
            'password'=>'required|min:3|max:20',
        ]);
        
        $newEmployer = new ModelsEmployers();
        $newEmployer->fullNames = $request->input('names');
        $newEmployer->phone = $request->input('email');
        $newEmployer->email = $request->input('email');
        $newEmployer->address = $request->input('address');
        $newEmployer->username = $request->input('username');
        $newEmployer->password = Hash::make($request->input('password'));

        $newEmployer->save();
        if ($newEmployer) {
           return redirect('/authentication');
        }else{
            return back()->with('error','Failed to register');
        }
    }

    // public function handleLogin(Request $request){
    //     $request->validate([
    //         'username'=>'required',
    //         'password'=>'required'
    //     ]);

    //     $adminInfo = Admins::where('username','=', $request->email )->first();
    //     $employersInfo = Employers::where('username','=',$request->username )->first();

    //     if (!$adminInfo && !$employersInfo) {
    //         return back()->with('Fail','We do not recognize your username');
    //     }elseif($adminInfo){
            
    //     }elseif($employersInfo){

    //     }else{
    //         return back()->with('fail', 'Incorrect username or password');
    //     }
    
    // }

    public function handleLogin(Request $request){
       $credentials =  $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        
        if (Auth::guard('webadmins')->attempt($credentials)) {

            return redirect('/dash/admin');

        }elseif (Auth::guard('webemployers')->attempt($credentials)) {

            return redirect('/user/dash');

        }else{

            return back()->with('error','Error found');
        }
    }

    public function userDashView(){
        return view("dashboard.userHome");
    }

    public function logout()
    {
        Auth::guard('webadmins')->logout();
        return redirect('/authentication');
    }
    public function logout2()
    {
        Auth::guard('webemployers')->logout();
        return redirect('/authentication');
    }
}
