<?php

namespace App\Http\Livewire\Inpatient;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InpatientInformation extends Component
{
    public $patientId ='';
    public function mount($id){
       $this->patientId = $id;
    }
    public function render()
    {
        $patients = DB::table('u_hispatients')
        ->where('CODE', '=', $this->patientId)
        ->first();

        $outpatient = DB::table('u_hisops')
        ->where('U_PATIENTID', '=', $patients->CODE)
        ->first();

        $inpatient = DB::table('u_hisips')
        ->where('U_PATIENTID', '=', $patients->CODE)
        ->first();

        $countries = DB::table('countries')->select('country')->orderBy('used', 'desc')->get();

        if(!empty($outpatient)){
            $patientType = 'Outpatient';
        }
        else{
            $patientType = 'Inpatient';
        }
        
        $genders = DB::table('u_hisgenders')->get();

        $nationalities = DB::table('u_hisnationalities')->orderBy('used', 'desc')->get();

        $religions = DB::table('u_hisreligions')->orderBy('used', 'desc')->get();

        $civilstatus = DB::table('u_hiscivilstatus')->get();
        $hasActiveCase = DB::table('u_hisips')->select('DOCNO')->where(['U_PATIENTID'=>$this->patientId,'DOCSTATUS'=>'Active'])->first() ?? '';


        // $countries = explode((','),$patients->U_ADDRESS);
        // dd($religions);
        // dd($nationalities);
        // dd($genders);
        // dd( $countries);

        // get patients contact - KLA - 01/03/2023
        $contacts = DB::table('ne_hispatientcontacts')->where('CODE',$patients->CODE)->get();

        // get patients email - KLA - 01/03/2023
        $emails = DB::table('ne_hispatientemails')->where('CODE',$patients->CODE)->get();


        // get email types -KLA -01/03/2023
        $emailTypes= DB::table('emailcontacttypes')
            ->select('emailtype')
            ->orderBy('emailtype', 'asc')
            ->get();
        $contactType = DB::table('contacttypes')->select('contacttype')->get();

        $getRole = DB::table('v_usermenu')->select('AUTHTYPE')->where(['MENUCMD'=>"u_hisops",
                    'USERID'=>Auth::user()->role_name
                ])->first();


        if(($getRole!=null )&&($getRole->AUTHTYPE =="R")){
            $role = "R";
        }else{
            $role = "F";
        }
        
        return view('livewire.inpatient.inpatient-information',[
            'patients' => $patients,
            'genders' => $genders,
            'countries' => $countries,
            'nationalities' => $nationalities,
            'religions' => $religions,
            'civilstatus' => $civilstatus,
            'patientType' => $patientType,
            'contactTypes'=>$contactType,
            'contacts'=>$contacts,
            'emailTypes'=>$emailTypes,
            'emails'=>$emails,
            'hasActive' => $hasActiveCase->DOCNO ?? '',
            'authPage'=>$role
        ]);
    }
}
