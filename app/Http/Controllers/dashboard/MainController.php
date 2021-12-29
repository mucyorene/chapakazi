<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\Employers;

class MainController extends Controller
{
    public function index(){

        $hired = employees::where('status','=','1')->latest()->get();
        $data = employees::where('status','=','1')->latest()->get();

        $employers = Employers::All();
        $employee = employees::all();

        $totalEmployers = count($employers);
        $totalHired = count($hired);
        $totalEmployee = count($employee);
        $totalIncome = (500*$totalHired);

        return view("dashboard.index", compact('data','totalEmployers','totalHired','totalEmployee','totalIncome'));

    }
    public function systemCasuals(){

        $data = employees::where('status','=','1')->latest()->get();
        return view('dashboard/pages/recruitedEmployees',compact('data'));
        // foreach ($allCasuals as $value) {
        //    echo $value->firstName;
        // }
    }

    public function systemEmployers(){
        $data = Employers::latest()->get();
        return view('dashboard/pages/adminEmployers',compact('data'));
    }

    public function recruitePage()
    {
        $data = employees::all();
        return view("dashboard/pages/recruite")->with('data', $data);
    }
    
    public function registerEmp()
    {
       return view("dashboard/pages/registerEmployee");
    }
    public function saveEmployee(Request $request)
    {
        $request->validate([
            'identificationNumber'=>'required|min:16|max:16',
            'firstName'=>'required',
            'lastName'=>'required',
            'experience'=>'required',
            'dateOfBirth'=>'required',
            'availability'=>'required',
            'ratePerDay'=>'required',
            'category'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'formProfile'=>'required'
        ]);
        
        $image = $request->file('formProfile');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('profiles'),$new_name);

        $newEmp = new employees();

        $newEmp->identificationNumber = $request->input("identificationNumber");
        $newEmp->firstName = $request->input("firstName");
        $newEmp->lastName = $request->input("lastName");
        $newEmp->experience = $request->input("experience");
        $newEmp->dob = $request->input("dateOfBirth");
        $newEmp->availability = $request->input("availability");
        $newEmp->ratePerDay = $request->input("ratePerDay");
        $newEmp->category = $request->input("category");
        $newEmp->gender = $request->input("gender");
        $newEmp->phone = $request->input("phone");

        //File
        $newEmp->profile = $new_name;

        $newEmp->status = 0;

        $newEmp->save();
        //return back()->with("success","Thanks for registering data");

        return response()->json(['success'=>'Employee Added successfully']);
    }

    public function removeEmployee($id){
        $id = employees::find($id);
        $id->delete();
        return back()->with('success', 'Employee removed successfully');
    }

    public function deleteEmployer($id){
        $toDelete = Employers::find($id);
        $toDelete->delete();
        return response()->json('Deletion Success');
    }
    public function deleteAllEmployers(){
        $deleteEmployers = Employers::truncate();
        return response()->json('Removed successfully');
    }
}
