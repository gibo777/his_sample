<?php

namespace App\Http\Livewire\Inpatient;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class InpatientList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $sortColumnName = 'DOCNO';
    public $sortDirection = 'desc';
    public $perPage = 10;

    public function sortBy($columnName)
    {
        // dd('here');

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
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $search = $this->search;
        // error_log($search);
        $patients = '';

        $patients = DB::table('u_hisips')
        ->where('DOCSTATUS', "Active")
        ->WhereRaw(
            "
                U_PATIENTNAME LIKE ? OR
                U_PATIENTID LIKE ? OR
                U_BIRTHDATE LIKE ? OR
                CONCAT(U_FIRSTNAME, ' ',U_MIDDLENAME,' ', U_LASTNAME) LIKE ? OR
                CONCAT(U_LASTNAME, ' ', U_FIRSTNAME) LIKE ? OR 
                CONCAT(U_LASTNAME, ' ', U_FIRSTNAME,' ', U_MIDDLENAME) LIKE ?",[
                    '%'.$search.'%',
                    '%'.$search.'%',
                    '%'.$search.'%',
                    '%'.$search.'%',
                    '%'.$search.'%',
                    '%'.$search.'%'
            ])
        ->orderBy($this->sortColumnName, $this->sortDirection)
        ->paginate($this->perPage);

        
        return view('livewire.inpatient.inpatient-list',
        [
            'patients'=>$patients
        ]);
    }
}
