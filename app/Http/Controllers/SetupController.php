<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\u_hispatients;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SetupController extends Controller
{
    public function userManagement(Request $request) {
        return view('his.user-management');
    }

    public function userAuthorization(Request $request) {
        return view('his.user-authorization');
    }

    public function groupAuthorization(Request $request) {
        return view('his.group-authorization');
    }

    public function procedureManagement(Request $request) {
        return view('his.procedure-management');
    }

    public function groupManagement(Request $request) {
        return view('his.group-management');
    }
}
