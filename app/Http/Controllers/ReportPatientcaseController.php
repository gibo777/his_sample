<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportPatientcaseController extends Controller
{
    public function index(){
        return view('his.Patientcase');
    }
}
