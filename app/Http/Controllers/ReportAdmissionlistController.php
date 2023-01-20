<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportAdmissionlistController extends Controller
{
    public function index(){
        return view('his.Admissionlist');
    }
}
