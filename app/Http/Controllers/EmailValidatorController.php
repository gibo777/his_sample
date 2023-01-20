<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailValidatorController extends Controller
{
    public function checkEmail (Request $request){
       $isExisting = false;

        if (DB::table('users')->where('email',$request->email)->first()){
           $isExisting = true;
        }
        else{
           $isExisting = false;
        }
        return response(['isExisting' =>$isExisting]);
    }
}
