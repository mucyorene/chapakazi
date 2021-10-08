<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function saveUser(Request $request){
        // return $request->input();
        $request->validate([
            'names'=>'required|min:5|max:40',
            'phone'=>'required|min:10|max:14',
            'email'=>'required|email|unique:admins',
            'address'=>'required',
            'uname'=>'required',
            'password'=>'required|min:3|max:20',
        ]);
    
    }

    public function authUsers(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        
    }
}
