<?php

namespace App\Http\Livewire\Dashboard\Includes;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PatientPerMonthPieChart extends Component
{
    public function render()
    {
    

        return view('livewire.dashboard.includes.patient-per-month-pie-chart',[
        
        ]);
    }
}
