<?php

namespace App\Http\Livewire\Dashboard\Includes;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PatientPerMonthChart extends Component
{
    public $year = "2022";
    public $perYear=2022;
    public function render()
    {
        $perYear=$this->perYear;
        // $years =DB::table('u_hispatients')
        //     ->selectRaw('YEAR(DATECREATED) as years')
        //     ->groupBy('years')
        //     // ->whereYear('created_at', '=', $year)
        //     //   ->whereMonth('created_at', '=', $month)
        //       ->get();

        

        $years =DB::table('u_hispatients')
            ->selectRaw('YEAR(DATECREATED) as year')
            ->groupBy('year')
            // ->whereYear('created_at', '=', $year)
            //   ->whereMonth('created_at', '=', $month)
              ->get();

            //   dd($years);
            //   dd($years[0]);

        // foreach($years as $key => $val){

        // }
        
        // $patientsCountPerMonthmcount = [];
        // $patientsCountPerMonth = [];

        // foreach ($patients as $key => $val) {
        //     $patientsCountPerMonthCount[(int)$key] = count($val);
        // }

        

        // for($i = 1; $i <= 12; $i++){
        //     if(!empty($patientsCountPerMonthCount[$i])){
        //         $patientsCountPerMonth[$i] = $patientsCountPerMonthCount[$i];
        //     }else{
        //         $patientsCountPerMonth[$i] = 0;
        //     }
        // }


            // dd($years);
        // $data=[];
            // foreach($years as $year){
            //     $data[]=DB::table('u_hispatients')->selectRaw('YEAR(DATECREATED) as year')
            //     ->whereYear('DATECREATED', '=', $year->year)
            //     ->first(); 
            // // $data =
            // }

        $patientsper=DB::table('u_hispatients')
            // ->select('CODE', 'DATECREATED')
            ->whereYear('DATECREATED', '=', $perYear)
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->DATECREATED)->format('m'); // grouping by months
            });
            $dummyPerHospital=[];

            foreach ($patientsper as $key => $val) {
                $dummyPerHospital[(int)$key] = count($val);
            }
            $data=[];   
            for($j = 1; $j <= 12; $j++){
                if(!empty($dummyPerHospital[$j])){
                    $data['peryear'][$j] = $dummyPerHospital[$j];
                }else{
                    $data['peryear'][$j] = 0;
                }
            }
            // dd($data);

        
        
        return view('livewire.dashboard.includes.patient-per-month-chart',[
            'data'=>$data,
            'years'=>$years
        ]);
    }
}
