@php
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
  ->orderBy('ITEMID', 'asc')
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
@endphp
<div class="sidebar sidebar-scroll" >
  <div class="logo-container">
    <div class="logo-details">
        <img src="{{ URL::asset('img/company/company_logo.png') }}" alt="" class="rounded" height="50" width="50">
    </div>
  </div>
    <ul class="nav-links" id="custom-scroll">
      @foreach ($new_nav as $parent_key =>$main_val)
        <li name="{{$main_val->menu_name}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{$main_val->menu_name}}" class="">
          {{-- {{dd($main_val)}} --}}
          <div class="icon-link">
            @if (count($main_val->sub)!=0)
              <a class="sidebar-name">
                <i class="{{$main_val->icon_name}}"></i>
                {{-- <i class='bx bx-book-alt'></i> --}}
                <span class="link_name">{{$parent_key}}</span>
              </a>
              <i class='bx bxs-chevron-down arrow'></i>
            @else
            @if ($main_val->path!="")
              <a path="{{$main_val->path}}" class="sidebar-name sidebar-href" id="{{$main_val->id_name}}">
                <i class="{{$main_val->icon_name}}"></i>
                {{-- <i class='bx bx-book-alt'></i> --}}
                <span class="link_name">{{$parent_key}}</span>
              </a>
            @else
              <a path="{{$main_val->path}}" class="sidebar-name" id="{{$main_val->id_name}}">
                <i class="{{$main_val->icon_name}}"></i>
                {{-- <i class='bx bx-book-alt'></i> --}}
                <span class="link_name">{{$parent_key}}</span>
              </a>
            @endif
            
            @endif
          </div>
          @if ($main_val->sub!=[])
            <ul class="sub-menu">
              @foreach ($main_val->sub as $sub_nav)
                  {{-- {{dd($sub_nav->id)}} --}}
                  {{-- {{dd(($sub_nav))}} --}}
                  <li class="side-li"><a path="{{$sub_nav->path}}" class="sidebar-href" id="{{$sub_nav->id_name}}">{{$sub_nav->menu_name}}</a></li>
              @endforeach
            </ul>
          @endif
        </li>  
      @endforeach
    </ul>      
</div>