<?php

namespace App\Http\Livewire\PatientRegister\AddPatient;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\utilities\newCaseHelper;

class NewCase extends Component
{
    use newCaseHelper;
    public $patientCode = '';
    public function mount (){
       
    }
    public function render(Request $request) {
        $this->patientCode = session('mrn');
        $table = '';
        if($request->session()->get('viewingType') == 'Outpatient'){
            $table = 'u_hisops';
        }else{
            $table = 'u_hisips';
        }
        error_log($table);
            $case = DB::table($table)
            ->select(
                'NE_U_CHIEFCOMPLAINT',
                'DOCNO',
                'DOCID',
                'U_REMARKS',
                'U_ARRIVEDBY',
                'DATECREATED',
                'U_PATIENTID',
                $table=='u_hisops' ? 'U_ASSISTEDBY':'U_ADMITTEDBY',
                'U_DOCTORSERVICE'
            )
            ->where('U_PATIENTID',$this->patientCode)
            ->where('DOCSTATUS','Active')->first();
            $arrivedBy = DB::table('ne_u_hisarrivedby')->select('description')->get() ?? '';
            $services = DB::table('u_hisitems')->select('NAME','CODE')->where('U_GROUP','PRF')->get() ?? '';
            $handlers = DB::table('users')->select('user_name')->get()??'';
            return view('livewire.patient-register.new-case',[
                'case' => $case,
                'arrivedBy'=>$arrivedBy,
                'services' => $services,
                'handlers' => $handlers,
                'table' => $table
            ]);

    }

    public function newCase(Request $request){
        return $this->newAndUpdateCase($request);
    }
}
