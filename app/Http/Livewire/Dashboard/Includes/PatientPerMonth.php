<?php

namespace App\Http\Livewire\Dashboard\Includes;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientPerMonth extends Component
{

    public $year = "2022";
    public $perYear="2022";

    
    public function render()
    {
        $perYear=$this->perYear;
        $years =DB::table('u_hispatients')
            ->selectRaw('YEAR(DATECREATED) as year')
            ->groupBy('year')
            // ->whereYear('created_at', '=', $year)
            //   ->whereMonth('created_at', '=', $month)
              ->get();

            foreach($years as $year){
                $data[]=DB::table('u_hispatients')->selectRaw('YEAR(DATECREATED) as year')
                ->whereYear('DATECREATED', '=', $year->year)
                ->first(); 
            // $data =
            }


        for($i=0;$i<count($years);$i++){
            $data[$i]=(array)$data[$i];

            $patientsper=DB::table('u_hispatients')
            // ->select('CODE', 'DATECREATED')
            ->whereYear('DATECREATED', '=', $years[$i]->year)
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->DATECREATED)->format('m'); // grouping by months
            });


            $patientsCountPerMonthmcount = [];
            $patientsCountPerMonth = [];

            foreach ($patientsper as $key => $val) {
                $data[$i]['patientsperbyhospital'][(int)$key] = count($val);
            }
            // dd($patientsCountPerMonthCount);
            

            for($j = 1; $j <= 12; $j++){
                if(!empty($data[$i]['patientsperbyhospital'][$j])){
                    $data[$i]['peryear'][$j] = $data[$i]['patientsperbyhospital'][$j];
                }else{
                    $data[$i]['peryear'][$j] = 0;
                }
            }
        }
        return view('livewire.dashboard.includes.patient-per-month',[
            'data'=>$data
        ]);
    }

    /**
     * Get patient per month by during a one full year
     * @param Request $request
     * @return Object
     * @author Kier Aguilar 12/9/2022
     **/
    public function getPatientPerMonth(Request $request){
        // dd($request->all());
        $data=[];


        $years =DB::table('u_hispatients')
        ->selectRaw('YEAR(DATECREATED) as year')
        ->groupBy('year')
            ->get();


        
        
        foreach($years as $year){
             $data[]=DB::table('u_hispatients')->selectRaw('YEAR(DATECREATED) as year')
                ->whereYear('DATECREATED', '=', $year->year)
                ->first(); 
        }

        for($i=0;$i<count($years);$i++){
            $data[$i]=(array)$data[$i];

            $patientsper=DB::table('u_hispatients')
            // ->select('CODE', 'DATECREATED')
            ->whereYear('DATECREATED', '=', $years[$i]->year)
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->DATECREATED)->format('m'); // grouping by months
            });
            $patientsCountPerMonth = [];

            foreach ($patientsper as $key => $val) {
                $patientsCountPerMonth[(int)$key] = count($val);
            }
        
            for($j = 1; $j <= 12; $j++){
                if(!empty($patientsCountPerMonth[$j])){
                    $data[$i]['peryear'][$j] = $patientsCountPerMonth[$j];
                }else{
                    $data[$i]['peryear'][$j] = 0;
                }
            }
            // dd($data);

            



        }
        $perBrgy = [];
        $brgy = DB::table('u_hispatients')
            ->select('U_BARANGAY',DB::raw('count(*) as total'))
            // ->where
            ->groupBy('U_BARANGAY')
            ->orderBy('total','desc')
            ->get();
            // dd($brgy);
        for($i = 0; $i<10; $i++){
            $perBrgy[$i]['brgy']=$brgy[$i]->U_BARANGAY;
            $patientsperBrgyMonth=DB::table('u_hispatients')
            // ->select('CODE', 'DATECREATED')
            ->where('U_BARANGAY', '=', $brgy[$i]->U_BARANGAY)
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->DATECREATED)->format('m'); // grouping by months
            });
    
        // dd($patientsperBrgyMonth);

        $patientsCountBrgyPerMonth = [];

            foreach ($patientsperBrgyMonth as $key => $val) {
                $patientsCountBrgyPerMonth[(int)$key] = count($val);
            }
        
            for($j = 1; $j <= 12; $j++){
                if(!empty($patientsCountBrgyPerMonth[$j])){
                    $perBrgy[$i]['perMonth'][$j] = $patientsCountBrgyPerMonth[$j];
                }else{
                    $perBrgy[$i]['perMonth'][$j] = 0;
                }
            }
    }
            // dd($perBrgy);

            // start edit
        // foreach($years as $year){
        //         $data[]=DB::table('u_hispatients')->selectRaw('YEAR(DATECREATED) as year')
        //         ->whereYear('DATECREATED', '=', $year->year)
        //         ->first(); 
        //     // $data =
        // }
        // // dd($data);

        // $dummyPerHospital=[]; //declare a dummy variable for temporary saving of count per hospital
        
        
        // $patientsper=DB::table('u_hispatients')
        // ->whereYear('DATECREATED', '=', $request->year)
        // ->get()
        // ->groupBy(function($date) {
        //     return Carbon::parse($date->DATECREATED)->format('m'); // grouping by months
        // });//get patients per year


        // foreach ($patientsper as $key => $val) {
        //     $dummyPerHospital[(int)$key] = count($val);//store each value of patients per year into the dummy variable
        // }

        // // START store patients per month into final array 
        //  for($i = 1; $i <= 12; $i++){
        //     if(!empty($dummyPerHospital[$i])){
        //         $patientsCountPerMonth[$i][] = $dummyPerHospital[$i];
        //     }else{
        //         $patientsCountPerMonth[$i] = 0;
        //     }
        // }
        // // End store patients per month into final array 
        // $patientsCountPerMonth['year']=$request->year;
        // dd($patientsCountPerMonth);

        // end edit

        return response()->json([
            'success'=>true,
            'patientsCountPerMonth'=>$data,
            'perBrgy'=>$perBrgy
        ]);
    }
}