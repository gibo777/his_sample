<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemManagementController extends Controller
{
    public function itemList(){
        return view('his.item-management');
    }
}
