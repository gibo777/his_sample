<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SideBar extends Controller
{
    function sidebar () {
    	return view('sidebar-template');
    }
}
