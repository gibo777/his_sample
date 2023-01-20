<?php

namespace App\Http\Livewire\PatientRegister\AddPatient;

use App\Models\ne_hispatientcontact;
use App\Models\ne_hispatientemail;
use App\Models\u_hisips;
use App\Models\u_hisops;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\u_hispatients;
use Illuminate\Http\Response;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; //KLA - 12/14/2022
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use App\Traits\utilities\Helper;
/**
 * @return Patient registration(Array)
 * @param
 * @date
 * @author Julius Colminas 12/09/2022
 */
// Start Add Patient Julius Colminas 12/09/2022
class AddNewPatient extends Component
{
    use Helper;

    public $lastName;
    public $firstName;
    public $middleName;
    public $Ext;
    public $gender;
    public $Birthdate;
    public $civilstatus;
    public $occupation;
    public $nationality;
    public $country,$province,$brgy;
    public $religion;
    public $idtype;
    public $houseNumber;
    public $contactNumber;
    public $city_id = '';
    public $age = '';
    public $countries = [];




    protected $rules = [
        'lastName' => 'required|max:50',
        'firstName' => 'required|max:50',
        'middleName' => 'max:50',
        'Ext' => 'max:20',
        // 'gender' => 'required|not_in:0',
        'Birthdate' => 'required|before:now',
        'age' => 'required',
        // 'civilstatus' => 'required|not_in:0',
        // 'nationality' => 'required|not_in:0',
        // // 'country' => 'required|not_in:0',
        // 'religion' => 'required|not_in:0',
        // 'houseNumber' => 'required|max:20',
        // 'contactNumber' => 'required|digits:11',

    ];

    public function mount(){
        $this->countries = DB::table('countries')->get();
    }
    public function updated($propertyName) {

        $this->validateOnly($propertyName);
    }

    /**
     * Register Patient
     *
     * Undocumented function long description
     *
     * @param Request $request - request thrown by ajax to controller
     * @return Object response Json
     * @author Kier L. Aguilar 12/19/2022
     * @author Christopher P. Napoles 12/19/2022
     **/
    public function setPatientInfo(Request $request){
            

        // dd($request->registerPatientData);
        // dd($request->session()->all());
        $request->session()->forget('mrn');


        $rules = [
        'U_LASTNAME' => 'required|min:3',
        'U_FIRSTNAME'=> 'required',
        'U_MIDDLENAME'=> 'required',
        'U_BIRTHDATE' => 'required',
        'U_GENDER' => 'required',
        'U_CIVILSTATUS' => 'required',
        'U_AGE' => 'required',
        'U_COUNTRY' => 'required',
        'U_PROVINCE' => 'required',
        'U_CITY' => 'required',
        'U_BARANGAY' => 'required',
        'U_STREET' => 'required',
        'U_ZIP' => 'required',
    ];
    
    // dd($request->session()->get('visitType'));
    //Set Validation Data
    // dd( $request->registerPatientData);

    $generalData = $request->registerPatientData ? $request->registerPatientData : $request->all();//CPN 12/19/2022
    $validation = Validator::make($generalData, $rules);//validate data inserted
    $success='';
    $errors='';
    $msg='';$patientMRN="";

    //if validator fails, set error message as message
    if($validation->fails()){
        $success = false;
        $msg = $validation->errors()->first();
        $errors = $validation->getMessageBag()->toArray();

    }
    else{
        
        //check if update or register
        $id = u_hispatients::select('id')->where('CODE',$request->code)->first();
        if($id){
            //Start Christopher P. Napoles 12/19/2022
            $birthday = Carbon::createFromFormat('m/d/Y',$request->U_BIRTHDATE)->format('Y-m-d'); //change format of birthday input from update patient info
            $request->merge([
                'U_BIRTHDATE' => $birthday
            ]);

            // update patient info
            $saveRecord = u_hispatients::find($id->id)->update($request->all());
            if ($saveRecord){
                $success = true;
                 $msg="Updated Successfully";
            }else{
                $errors = '';
            }
            $patientMRN = $request->code;
            //End Christopher P. Napoles 12/19/2022

            // start kier aguilar 12/27/2022
            if($saveRecord){
                $this->updateNumberOfUsed('countries','used','country',$request->U_COUNTRY);
                $this->updateNumberOfUsed('u_hisreligions','used','NAME',$request->U_RELIGION);
                $this->updateNumberOfUsed('u_hisnationalities','used','NAME',$request->U_NATIONALITY);


                // SAVE PATIENTS CONTACT INFO -KLA -12/29/2022
                $this->saveContact('ne_hispatientcontacts',$request->code ,$request->NAME,
                $request->contact_id,$request->contact_type,$request->contact_no,
                    $request->contact_notes);


                // SAVE PATIENTS EMAIL INFO -KLA -12/29/2022
                $this->saveContact('ne_hispatientemails',$request->code ,$request->NAME,
                $request->email_id,$request->email_type,$request->email,
                    $request->email_notes);

            // end kier aguilar - 12/29/2022


            }

        }else{

            $getLastCodeTemp=$this->getLastCode('u_hispatients','NE_IDSERIES');
            $newSeries=(int)( $getLastCodeTemp->NE_IDSERIES)+1;
            $concat_code =$newSeries . '-' .  Carbon::now()->format('Y');
            $fullName = $this->getFullName(
                    $request->registerPatientData['U_LASTNAME'],
                    $request->registerPatientData['U_FIRSTNAME'],
                    $request->registerPatientData['U_MIDDLENAME'],
                    $request->registerPatientData['U_EXTNAME'],
            );

            $defaultValue = [
                'CODE'=>$concat_code,
                'COMPANY'=>"HIS",
                'BRANCH'=>"HO",
                'NE_IDSERIES'=>$newSeries,
                'NAME'=>$fullName,
                'NE_IDYEAR'=>Carbon::now()->format('Y'),
                'DATECREATED'=>Carbon::now()->format('Y-m-d H:i:s'),
                'LASTUPDATED'=>Carbon::now()->format('Y-m-d H:i:s'),
            ];

            $patientInfo = [];
            foreach($request->registerPatientData as $key => $data){
                $patientInfo[$key] = $data;
            }
            // SAVE PATIENTS CONTACT INFO
            $this->saveContact('ne_hispatientcontacts',$concat_code ,$fullName,
            $request->registerPatientData['contact_id'],$request->registerPatientData['contact_type'],$request->registerPatientData['contact_no'],
                $request->registerPatientData['contact_notes']);


            // SAVE PATIENTS EMAIL INFO
            $this->saveContact('ne_hispatientemails',$concat_code ,$fullName,
            $request->registerPatientData['email_id'],$request->registerPatientData['email_type'],$request->registerPatientData['email'],
                $request->registerPatientData['email_notes']);

            $saveRecord = new u_hispatients($defaultValue+$patientInfo);
            $saveRecord->save();
            if($saveRecord){
                $this->updateNumberOfUsed('countries','used','country',$request->registerPatientData['U_COUNTRY']);
                $this->updateNumberOfUsed('u_hisreligions','used','NAME',$request->registerPatientData['U_RELIGION']);
                $this->updateNumberOfUsed('u_hisnationalities','used','NAME',$request->registerPatientData['U_NATIONALITY']);
                $success = true;
                $msg = "Patient Successfully Registered!";
                $errors = [];
                // $data=
                $patientMRN=$concat_code;

            
            }
                if($saveRecord){

                // $this->createVisit($patientMRN,$request->session()->get('visitType'), $request->registerPatientData);
                $request->session()->put('mrn',$patientMRN);
            }
        }

        
    }
        return response()->json([
                'success' => $success,
                'msg'=>$msg,
                'errors' => $errors,
                'mrn'=>$patientMRN
            ]);
}

/**
 * undocumented function summary
 *
 * Undocumented function long description
 *
 * @param String $table table name
 * @param String $code patient code
 * @param Array $contact_type Type of contact
 * @param Array $contact_no contact/email
 * @param Array $contact_note notes
 * @return Boolean
 * @author Kier L. Aguilar - 12/28/2022
 **/
public function saveContact($table,$code, $name, $id, $contact_type, $contact_no, $contact_note)
{
    # code...

    // if($id)
    // dd($id);
    // $infos = [];
    for ($i=0; $i <count($id) ; $i++) { 

        if($table ==  "ne_hispatientcontacts"){
            $infos =[
                'COMPANY'=>"HIS",
                'BRANCH'=>"HO",
                    'CODE'=>$code,
                    'U_NAME'=>$name,
                    'contact_type'=>$contact_type[$i],
                    'contact_no'=>$contact_no[$i],
                    'contact_notes'=>$contact_note[$i],
                    'contact_type'=>$contact_type[$i],
                ];
        }else{
            $infos =[
                    'CODE'=>$code,
                    'U_NAME'=>$name,
                    'email_type'=>$contact_type[$i],
                    'email'=>$contact_no[$i],
                    'email_notes'=>$contact_note[$i],
                    'email_type'=>$contact_type[$i],
                ];
        }


        if($id[$i]==null){
            if($contact_no[$i]!=null){
                if($table == "ne_hispatientcontacts"){
                    
                    $saveContacts = new ne_hispatientcontact(
                    $infos
                );
                }else{
                    
                    $saveContacts = new ne_hispatientemail(
                    $infos
                    );
                }

                
                $saveContacts->save();
            }
            
        }
        else{
            if($contact_no[$i]!=null){
                // $saveContact = 
                if($table == "ne_hispatientcontacts"){
                    
                    $saveContacts = ne_hispatientcontact::find($id[$i])
                    ->update($infos);
                }else{
                    
                    $saveContacts = ne_hispatientemail::find($id[$i])
                    ->update($infos);
                }
            }
        }
    }
    return true;
    // dd($infos);
}

/**
 * undocumented function summary
 *
 * Undocumented function long description
 *
 * @param String $CODE code
 * @param DATE $formatYear get year format
 * @return string
 **/
public function createNewCode($CODE,$formatYear){
    // if()
    $newCodeArray=[];
    $arrayCode = explode('-', $CODE);
    $newCodeArray['year']=$arrayCode[0];
    $newCodeArray['series']=$arrayCode[1];

    if($newCodeArray['year']==Carbon::now()->format($formatYear)){

        $newCode = str_pad((int)($newCodeArray['series']) + 1, strlen($newCodeArray['series']), '0', STR_PAD_LEFT); // 000010
        
        // $newCode = $newCodeArray['series'] +1;
        $newCode = join('-', [$newCodeArray['year'],$newCode]);
    }else{
        $newCode = join('-',[Carbon::now()->format($formatYear), '00001']);
    }
    // dd($newCodeArray);
    // for($i=0; $i<count($arrayCode); $i++ ){
        
    // }
    return $newCode;
}


/**
 * undocumented function summary
 *
 * Undocumented function long description
 *
 * @param Type $var Description
 * @return type
 * @throws conditon
 **/
public function createVisit($CODE,$visitType, $patientData){

    // dd($patientData);

    if($visitType=="Inpatient"){
        $docID = $this->getLastCode('u_hisips', 'DOCID');
        $docNO = $this->getLastCode('u_hisips', 'DOCNO');
        $columns = Schema::getColumnListing('u_hisips');
    }else if($visitType=="Outpatient"){
        $docID = $this->getLastCode('u_hisops', 'DOCID');
        $docNO = $this->getLastCode('u_hisops', 'DOCNO');
        $columns = Schema::getColumnListing('u_hisops');
    }
        
        $newDOCNO=$this->createNewCode($docNO->DOCNO, 'y');
        $visitValue = [
            'U_PATIENTID'=>$CODE,
            'DOCID'=>$docID->DOCID+1,
            'DOCNO'=>$newDOCNO,
            'U_PATIENTNAME'=>$this->getFullName(
                $patientData['U_LASTNAME'],
                $patientData['U_FIRSTNAME'],
                $patientData['U_MIDDLENAME'],
                $patientData['U_EXTNAME']
            ),
            'DATECREATED' =>Carbon::now(),
            'CREATEDBY'=>Auth::user()->user_name,
            'LASTUPDATEDBY'=>Auth::user()->role_name,
        ];



        $index = [];
        $store = [];
                // dd($columns);
        foreach ($patientData as $key => $value) {
            $index[] = $key; 
        }
        $arrray = array_intersect($index,$columns);

        foreach ($arrray as $key => $value) {
            $sameIndexes[]=$value;

        }
        // dd(($sameIndexes));
        $sameColumn = [];
        foreach ($patientData as $key => $value) {
            # code...
            for($i=0; $i<count($sameIndexes); $i++){
                if($key==$sameIndexes[$i]){
                    $sameColumn[$key]=$patientData[$key];
                }
                if($value==null){
                    $sameColumn[$key]="";
                }
            }
        }


        // dd($sameColumn+$visitValue);
        if($visitType=='Inpatient'){
            u_hisips::create($sameColumn+$visitValue);
        }else if($visitType=='Outpatient'){
            u_hisops::create($sameColumn+$visitValue);
        }
        return;
    }

    public function country($value)
    {
        // $this->
        // dd($value);
        $this->countries['country'] = $value;


    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertError()
    {
        $this->dispatchBrowserEvent('alert', 
                ['type' => 'error',  'message' => 'Something is Wrong!']);
    }
    public function birthdate($value)
    {
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Request $request thrown by Ajax
     * @return Object patients record or null
     * @author Kier L. Aguilar - 12/20/2022
     **/
    public function checkPatientIfExist(Request $request){
        // dd($request->all());
        $checkPatientExist=u_hispatients::where($request->all())->get();
        // dd($checkPatientExist);
        if($checkPatientExist){
            $msg = "Patient Already Exist!";
            $exist=true;
        }else{
            $exist = false;
        }
        // dd($checkPatientExist);
            // dd($checkPatientExist);
        return response()->json([
            'success'=>true,
            'exist'=>$exist,
            'msg'=>$msg,
            'patientData'=>$checkPatientExist,
        ]);
        // return $checkPatientExist;
    }

    public function render(Request $request)
    {
        if($request->type){
            $request->session()->put('viewingType', $request->type);
        }

        $getRole = DB::table('v_usermenu')->select('AUTHTYPE')->where(['MENUCMD'=>"HISPatientRegistration",
            'USERID'=>Auth::user()->role_name
        ])->first();


        if(($getRole!=null )&&($getRole->AUTHTYPE =="R")){
            $role = "R";
        }else{
            $role = "F";
        }

        error_log(session('viewingType'));
        $countries = DB::table('countries')->get();
        // $this->countries=[];

        //sort country by most used - KLA - 12/21/2022
        $this->countries = DB::table('countries')->orderBy('used', 'desc')->get();
        
        $u_hisgenders = DB::table('u_hisgenders')->get();
        $u_hiscivilstatus = DB::table('u_hiscivilstatus')->get();
        
        
        $nationalities = DB::table('u_hisnationalities')->get();
        $top3Nationalities = DB::table('v_nationality_top3')->get();

        
        $u_hisreligions = DB::table('u_hisreligions')->orderBy('used', 'desc')->get();
        
        // $this->countries = DB::table('countries')->get();

        $u_provinces =DB::table('provinces')
        ->select('province')
        ->groupByRaw('province')
        // ->Where('country_name','=',$value)
        ->get();

        // get email types -KLA -12/27/2022
        $contactType = DB::table('contacttypes')
            ->select('contacttype')
            ->orderBy('contacttype', "asc")
            ->get();

        $municipalities =DB::table('provinces')
        ->select('municipality')
        ->groupByRaw('municipality')
        ->get();
        $barangay =DB::table('provinces')
        ->select('barangay')
        ->groupByRaw('barangay')
        ->get();
        $zip_code =DB::table('provinces')
        ->select('zip_code')
        ->groupByRaw('zip_code')
        ->get();

        // get email types -KLA -12/29/2022
        $emailTypes= DB::table('emailcontacttypes')
            ->select('emailtype')
            ->orderBy('emailtype', 'asc')
            ->get();

            

        return view('livewire.patient-register.add-patient.add-new-patient',[
            'u_hiscivilstatus'=>$u_hiscivilstatus,
            'u_hisgenders'=> $u_hisgenders,
            'nationalities'=>$nationalities
            ,'u_provinces'=>$u_provinces,
            'municipalities'=>$municipalities,
            'barangay'=>$barangay,
            'zip_code'=>$zip_code,
            'u_hisreligions'=>$u_hisreligions,
            'countries'=>$this->countries,
            'patientType'=>$request->session()->get('visitType'),
            'contactTypes'=>$contactType,
            'top3Nationalities' => $top3Nationalities,
            'emailTypes'=>$emailTypes,
            'authPage'=>$role
        ]);
    }


}
