<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ReportLogbookController extends Controller
{


    public function index(){
        return view('his.logbook');
    }


}

