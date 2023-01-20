<?php

namespace App\Http\Livewire\Setup\UserAuthorization;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Traits\utilities\setAuthorization;
class UserAuthorization extends Component
{
    use setAuthorization;
    public $menuId = '';
    public $parent = '';

    public function setParent(Request $request){
        return  $this->showPagesAccesses($request);
    }

    public function saveUserAuthorization (Request $request) {
        return $this->saveAuthorizationAccesses($request);
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
      
        // $menus && dd($menus);
        
   
        // $pages && dd($pages);
            

        // $modules = DB::table('')
        return view('livewire.setup.user-authorization.user-authorization',['menus' => $menus,'pages'=>$pages,'users'=>$users]);
    }
}
