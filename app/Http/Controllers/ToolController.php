<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\u_hispatients;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ToolController extends Controller
{
    public function clickColor ($id) {
        $colorGroup= DB::table('color')->select('color_group')->where('id',$id)->first();
        $colorHex = DB::table('color')->select('color_level','id','hexcode')->where('color_group',$colorGroup->color_group)->get();
         return response([
             'colorHex'=>$colorHex,
             'colorGroup'=>$colorGroup
             ]);
         // error_log(DB::table('color')->select('color_level','id','
         // hexcode')->where('color_group',$colorGroup->color_group)->get());
     }
    public function themeConfiguration() {
        return view('his.theme');
    }

}
