<?php

namespace App\Http\Livewire\Outpatient;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\utilities\getPageAuthType;
use App\Traits\utilities\newCaseHelper;

class OutpatientNewCase extends Component
{
    use newCaseHelper;
    use getPageAuthType;
    
    public $patientCode = '';
    public $hasActive = '';
    public function mount ($id,$hasActive){
        $this->patientCode = $id;
        $this->hasActive = $hasActive;
    }
    public function render() {
            $case = DB::table('u_hisops')
            ->select(
                'NE_U_CHIEFCOMPLAINT',
                'DOCNO',
                'DOCID',
                'U_REMARKS',
                'U_ARRIVEDBY',
                'DATECREATED',
                'U_PATIENTID',
                'U_DOCTORSERVICE',
                'U_ASSISTEDBY'
            )
            ->where('U_PATIENTID',$this->patientCode)
            ->where('DOCSTATUS','Active')->first();
            $arrivedBy = DB::table('ne_u_hisarrivedby')->select('description')->get() ?? '';
            $services = DB::table('u_hisitems')->select('NAME','CODE')->where('U_GROUP','PRF')->get() ?? '';
            $handlers = DB::table('users')->select('user_name')->get()??'';

            $role = $this->getAuthType('HISOutpatient');

            return view('livewire.outpatient.outpatient-new-case',[
                'case'=>$case,
                'arrivedBy'=>$arrivedBy,
                'services' => $services,
                'handlers' => $handlers,
                'hasActive' => $this->hasActive,
                'authPage'=>$role
            ]);

    }

    public function newCase(Request $request){
        return $this->newAndUpdateCase($request);
    }
}
