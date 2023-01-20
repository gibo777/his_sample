<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RootController extends Controller
{
    //

    public function rootRoute(){
        if (Auth::user() ) {
            if (Auth::user()) {
                if(Auth::user()->email_verified_at != NULL){
                    return view('home');
                }else{
                    Auth::logout();
                    return view('auth.verify');
                }
    
            } else {
                return view('auth.login');
            }
        } else {
            return view('auth.login');
        }
    }
}
