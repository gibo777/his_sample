<?php

namespace App\Http\Livewire\PatientRegister\AddPatient;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class CaseInformation extends Component
{
   public $patientCode = '';
    public $searchCase = '';
    public $isNavigated = false;
    protected $listeners = ['refresh' => 'refreshPage'];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount(){
        
    }

    public function refreshPage()
    {
        $this->isNavigated = true;
    }
   
    public function render(Request $request)
    {
        error_log(session('mrn'));
        $table = '';
        if($request->session()->get('viewingType') == 'Outpatient'){
            $table = 'u_hisops';
        }else{
            $table = 'u_hisips';
        }
        $dischargeTypes = DB::table('u_hisdischargetypes')->select('code','name')->get() ?? '';
        $cases = DB::table($table.' AS a')
        ->select(
            'a.DOCNO',
            'a.DATECREATED',
            'a.U_REMARKS2',
            'a.U_TYPEOFDISCHARGE',
            'a.U_ENDDATE',
            'a.U_PATIENTID',
            'b.CODE',
            'b.NAME AS DISPOSITION',
            'a.NE_U_CHIEFCOMPLAINT',
            'a.U_ARRIVEDBY',
            'a.U_DOCTORSERVICE',
            'a.U_REMARKS',
            'a.U_ICDCODE',
            'a.U_ICDDESC',
            'a.LASTUPDATEDBY',
            'a.U_ENDTIME'
            )
        ->leftJoin('u_hisdischargetypes AS b','a.U_TYPEOFDISCHARGE','=','b.CODE')
        ->whereRaw("(a.U_PATIENTID =?) AND (b.NAME LIKE ? OR a.U_ENDDATE LIKE ? OR a.DOCNO LIKE ? OR a.DATECREATED LIKE ? OR a.U_REMARKS2 LIKE ?)",
        [
            $this->patientCode,
            '%'.$this->searchCase.'%',
            '%'.$this->searchCase.'%',
            '%'.$this->searchCase.'%',
            '%'.$this->searchCase.'%',
            '%'.$this->searchCase.'%',

        ])
        ->paginate(5)?? '';
        return view('livewire.patient-register.case-information',['cases' => $cases]);
    }
}
