<?php

namespace App\Http\Controllers\web;

use app\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admins;
use App\Models\employees;
use App\Models\Bookings;
use Illuminate\Support\Facades\Hash;

//use KingFlamez\Rave\Facades\Rave as Flutterwave;

use App\Models\employers;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\Employers as ModelsEmployers;
use App\Models\RecruitedEmployee;
use App\Models\recruiteList;
use Illuminate\Support\Facades\Session as FacadesSession;

class HomeController extends Controller
{
    
    public function index(){
        $employees = employees::where('status','=','0')->get();
        return view('index')->with('employees', $employees);
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

    public function addToList(Request $request, $id){
        $emps = employees::find($id);
        $oldList = $request->session()->has('empList')? $request->session()->get('empList'):null;
        $newList = new Bookings($oldList);
        $newList->add($emps, $emps->id);
        $request->session()->put('empList', $newList);
        // dd(session()->get('empList'));
        return redirect()->route('chap.index');
    }

    public function mySavedList(){
        $employersList = Auth::guard('webemployers')->user()->employees()->with(['employee'])->get();


        $totalNumber = count($employersList);
        // foreach ($employersList as $value) {
        //     echo $value->employee->firstName."</br>";
        // }
        return view('pages.recruitingList',compact('employersList','totalNumber'));

        // $myList = recruiteList::find($employersList)->cart('lastName');
        // dd($myList);

        // if (!empty($employersList)) {
        //    dd($employersList);
        // }else{
        //     return "No listed employees";
        // }
               
    }
    public static function displayNumber(){
        $employersList = Auth::guard('webemployers')->user()->employees()->with(['employee'])->get();
        return $totalNumber = count($employersList);
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


    //Payment integration

    // public function initialize()
    // {
    //     $userId = 
    //     //This generates a payment reference
    //     $reference = Flutterwave::generateReference();

    //     // Enter the details of the payment
    //     $data = [
    //         'payment_options' => 'card,banktransfer',
    //         'amount' => 500,
    //         'email' => request()->email,
    //         'tx_ref' => $reference,
    //         'currency' => "Rwf",
    //         'redirect_url' => route('callback'),
    //         'customer' => [
    //             'email' => request()->email,
    //             "phone_number" => request()->phone,
    //             "name" => request()->name
    //         ],

    //         "customizations" => [
    //             "title" => 'Movie Ticket',
    //             "description" => "20th October"
    //         ]
    //     ];

    //     $payment = Flutterwave::initializePayment($data);


    //     if ($payment['status'] !== 'success') {
    //         // notify something went wrong
    //         return;
    //     }

    //     return redirect($payment['data']['link']);
    // }

    // public function callback()
    // {
        
    //     $status = request()->status;

    //     //if payment is successful
    //     if ($status ==  'successful') {
        
    //     $transactionID = Flutterwave::getTransactionIDFromCallback();
    //     $data = Flutterwave::verifyTransaction($transactionID);

    //     dd($data);
    //     }
    //     elseif ($status ==  'cancelled'){
    //         //Put desired action/code after transaction has been cancelled here
    //     }
    //     else{
    //         //Put desired action/code after transaction has failed here
    //     }
    //     // Get the transaction from your DB using the transaction reference (txref)
    //     // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
    //     // Confirm that the currency on your db transaction is equal to the returned currency
    //     // Confirm that the db transaction amount is equal to the returned amount
    //     // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
    //     // Give value for the transaction
    //     // Update the transaction to note that you have given value for the transaction
    //     // You can also redirect to your success page from here

    // }


    public function employeeCart(Request $request){
        
        $empId = $request->input('employersId');
        $casualId = $request->input('employeeId');

        $addCart = new recruiteList();
        $addCart->employerId = $empId;
        $addCart->empId = $casualId;
        $addCart->status = 'pending';
        $addCart->save();
        return redirect('/');
    }

    public function saveRecruited(){
        $employersList = Auth::guard('webemployers')->user()->employees()->with(['employee'])->get();
        

        foreach ($employersList as $value) {
            $recruitedEmp = new RecruitedEmployee();
            $recruitedEmp->employerId = Auth::guard('webemployers')->id();
            $recruitedEmp->employeeId = $value->employee->id;
            $recruitedEmp->save();

            $findEmployee = employees::find($value->employee->id);
            $findEmployee->status = "1";
            $findEmployee->update();

            if ($recruitedEmp && $findEmployee) {
                $dele = Auth::guard('webemployers')->user()->employees();
                $dele->delete();
            }
        }
    }

    public function removeFromList($employerIds, $employeeIds){
        $toDelete = recruiteList::where('employerId','=',$employerIds)
                                  ->where('empId','=',$employeeIds)
                                  ->delete();
        return response()->json(['Successfully removed']);
    }

}
