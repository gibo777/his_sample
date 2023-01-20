<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Auth\CreatesPassword;
use Illuminate\Support\Facades\Validator;


class CreatePassController extends Controller
{
    use CreatesPassword;
    // public function __construct()
    // {
    //     $this->middleware('checkAuth');
    // }
    public function validator($data){
        $rules = [
            'email' => 'required|email',
            'password'  => [
                'required',
                'string',
                'confirmed',
                Password:: min(8)->letters()->numbers()->mixedCase()->symbols(),
            ],
            'password_confirmation' => 'required',
        ];
        $validator = Validator::make($data->all(), $rules);

        if($validator->fails()){
            $errors = $validator->getMessageBag()->toArray();
            $keys = array_keys($errors);
            return $values = [
                'success' => false,
                'errors' => $errors,
            ];
        }
        return ['success'=>true];
        

    }
    
}
