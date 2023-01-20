<?php

namespace App\Http\Livewire\PatientRegister;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Traits\utilities\getPageAuthType;

class PatientInformation extends Component
{
    use getPageAuthType;
    public $patientId ='';
    public function mount($id){
       $this->patientId = $id;
    }
    public function render(Request $request)
    {
        $table = '';
        if($request->type){
            $request->session()->put('viewingType', $request->type);
        }
        $request->session()->get('viewingType') == 'Outpatient' ? $table = 'u_hisops' : $table = 'u_hisips';
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

        $contactType = DB::table('contacttypes')->select('contacttype')->get();

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

        $hasActiveCase = DB::table($table)->select('DOCNO')->where(['U_PATIENTID'=>$this->patientId,'DOCSTATUS'=>'Active'])->first() ?? '';


        // get patients contact - KLA - 12/28/2022
        $contacts = DB::table('ne_hispatientcontacts')->where('CODE',$patients->CODE)->get();

        // get patients email - KLA - 12/29/2022
        $emails = DB::table('ne_hispatientemails')->where('CODE',$patients->CODE)->get();

        // get email types -KLA -12/29/2022
        $emailTypes= DB::table('emailcontacttypes')
            ->select('emailtype')
            ->orderBy('emailtype', 'asc')
            ->get();

        // $countries = explode((','),$patients->U_ADDRESS);
        // dd($religions);
        // dd($nationalities);
        // dd($genders);
        // dd( $countries);

        // $getRole = DB::table('v_usermenu')->select('AUTHTYPE')->where(['MENUCMD'=>"HISPatientRegistration",
        //             'USERID'=>Auth::user()->role_name
        //         ])->first();


        // if(($getRole!=null )&&($getRole->AUTHTYPE =="R")){
        //     $role = "R";
        // }else{
        //     $role = "F";
        // }
        $role = $this->getAuthType("HISPatientRegistration");

        return view('livewire.patient-register.patient-information',[
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
