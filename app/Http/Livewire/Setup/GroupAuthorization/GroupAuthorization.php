<?php

namespace App\Http\Livewire\Setup\GroupAuthorization;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupAuthorization extends Component
{
    public $menuId = '';
    public $parent = '';

    public function setParent(Request $request) {
        $pages = '';
        $request->parent&&$pages = DB::select("call sp_menu_name('{$request->parent}')");

        return response(['success' => true, 'pages'=>$pages]);

    }

    public function mount(){
        $this->menuId = 'HIS2.0';
    }
    public function render()
    {
        $pages = '';
        $menus = '';
        $users = DB::table('users')->select('id','user_name')->get() ?? '';
        if($this->menuId){
            $menus = DB::table('usermenu AS a')->select('a.MENUNAME')->distinct()->join('ne_hismenureftable as b',function($join){
                $join->on('a.MENUNAME','=','b.menu_name');
                $join->on('a.MENUCMD','=','b.menucmd');
            })
            ->where('a.NE_ADDONID',$this->menuId)
            ->where('b.menu_type','M')
            ->get();
        }
        return view('livewire.setup.group-authorization.group-authorization',['menus' => $menus,'pages'=>$pages,'users'=>$users]);
    }
}
