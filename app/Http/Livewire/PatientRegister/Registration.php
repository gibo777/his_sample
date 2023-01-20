<?php

namespace App\Http\Livewire\PatientRegister;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Registration extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $sortColumnName = 'NE_IDSERIES';
    public $sortDirection = 'desc';
    public $perPage = 10;

    public function sortBy($columnName)
    {
        // dd('here');

        if($this->sortColumnName === $columnName){
            $this->sortDirection = $this->swapSortDirection();

        }else{
            $this->sortDirection = 'asc';
        }
        

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection(){
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';

    }

    public function paginationView()
    {
        return 'livewire.custom-pagination';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = $this->search;
        // error_log($search);
        // $role=Auth::user()->role_name;
        $patients = DB::table('u_hispatients')
        ->Where('U_FIRSTNAME', 'like', '%'.$search.'%')
        ->orWhere('U_LASTNAME','like','%'.$search.'%')
        ->orWhere('U_MIDDLENAME', 'like','%'.$search.'%')
        ->orWhere('U_FIRSTNAME', 'like','%'.$search.'%')
        ->orWhere('NAME', 'like','%'.$search.'%')
        ->orWhere('CODE', 'like','%'.$search.'%')
        ->orWhereRaw("CONCAT(U_FIRSTNAME,' ',U_LASTNAME) LIKE?", '%'.$search.'%')
        ->orWhereRaw("CONCAT(U_LASTNAME,' ',U_FIRSTNAME) LIKE?", '%'.$search.'%')
        ->orWhereRaw("CONCAT(U_FIRSTNAME,' ',U_MIDDLENAME,' ',U_LASTNAME) LIKE?", '%'.$search.'%')
        ->orWhereRaw("CONCAT(U_LASTNAME,' ',U_FIRSTNAME,' ',U_MIDDLENAME) LIKE?", '%'.$search.'%')
        ->orderBy($this->sortColumnName, $this->sortDirection)
        ->paginate($this->perPage);

        // $getRole = DB::table('v_usermenu')->select('USERID')->where(['MENUCMD'=>"HISPatientRegistration",
        //         'USERID'=>Auth::user()->role_name
        // ])->first();



        
        $getRole = DB::table('v_usermenu')->select('AUTHTYPE')->where(['MENUCMD'=>"HISPatientRegistration",
                    'USERID'=>Auth::user()->role_name
                ])->first();


        if(($getRole!=null )&&($getRole->AUTHTYPE =="R")){
            $role = "R";
        }else{
            $role = "F";
        }

        // $authPage = DB::table('v_usermenu')->select('AUTHTYPE')->where([
        //     'MENUCMD'=>"HISPatientRegistration",
        //     'USERID'=>$getRole==null?'F':'R'
        // ])->first();
        // dd($authPage);
          
        return view('livewire.patient-register.registration',
        [
            'patients'=>$patients,
            'role'=>Auth::user()->role_name,
            'authPage'=>$role
        ]);
    }
}
