<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view("dashboard.index");
    }
    public function recruitePage()
    {
       return view("dashboard/pages/recruite");
    }
}
