<?php

namespace Illuminate\Foundation\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\CreatePassword;
use Illuminate\Auth\Events\Registered;


trait CreatesPassword
{
   
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    //show create password form
    public function createPasswordForm(Request $request)
    {
        $user = '';
        $isExpired = false;
        $now = Carbon::now();
        $checkExp = '';
        $user = DB::table('users')->where('remember_token',$request->token)->first();
        
        if($user){
            $checkExp = Carbon::parse($user->expires_at)->gt(Carbon::now());
            !$checkExp && $isExpired = true;
        }else{
            $isExpired = true;
        }
        return view('auth.createPassword',['user' => $user,'isExpired' => $isExpired,'token' => $request->token]);
    }

    //Register user password
    public function registerPassword(Request $request) {
            error_log($request->password);
            $validates = $this->validator($request);
            if(!$validates['success']){
                return response(['success'=>$validates['success'],'message'=>$validates['errors']]);
            }
            $mytime = Carbon::now();
            $updated = '';
            $requestor = DB::table('users')->where('email',$request->email)->first();
            if($requestor){
                if ($requestor->remember_token == $request->token){
                    $updated = DB::table('users')->where('email',$request->email)->where('remember_token',$request->token)->update([
                        'password' => Hash::make($request->password),
                        'email_verified_at' => $mytime,
                        'expires_at' => $mytime,
                    ]);
                }else{
                    return response(['success'=>false,'message'=>'Token do not match for the user']);
                }
            }else{
                return response(['success'=>false,'message'=>'Email does not exist']);
            }
          
            if($updated){
                // Toastr::success('Password has been registered successfully!','Success');
                return response(['success'=>true,'message'=>'Password has been registered successfully!']);
            }
    }

   

}
