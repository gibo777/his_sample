<?php

namespace App\Http\Livewire\Outpatient;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Outpatientlist extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search = '';
    public $sortColumnName = 'DOCNO';
    public $sortDirection = 'desc';

    public function sortBy($columnName)
    {

        if($this->sortColumnName === $columnName){
            $this->sortDirection = $this->swapSortDirection();

        }else{
            $this->sortDirection = 'asc';
        }
        

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection(){
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';

        
    }
    public function mount()
    {
        $this->reset();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $search = $this->search;
        // error_log($search);
        // $outpatient = DB::table('u_hisops')
        // ->select('*')
        // ->get();

        $patients = DB::table('u_hisops')
        ->WhereRaw(
            "
                (DOCSTATUS = 'Active') AND
                (U_PATIENTNAME LIKE ? OR
                U_PATIENTID LIKE ? OR
                U_BIRTHDATE LIKE ? OR
                CONCAT(U_FIRSTNAME, ' ',U_MIDDLENAME,' ', U_LASTNAME) LIKE ? OR
                CONCAT(U_LASTNAME, ' ', U_FIRSTNAME) LIKE ? OR 
                CONCAT(U_LASTNAME, ' ', U_FIRSTNAME,' ', U_MIDDLENAME) LIKE ?)",[
                    '%'.$search.'%',
                    '%'.$search.'%',
                    '%'.$search.'%',
                    '%'.$search.'%',
                    '%'.$search.'%',
                    '%'.$search.'%'
            ])
        ->orderBy($this->sortColumnName, $this->sortDirection)
        ->paginate($this->perPage);
        

        return view('livewire.outpatient.outpatientlist',
        [
            'patients'=>$patients
        ]);
    }
}
