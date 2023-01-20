<?php


      namespace App\Traits\utilities;
      use Illuminate\Support\Facades\DB;
      use Illuminate\Support\Facades\Auth;

      trait getPageAuthType{
        public function getAuthType($page){
            $getRole = DB::table('v_usermenu')->select('AUTHTYPE')->where(['MENUCMD'=>$page,
                'USERID'=>Auth::user()->role_name
            ])->first();


            if(($getRole!=null )&&($getRole->AUTHTYPE =="R")){
                $role = "R";
            }else{
                $role = "F";
            }

            return $role;
        }
      }

