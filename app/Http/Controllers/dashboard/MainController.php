<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\Employers;
use App\Models\recruiteList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    public function updateRequestStatus($id){
        $affected = DB::table('recruite_lists')
              ->where('employerId', $id)
              ->update(['status' => 'confirmed']);
        return response()->json(['status'=>'Updated successfully']);
    }
    public function updateProfile(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'names'=>'required|max:50|min:3',
            'email'=>'required|email',
            'username'=>'min:3',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{

            if ($request->input('adminProfile')) {

                $image = $request->file('adminProfile');
                $new_name = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('profiles'),$new_name);

                $update = Admins::find($id);
                $update->names = $request->input('names');
                $update->email = $request->input('email');
                $update->username = $request->input('username');
                $update->update();

                return response()->json(['status'=>1, 'success'=>'Your profile updated successfully']);

            }else{


                $update = Admins::find($id);
                $update->names = $request->input('names');
                $update->email = $request->input('email');
                $update->username = $request->input('username');

                $update->update();

                return response()->json(['status'=>1, 'success'=>'Your profile updated successfully']);
            }



        }


    }
    public function systemCasuals(){

        $data = employees::where('status','=','1')->latest()->get();
        return view('dashboard/pages/recruitedEmployees',compact('data'));
        // foreach ($allCasuals as $value) {
        //    echo $value->firstName;
        // }
    }

    public function adminProfile(){
        $userAdmin = Auth::guard('webadmins')->user();
        return view("dashboard/pages/adminProfile",compact('userAdmin'));
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

        $validator = Validator::make(
            $request->all(),[
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
            ]
        );
        if (!$validator->passes()) {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{

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

            return response()->json(['status'=>'1','success'=>'Employee Added successfully']);

        }
    }

    public function removeEmployee($id){
        $id = employees::find($id);
        $id->delete();
        return back()->with('success', 'Employee removed successfully');
    }

    public function requestedEmployees(){

        $data = recruiteList::all();
        // foreach ($maps as $value) {
        //    return $value->employee->firstName;
        // }
        return view('dashboard/pages/requestedEmployee',compact('data'));
    }

    public function deleteEmployer($id){
        $toDelete = Employers::find($id);
        $toDelete->delete();
        return back();
    }
    public function deleteAllEmployers(){
        $deleteEmployers = Employers::truncate();
        return response()->json('Removed successfully');
    }
}
