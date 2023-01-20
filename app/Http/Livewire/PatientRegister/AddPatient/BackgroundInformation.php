<?php

namespace App\Http\Livewire\PatientRegister\AddPatient;

use App\Models\ne_hispatientsbginfo;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class BackgroundInformation extends Component
{
    public $countries;

    

    // public function saveBackgroundInfo(Request $request){
    //     // dd($request->bgData);
    //     $rules = [

    //     ];
    //     $data = [];

    //     // ];
    //     foreach ($request->bgData as $key => $value) {
    //         # code...
    //         // dd($key);
    //         if(($key =="U_BG_EXTNAME")||($key=="U_BG_CONTACTNO2ND")||($key=="U_BG_MIDDLENAME")){
    //             // dd($key);
    //         }else{
    //                 foreach ($request->bgData[$key] as $index => $values) {
    //             # code...
    //             // dd($index);$validation = Validator::make($request->bgData, $rules)
    //             $rules +=[$index =>'required'];
    //             $data +=[$index=>$values];
    //             }
    //         }
        
    //     }
    // // dd($data);
    //     $validation = Validator::make($data, $rules);//validate data inserted
    //     // dd($validation);  
    //         if($validation->fails()){
    //             $success = false;
    //             $msg = $validation->errors()->first();
    //             $errors = $validation->getMessageBag()->toArray();

    //         // dd($errors);
    //         }  
    //         else{
    //             dd($request->session()->all());
    //             $patientBGInfo=[];
                
    //             foreach ($request->bgData as $parent => $value) {
    //                 $i=0;
    //                 foreach ($request->bgData[$parent] as $child => $valuess) {
    //                         $patientBGInfo[$i][$parent]=$valuess;

    //                     $i+=1;
    //                 }    
    //             }
    //             // dd($patientBGInfo);
    //             for($i=0; $i<count($patientBGInfo); $i++){
    //                     $patientBGInfo[$i]+=['CODE'=>$request->session()->get('mrn'),
    //                         'U_BG_NAME'=>" ",
    //                     'U_BG_ADDRESS'=>" ",];
    //                     // if()dd
    //                     // dd($patientBGInfo[$i]['id']);
    //                     $checkBG = ne_hispatientsbginfo::find($patientBGInfo[$i]['id']);
    //                     if($checkBG){
    //                         $checkBG->update($patientBGInfo[$i]);
                            
    //                     }else{
    //                         ne_hispatientsbginfo::create($patientBGInfo[$i]);
    //                     }
    //             }    
    //         }
    //             return response()->json([
    //                         'success' => true,
    //                         // 'msg'=>$msg,
    //                         // 'errors' => $errors,
                        
    //                     ]);
    // }
    public function render(Request $request)
    {
        // dd($request->session()->get('mrn'));
        $bgInfos = DB::table('ne_hispatientsbginfos')->where(['CODE'=> $request->session()->get('mrn')])->get();
        // dd($bgInfos);
        $relationships = DB::table('ne_relationship')->orderBy('relationship', 'asc')->get();
        $countries = DB::table('countries')->orderBy('used', 'desc')->get();
        
        return view('livewire.patient-register.add-patient.background-information',[
            'countriesBg'=>$countries,
            'relationships'=>$relationships,
            'bgInfos'=>$bgInfos
        ]);
    }
}
