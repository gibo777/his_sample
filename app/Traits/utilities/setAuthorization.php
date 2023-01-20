<?php
    namespace App\Traits\utilities;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;
    use Carbon\Carbon;

    trait setAuthorization{
        /**
         * Christopher P. Napoles - 01/19/2023
         * show pages to access
         * @param request
         * 
         * return pages, success, userpageaccesses
         */
        public function showPagesAccesses($request) {
            $pages = '';
            error_log($request->parent);
            $userPageAccesses = '';
            $request->parent&&$pages = DB::select("call sp_menu_name(?)",[$request->parent]);
            $request->userId && $userPageAccesses = DB::table('usermenu AS a')
                                ->select('a.ITEMID','a.VISIBLE','a.AUTHTYPE')
                                ->distinct()
                                ->join('ne_hismenureftable AS b',function($join){
                                    $join->on('a.MENUNAME','=','b.menu_name');
                                    $join->on('a.MENUCMD','=','b.menucmd');
                                })
                                ->whereRaw("
                                    (a.NE_ADDONID = ? AND b.parent = ? OR b.menu_name = ?)
                                    AND
                                    (a.USERID = ? )
                                
                                ",[
                                    'HIS2.0',
                                    $request->parent,
                                    $request->parent,
                                    $request->userId,
                                ])
                                ->get();
    
            return response(['success' => true, 'pages'=>$pages,'accesses'=>$userPageAccesses]);
    
        }

        public function saveAuthorizationAccesses($request) {
            $accesses = $request->data;
            if(!$accesses){
                return response(['success'=>false]);
            }
            foreach($accesses as $access){
                $access = (object)$access;
                // dd($access);
                $isFound = DB::table('usermenu')->select('USERID')->where(['USERID' => $access->USERID,'ITEMID'=>$access->ITEMID])->first();
                $isFound ? 
                    DB::table('usermenu')
                    ->where(['USERID' => $access->USERID,'ITEMID'=>$access->ITEMID])
                    ->update([
                        'VISIBLE' => $access->VISIBLE,
                        'AUTHTYPE'=>$access->AUTHTYPE,
                        'LASTUPDATED'=>Carbon::now(),
                        'LASTUPDATEDBY' => Auth::user()->user_menu
                    ])
                :
                    DB::table('usermenu')->insert([
                        'USERID'=>$access->USERID,
                        'MENUID'=>$access->MENUID,
                        'ITEMID'=>$access->ITEMID,
                        'MENUCMD'=>$access->MENUCMD,
                        'MENUNAME'=>$access->MENUNAME,
                        'MENUTYPE'=>$access->MENUTYPE,
                        'NE_ADDONID'=>$access->NE_ADDONID,
                        'AUTHTYPE'=>$access->AUTHTYPE,
                        'VISIBLE'=>$access->VISIBLE,
                        'CREATEDBY'=>Auth::user()->user_name,
                        'DATECREATED'=>Carbon::now(),
                        'LASTUPDATEDBY'=>Auth::user()->user_name,
                        'LASTUPDATED' => Carbon::now(),

                    ]);
            }

            return response(['success'=>true]);

        }
    
    }