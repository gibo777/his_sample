<?php

namespace App\Http\Livewire\Inpatient;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\u_hispatients;
use App\Traits\BackgroundTrait;

class InpatientBackgroundInformation extends Component
{
     //Background Information Functionalities
    // use BackgroundTrait;
    public $patientId ='';
    public $patientCode = '';
    public function mount($id){
       $this->patientCode = $id;
    }
    
    public function render()
    {
        $relationships = DB::table('ne_relationship')->orderBy('relationship', 'asc')->get();
        $patients = u_hispatients::where('CODE', '=', $this->patientCode)->first();
        // dd($patients);
        $inpatient = DB::table('u_hisips')
        ->where('U_PATIENTID', '=', $patients->CODE)
        ->first();

        $countries = DB::table('countries')->select('country')->get();

        // dd($religions);
        // dd($nationalities);
        // dd($genders);
        // dd( $countries);
        return view('livewire.inpatient.inpatient-background-information', [
            'patients' => $patients,
            'countriesBg' => $countries,
            'relationships'=>$relationships
        ]);
    }
    
}
