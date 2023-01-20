<?php

namespace App\Http\Livewire\PatientRegister;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\u_hispatients;
use App\Traits\BackgroundTrait;
use Illuminate\Support\Facades\DB;
use App\Models\ne_hispatientsbginfo;
use Illuminate\Support\Facades\Validator;

class BackgroundInformation extends Component
{
     //Background Information Functionalities
    // use BackgroundTrait;
    public $patientId ='';
    public $patientCode = '';
    public $isNavigated = false;
    protected $listeners = ['refreshBGInfo' => 'refreshBGInfoPage'];
    public function mount($id){
       $this->patientCode = $id;
    }

    public function refreshBGInfoPage()
    {
        $this->isNavigated = true;
    }
        public function saveBackgroundInfo(Request $request){
        // dd($request->bgData);
        $rules = [
            
        ];
        $data = [];

        // ];
        foreach ($request->bgData as $key => $value) {
            # code...
            // dd($key);
            if(($key =="U_BG_EXTNAME")||($key=="U_BG_CONTACTNO2ND")||($key=="U_BG_MIDDLENAME")||($key=="id")){
                // dd($key);
            }else{
                    foreach ($request->bgData[$key] as $index => $values) {
                # code...
                // dd($index);$validation = Validator::make($request->bgData, $rules)
                $rules +=[$index =>'required'];
                $data +=[$index=>$values];
                }
            }
        
        }
    // dd($data);
        $validation = Validator::make($data, $rules);//validate data inserted
        // dd($validation);  
            if($validation->fails()){
                $success = false;
                $msg = $validation->errors()->first();
                $errors = $validation->getMessageBag()->toArray();
                return response()->json([
                            'success' => $success,
                            // 'msg'=>$msg,
                            'errors' => $errors,
                        
                        ]);
            
            // dd($errors);
            }  
            else{
                // dd($request->bgData);
                $patientBGInfo=[];
                
                foreach ($request->bgData as $parent => $value) {
                    $i=0;
                    foreach ($request->bgData[$parent] as $child => $valuess) {
                            $patientBGInfo[$i][$parent]=$valuess;

                        $i+=1;
                    }    
                }
                // dd($patientBGInfo);
                for($i=0; $i<count($patientBGInfo); $i++){
                        $patientBGInfo[$i]+=['CODE'=>$request->session()->get('mrn'),
                            'U_BG_NAME'=>" ",
                        'U_BG_ADDRESS'=>" ",];
                        // if()dd
                        // dd($patientBGInfo[$i]['id']);
                        $checkBG = ne_hispatientsbginfo::find($patientBGInfo[$i]['id']);
                        if($checkBG!=null){
                            $checkBG->update($patientBGInfo[$i]);
                            
                        }else{
                            ne_hispatientsbginfo::create($patientBGInfo[$i]);
                        }
                }    
            }
                return response()->json([
                            'success' => true,
                            // 'msg'=>$msg,
                            // 'errors' => $errors,
                        
                        ]);
    }
    public function saveMrn(Request $request){
        // dd($request->all());
        $request->session()->forget('mrn');
        $request->session()->put('mrn',$request->code);
    }
    
    public function render(Request $request)
    {
        // dd($this->patientCode);
        $bgInfos = DB::table('ne_hispatientsbginfos')->where(['CODE'=> $this->patientCode])->get();
        // dd($bgInfos);
        $relationships = DB::table('ne_relationship')->orderBy('relationship', 'asc')->get();
        
        $patients = u_hispatients::where('CODE', '=', $this->patientCode)->first();
        // dd($patients);
        $inpatient = DB::table('u_hisips')
        ->where('U_PATIENTID', '=', $patients->CODE)
        ->first();
        // dd($bgInfos);

        $countries = DB::table('countries')->select('country')->get();

        // dd($religions);
        // dd($nationalities);
        // dd($genders);
        // dd( $countries);
        return view('livewire.patient-register.background-information', [
            'patients' => $patients,
            'countriesBg' => $countries,
            'relationships'=>$relationships,
            'bgInfos'=>$bgInfos
        ]);
    }
    
}
