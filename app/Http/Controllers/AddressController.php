<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function getProvinces(Request $request){
        $provinces = DB::table('provinces')->select('province')->distinct()->where('country_name',$request->country)->get() ?? '';

        return response(['provinces' => $provinces]);
    }

    public function getMunicipalities(Request $request){
        $municipalities = DB::table('provinces')->select('municipality')
                        ->distinct()
                        ->where([
                            'country_name'=>$request->country,
                            'province' =>$request->province,
                        ])->get() ?? '';

        return response(['municipalities' => $municipalities]);
    }

    public function getBarangays(Request $request){
        $barangays = DB::table('provinces')->select('barangay')
        ->distinct()
        ->where([
            'country_name'=>$request->country,
            'province' =>$request->province,
            'municipality' =>$request->municipality,
        ])->get() ?? '';
        
        return response(['barangays' => $barangays]);
    }

    public function getZipCode(Request $request){
        $zipcode = DB::table('provinces')->select('zip_code')
        ->where([
            'country_name'=>$request->country,
            'province' =>$request->province,
            'municipality' =>$request->municipality,
            'barangay' => $request->barangay
        ])->first() ?? '';

        return response(['zipcode' => $zipcode]);
    }
}
