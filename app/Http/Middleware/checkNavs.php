<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class checkNavs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->header('source')){
            return $next($request);
        }else{
            $paths = [];
            $pathChecker = [];
            $hasAccess = '';


            $checUser= DB::table('v_usermenu')->where([
                'USERID'=>Auth::user()->group_id])
                ->first();
                
                if(is_null($checUser)){
                  $role = "";
                }else{
                  $role = Auth::user()->group_id;
                }
                $navs= DB::table('v_usermenu')->where(['menu_type'=> 'M',
                'VISIBLE'=>'1',
                'USERID'=>$role])
                ->get();
              // dd($navs);
                $new_nav=[];
                for ($i=0; $i < count($navs); $i++) { 
                  # code...
                  // $navs[$i]=(array)$navs[$i];
                  // dd($navs[$i]->menu_name);
                  // $new_nav[$i] = DB::table('ne_hismenureftable')->where('menu_type', 'M')->get() 
                  // $navs[$i]->menu_name=(array)$navs[$i]->menu_name;
                  $new_nav[$navs[$i]->menu_name]=DB::table('v_usermenu')->where([
                    'menu_type'=> 'M',
                      'VISIBLE'=>'1',
                    'menu_name'=>$navs[$i]->menu_name,
                    'USERID'=>$role
                    ])->first();
                  $new_nav[$navs[$i]->menu_name]->sub=DB::table('v_usermenu')->distinct()->where([
                    'menu_type'=> 'S',
                      'VISIBLE'=>'1',
                    'parent'=>$navs[$i]->menu_name,
                    'USERID'=>$role
                    ])->get();
                }
            // dd($new_nav);
            foreach($new_nav as $nav){
                if(count($nav->sub)>0){
                    foreach($nav->sub as $submenu){
                        if($submenu->path!='' || $submenu->path!=null){
                            array_push($paths,$submenu->path);
                        }
                    }
                }else{
                    if($nav->path!='' || $nav->path!=null){
                        array_push($paths,$nav->path);
                    }
                }
            }
            $position = strpos($request->path(), '/');
            $rootPath = substr($request->path(),0,$position);
            // dd($rootPath);
            for($i=0;$i< sizeof($paths); $i++){
                if(str_contains('/'.$request->path(), $paths[$i])){
                    array_push($pathChecker,true);
                }else{
                    array_push($pathChecker,false);
                }
            }
            // dd($paths);
            // dd($pathChecker);
            if(in_array('true',$pathChecker)){
                return $next($request);
            //    error_log(true);
            }else{
                return redirect('/');
                // error_log(false);
            }
        }

  
    }
}
