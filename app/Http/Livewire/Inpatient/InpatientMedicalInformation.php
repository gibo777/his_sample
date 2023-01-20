<?php

namespace App\Http\Livewire\Inpatient;

use Livewire\Component;

class InpatientMedicalInformation extends Component
{
    public $greet = '';
    public function render()
    {
        return view('livewire.inpatient.inpatient-medical-information');
    }
}
