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
use App\Models\Ratings;
use App\Models\RecruitedEmployee;
use App\Models\recruiteList;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function index(){
        // $employees = employees::where('status','=','0')->get();
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

    public function employeePage(){
        return view('pages/employeePage');
    }

    public function registerAdmin(){
        return view("pages/regAdmin");
    }

    public function showCasual($id){
        $casual = employees::find($id);
        return view('pages/view',compact('casual'));
    }

    public function employerProfile(){
        $real = Auth::guard('webemployers')->user();
        return view('dashboard/pages/userProfile',compact('real'));
    }

    public function loadEmployees(){
        $employees = employees::where('status','=','0')->get();

        return view('pages/load_employee',compact('employees'));
    }

    public function updateUser(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'names'=>'required|min:3|max:100',
            'email'=>'required|email',
            'phone'=>'required|min:10|max:10',
            'username'=>'required|min:2|max:20',
            'address'=>'required|min:3',
            'biography'=>'required|min:10|max:500',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{

            if ($request->input('profile') == null) {
                $employer = Employers::find($id);
                $employer->fullNames = $request->input('names');
                $employer->email = $request->input('email');
                $employer->phone = $request->input('phone');
                $employer->username = $request->input('username');
                $employer->address = $request->input('address');
                $employer->biography = $request->input('biography');
                $employer->update();
                return response()->json(['status'=>1, 'success'=>'Successfully updated']);
            }else{

                $image = $request->file('profile');
                $new_name = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('profiles'),$new_name);

                $employer = Employers::find($id);
                $employer->fullNames = $request->input('names');
                $employer->email = $request->input('email');
                $employer->phone = $request->input('phone');
                $employer->username = $request->input('username');
                $employer->address = $request->input('address');
                $employer->biography = $request->input('biography');
                $employer->profile = $request->input('profile');
                $employer->update();
                return response()->json(['status'=>1, 'success'=>'Successfully updated']);

            }

        }



    }

    public static function rating($employeeId){
        $sum = 0;
        $rate = Ratings::where('employeeId','=',$employeeId)->get();
        foreach ($rate as $value) {
            $sum += $value->rating;
        }
        if ($sum >0) {
            $avg = $sum/count($rate);
            return number_format($avg,1);
        }

    }

    public function indexSearch($key){

        $employees = employees::query()->where(function($query) use ($key){
            $query->where('firstName','LIKE','%'.$key.'%')
            ->orwhere('lastName','LIKE','%'.$key.'%')
            ->orwhere('category','LIKE','%'.$key.'%');
        })
        ->whereDoesntHave("recruted")
        ->get();

        //return view('pages/load_search_results',compact('employees'));

        foreach ($employees as $key => $value) {
            $checkIf = RecruitedEmployee::where('employeeId','=',$value->id)->count();
            if ($checkIf != null) {

                $employees[$key]=[];

                return view('pages/load_search_results',compact('employees'));
            }
            else{
                return view('pages/load_search_results',compact('employees'));
            }
        }






        // if ($results) {
        //     foreach ($results as $value) {
        //         echo ($value->lastName);
        //     }
        // }else{
        //     return "Results not found";
        // }
        //return view('pages/load_search_results',compact('employees'));

    }

    public function searchByCategory($category){
        $employees = employees::where('category','LIKE','%'.$category.'%')
                              ->where('status','=','0')
                              ->latest()->get();
        // foreach ($categoryList as $value) {
        //     echo $value->firstName;
        // }
        return view('pages/load_category_employee',compact('employees'));
    }

    public function rateEmployee($rating, $employeeId, $employerId){
        $saveRating = new Ratings();
        $saveRating->rating = $rating;
        $saveRating->employerId = $employerId;
        $saveRating->employeeId = $employeeId;

        $check = Ratings::where('employerId','=',$employerId)
                        ->where('employeeId','=',$employeeId)
                        ->count();
        if ($check < 1) {
           $saveRating->save();
           return response()->json('Rated successfully');
        }
        return response()->json('You already rated this employee');
    }

    public function myCasuals(){

        $data = Auth::guard('webemployers')->user()->recruitedEmployees()->with(['hiredEmployee'])->get();

        return view('dashboard/pages/employerCasuals',compact('data'));

        // foreach ($employersLists as $values) {
        //    echo $values->hiredEmployee->firstName;
        // }

    }

    public function removeMyCasual($id){

        $update = Auth::guard('webemployers')->user()->recruitedEmployees()->with('hiredEmployee')->get();

        $updating = employees::where('id','=',$id)->update(['status'=>'0']);

        $updating = employees::find($id);
        $names = $updating->firstName." ".$updating->lastName;
        $employerName = Auth::guard('webemployers')->user()->fullNames;

        $receiver=$updating->phone;
        $sender="+250788890071";
        $mssg="Hello ".$names." , ".$employerName." as your employer, decided to part away with you!";

        $data=array(
                "sender"=>$sender,
                "recipients"=>$receiver,
                "message"=>$mssg,
            );

        $url="https://www.intouchsms.co.rw/api/sendsms/.json";
        $data=http_build_query($data);
        $username="renemucyo";
        $password="mucyo12345";

        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $result=curl_exec($ch);
        $httpcode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);



        $toDelete = RecruitedEmployee::where('employerId','=',Auth::guard('webemployers')->id())
                                    ->where('employeeId','=',$id)
                                    ->delete();

        if ($toDelete) {
            return response()->json(['success'=>'Successfully removed from your employees']);
            //return redirect('/employerOwns');
        }

        // foreach ($update as $value) {
        //     echo $value->hiredEmployee->lastName."</br>";
        // }
    }

    public function removeAllCasuals(){
        $deleteEmployees =RecruitedEmployee::where('employerId','=',Auth::guard('webemployers')->id())
                                        ->delete();
        return response()->json('Successfully removed employees');
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
           return back();
        }
    }

    // public function confirmEmployerAccount($id){
    //     $updating = Employers::find($id);
    //     $updating->status = "1";
    //     return redirect('/authentication');
    // }

    public function saveUser(Request $request){

        $request->validate([
            'names'=>'required|min:5|max:40',
            'phone'=>'required|min:10|max:14',
            'email'=>'required|email|unique:admins',
            'address'=>'required',
            'username'=>'required',
            'password'=>'required|min:3|max:20',
            'biography'=>'required|min:10|max:255'
        ]);

        $newEmployer = new ModelsEmployers();
        $newEmployer->fullNames = $request->input('names');
        $newEmployer->phone = $request->input('phone');
        $newEmployer->email = $request->input('email');
        $newEmployer->address = $request->input('address');
        $newEmployer->username = $request->input('username');
        $newEmployer->profile = "avatar.png";
        $newEmployer->biography = $request->input('biography');
        $newEmployer->password = Hash::make($request->input('password'));


        $phones = $request->input('phone');
        $names = $request->input('names');

        $newEmployer->save();

        // $receiver=$phones;
        // $sender="+250788890071";
        // $mssg="Hello ".$names."You are welcome, Thanks for signing up at CHAPAKAZI, Better casuals, are waiting for you!";

        // $data=array(
        //         "sender"=>$sender,
        //         "recipients"=>$receiver,
        //         "message"=>$mssg,
        //     );

        // $url="https://www.intouchsms.co.rw/api/sendsms/.json";
        // $data=http_build_query($data);
        // $username="renemucyo";
        // $password="mucyo12345";

        // $ch=curl_init();
        // curl_setopt($ch,CURLOPT_URL,$url);
        // curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
        // curl_setopt($ch,CURLOPT_POST,true);
        // curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        // curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
        // curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        // $result=curl_exec($ch);
        // $httpcode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
        // curl_close($ch);

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
        return view('pages.recruitingList',compact('employersList','totalNumber'));

        // foreach ($employersList as $value) {
        //     $unemployeed = RecruitedEmployee::where('employeeId','=',$value->employee->id)->count();
        //     if ($unemployeed != null) {

        //         $employersList = [];
        //         $totalNumber = 0;
        //          ///return count($employersList);
        //         //$employersList = unset($employersList[$key]);
        //        return view('pages.recruitingList',compact('employersList','totalNumber'));
        //     }else{
        //         $totalNumber = count($employersList);
        //         return view('pages.recruitingList',compact('employersList','totalNumber'));
        //     }

        // }


        //return Auth::guard('webemployers')->user()->fullNames;

        //return view('pages.recruitingList',compact('employersList','totalNumber'));

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
        // foreach ($employersList as $value) {
        //     $unemployeed = RecruitedEmployee::where('employeeId','=',$value->employee->id)->count();
        //     if ($unemployeed == null) {
        //         return count($employersList);
        //     }
        //     else{
        //         return "";
        //     }
        // }
        return $totalNumber = count($employersList);
    }

    public function userDashView(){

        $myEmployees = Auth::guard('webemployers')->user()->recruitedEmployees()->with(['hiredEmployee'])->get();
        $totalNumber = count($myEmployees);

        return view("dashboard.userHome",compact('totalNumber','myEmployees'));
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


    public function employeeCart(Request $request){

        $empId = $request->input('employersId');
        $casualId = $request->input('employeeId');

        $addCart = new recruiteList();
        $addCart->employerId = $empId;
        $addCart->empId = $casualId;
        $addCart->status = 'pending';

        $check = recruiteList::where('employerId','=',$empId)
                            ->where('empId','=',$casualId)
                            ->count();
        //return $check;
        if ($check == null) {
            $addCart->save();
            return redirect('/eRecruite');
        }

        return redirect('/savedList');

    }

    public function saveRecruited(){
        $employersList = Auth::guard('webemployers')->user()->employees()->with(['employee'])->get();

        foreach ($employersList as $value) {

            //Moving from cart to hired employeee

            $recruitedEmp = new RecruitedEmployee();
            $recruitedEmp->employerId = Auth::guard('webemployers')->id();
            $recruitedEmp->employeeId = $value->employee->id;

            //Removing from ID

            $removeCart = recruiteList::where('empId','=',$value->employee->id);

            $removeCart->delete();
            if ($removeCart) {
                $recruitedEmp->save();
            }else{
                return "Can't delete from cart";
            }
            //Updating existing employee status

            $findEmployee = employees::find($value->employee->id);

            $findEmployee->status = "1";

            //Variables to send into SMS function

            //$phones = $findEmployee->phone;

            $phones = $findEmployee->id;
            $names = $findEmployee->firstName." ".$findEmployee->lastName;
            $employerNames = Auth::guard('webemployers')->user()->fullNames;
            $employerPhones = Auth::guard('webemployers')->user()->phone;

            //Calling SMS function

            // $receiver=$phones;
            //     $sender="+250788890071";
            //     $mssg="Hello ".$names." You're hired by ".$employerNames.", call employer at: ".$employerPhones;

            //     $data=array(
            //             "sender"=>$sender,
            //             "recipients"=>$receiver,
            //             "message"=>$mssg,
            //         );

            //     $url="https://www.intouchsms.co.rw/api/sendsms/.json";
            //     $data=http_build_query($data);
            //     $username="renemucyo";
            //     $password="mucyo12345";

            //     $ch=curl_init();
            //     curl_setopt($ch,CURLOPT_URL,$url);
            //     curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
            //     curl_setopt($ch,CURLOPT_POST,true);
            //     curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            //     curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
            //     curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
            //     $result=curl_exec($ch);
            //     $httpcode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
            //     curl_close($ch);

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
