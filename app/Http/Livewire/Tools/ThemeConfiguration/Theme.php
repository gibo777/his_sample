<?php

namespace App\Http\Livewire\Tools\ThemeConfiguration;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Theme extends Component
{
    public $selectedcolor = "dada";
    public function getTheme(Request $request){

        $data=array('header-color'=>$request->headercolor,
                    'sidebar-color'=>$request->sidebarcolor,
                    'sidebar-active-color'=>$request->sidebara,
                'sidebar-submenu-color'=>$request->sidebarsub,
            'dark-color'=>$request->darkcolor,
        'light-scroll-color'=>$request->lightscroll,
    'background-scroll-color'=>$request->bgscroll,
'home-background-color'=>$request->hbg,
'dark-scroll-color'=>$request->darkscrollcolor,
'user_id'=>Auth::user()->id,
'table-background'=>$request->tablebg,
'table-light-background'=>$request->tablelight,
'border-color'=>$request->color9,
'container-background-color'=>$request->containerbg,
'company-color'=>$request->companycolor,
'nav-border-color'=>$request->navborder,
'nav-tab-color'=>$request->navtab,
'table-text-color'=>$request->tabletext,
'table-border-color'=>$request->tableborder,
'table-striped-color'=>$request->tablestriped,
'pagination-bg'=>$request->paginationbg,
'pagination-color-text'=>$request->paginationtext,
'pagination-active-color-text'=>$request->paginationatext,
'pagination-active-color'=>$request->paginationa,
'pagination-default'=>$request->paginationdef,
'gray-color'=>$request->graycolor,
'box-shadow-color'=>$request->boxshadowcolor,
'active-color'=>$request->activecolor,
'background-color'=>$request->backgroundcolor,
'border-bg-color'=>$request->borderbgcolor,
'footer-bg-color'=>$request->footercolor);
$checkid = DB::table('ne_theme')->select('user_id')->where('user_id','=',Auth::user()->id)->first();
if($checkid==NULL){
    DB::table('ne_theme')->insert($data);
}
else{
DB::table('ne_theme')->where('user_id','=',Auth::user()->id)->update($data);
    }
}
public function setTheme(){
    $checkid = DB::table('ne_theme')->select('user_id')->where('user_id','=',Auth::user()->id)->first();
if($checkid==NULL){
    // DB::table('ne_theme')->insert($data);
    dd('notheme');
}
else{
        $data1 = DB::table('ne_theme')->where('user_id','=',Auth::user()->id)->get();
        return response([
            'data1'=>$data1
        ]);
    }
}

    public function render()
    {
        $selectedcolor=$this->selectedcolor;
        $color = DB::table('color')->orderby('id','desc')
        ->get();
        $group = DB::table('color')->select('color_group')->groupby('color_group')->get();
        $array1=[];

        for($i=0;$i<count($group);$i++){
            $array1[$i] = DB::table('color')->select('id', 'color_group', 'color_level', 'hexcode')
            ->where('color_group','=',$group[$i]->color_group)->orderby('id','desc')
            ->get();
        }
        return view('livewire.tools.theme-configuration.theme',[
            'colors'=>$color,
            'groups'=>$group,
            'colorsss'=>$array1
        ]);
    }
}
