<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\u_hispatients;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\utilities\newCaseHelper;

class PatientController extends Controller
{
    use newCaseHelper;
    public function outpatientList() {
        return view('his.outpatientlist');
    }

    public function registration(Request $request) {
        return view('his.registration');
    }

    public function patientInformation(Request $request, $patientId) {
        return view('his.patient-information',['patientId'=>$patientId]);
    }

    public function outpatientInformation(Request $request, $outpatientId) {
        return view('his.outpatient-information',['outpatientId'=>$outpatientId]);
    }
    // public function patientInformation(Request $request, $patientId) {
    //     return view('his.patient-information',['patientId'=>$patientId]);
    // }


    // Edited by KLA - 12/21/2022
    public function addNewPatient($type, Request $request) {
        $request->session()->forget(['visitType']);
        $request->session()->put('visitType', $type);
        // dd($request->session()->get('visitType'));
        // dd($type);
        return view('his.add-new-patient');
    }

    public function inpatientList(){
        return view('his.inpatient-list');
    }

    public function inpatientInformation(Request $request, $inpatientId) {
        return view('his.inpatient-information',['inpatientId'=>$inpatientId]);
    }

    public function updateInformation(Request $request){
        $keys = '';
        $data = $request->all();
        $rules = [
            'U_LASTNAME' => 'required',
            'U_FIRSTNAME'=> 'required',
            'U_MIDDLENAME'=> 'required',
            'U_BIRTHDATE' => 'required',
            'U_GENDER' => 'required',
            'U_CIVILSTATUS' => 'required',
            'age' => 'required',
            'U_COUNTRY' => 'required',
            'U_PROVINCE' => 'required',
            'U_CITY' => 'required',
            'U_BARANGAY' => 'required',
            'U_STREET' => 'required',
            'U_ZIP' => 'required',
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails())
        {
            $errors = $validator->getMessageBag()->toArray();
            $keys = array_keys($errors);
            return response ([
                'success' => false,
                'errors' => $keys,
            ]);
        }else{
            return response(['success' => true,
                'errors' => ''
            ]);
        }
    }
    public function saveBackgroundInformation(Request $request){
        $update = u_hispatients::findOrFail($request->id)->update($request->all()) ?? '';
        return response(['update' => $update]);
    }

    public function requestItems(Request $request){
        $requestList = '';
        $type1= $request->type1 ?? '';
        $type2 = $request->type2 ?? '';
        $search = $request->search ?? '';
        switch($request->type1){
            case 'PRC':  
                $requestList = DB::table('u_hisitems')->whereRaw("(NAME LIKE ? OR CODE LIKE ?)",
                [
                    '%'.$search.'%',
                    '%'.$search.'%',
                ])
                ->where(['U_GROUP'=>$type1,'U_SOACATEGORY'=>$type2])->get();
                break;
            
            case 'MED': 
                $requestList = DB::table('u_hisitems')->whereRaw("NAME !='' AND (NAME LIKE ? OR CODE LIKE ?)",
                [
                    '%'.$search.'%',
                    '%'.$search.'%',
                ])
                ->where(['U_GROUP'=>$type1,'U_TYPE'=>$type2])
                ->orderBy('NAME')->get();
            break;
        }
       
       
        return response(['requestList'=>$requestList]);
    }

    public function getCaseDetails(Request $request){
        $visitId = $request->visitId??'';
        $patientType = $request->patientType??'';
        $table = '';
        $patientType == 'Ip' ? $table = 'u_hisips' : $table = 'u_hisops';
        $array = [];
        $refType =  strtoupper($patientType);
        $case = DB::table($table.' AS a')
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
                'a.U_ENDTIME',
                $table == 'u_hisips'?'a.U_ROOMNO':'a.U_TFROOMNO'
            )
        ->leftJoin('u_hisdischargetypes AS b','a.U_TYPEOFDISCHARGE','=','b.CODE')
        ->where('a.DOCNO',$visitId)
        ->first()?? '';
        $vitalSigns = DB::table('ne_u_vitalsigns')->where('visit_id',$visitId)->get() ?? '';
        $icds = DB::table('ne_u_patienticds')->where('visit_id',$visitId)->get()??'';
        $requestDocId = DB::table('u_hisrequests')->select('DOCID')->Where(['U_REFNO'=>$visitId,'U_REFTYPE'=>$refType])->get();
        foreach ($requestDocId as $r){
            array_push($array,$r->DOCID);
        }
        $requestItems = DB::table('u_hisrequestitems')
        ->select('DATECREATED',
                'U_ITEMGROUP',
                'U_ITEMDESC',
                'U_ITEMCODE',
                'U_ITEMGROUP',
                'STATUS',
                'CREATEDBY',
                'U_QUANTITY'
            )
        ->whereIn('DOCID',$array)->get();
        return response(['vitalSigns' => $vitalSigns,'icds'=>$icds,'patientCase' => $case,'requestItems'=>$requestItems]);
    }

    //Create or Update Patient Case
    public function newCase(Request $request){
        return $this->newAndUpdateCase($request);
    }

    
}
