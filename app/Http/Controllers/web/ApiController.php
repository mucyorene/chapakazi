<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\apiModel\Psychologist;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class ApiController extends Controller
{

    public function apiHandleLogin(Request $request){

        $credentials =  $request->validate([
             'username'=>'required',
             'password'=>'required'
         ]);

         if (Auth::guard('psychologyAuth')->attempt($credentials)) {

             return response()->json(['success','Psychologists authenticated']);

         }elseif (Auth::guard('superAdminAuth')->attempt($credentials)) {

             return response()->json(['success', 'Super Administration authenticated successfully']);

         }else{

             return response()->json(['error','Error found there']);
         }
     }

     public function postPsychologist(Request $request){

        $validator = Validator::make($request->all(),[
            'firstName'=>'required|min:3|max:30',
            'lastName'=>'required|min:3|max:30',
            'address'=>'required|min:3|max:100',
            'category'=>'required|min:3|max:100',
            'qualification'=>'required|min:3|max:100',
            'proofFile'=>'required|max:10000|mimes:pdf,docx,doc',
            'email'=>'required|email',
            'username'=>'required',
            'password'=>[
              'required',
              'confirmed',
              Password::min(8)->mixedCase()->letters()->number()->symbols()->uncompromised()
            ],
            'profile'=>'required|max:2000|mimes:jpg,png,jpeg',
        ]);

        if (!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            $newPsychology = new Psychologist();
            $newPsychology->firstName = $request->input('firstName');
            $newPsychology->lastName = $request->input('lastName');
            $newPsychology->address = $request->input('firstName');
            $newPsychology->category = $request->input('category');
            $newPsychology->qualification = $request->input('qualification');
            $newPsychology->proofFile = $request->input('proofFile');
            $newPsychology->email = $request->input('email');
            $newPsychology->username = $request->input('username');
            $newPsychology->password = Hash::make($request->password);
            $newPsychology->profile = $request->input('profile');
            $newPsychology->save();

            return response()->json(['status'=>1, 'success'=>'Saved successfully']);
        }

     }

}
