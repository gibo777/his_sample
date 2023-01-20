<?php

namespace App\Http\Livewire\Inpatient;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
//start Christopher P. Napoles 12/21/2022
class InpatientCaseInformation extends Component
{
   
    public $search='';
    public $patientCode='';
    public $isNavigated = false;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refresh' => 'refreshPage'];

    /**
     * Mount The Patient Id
     *
     * 
     *
     * @param none
     * @return void
     * @throws conditon
     * @author Christopher P. Napoles 12/21/2022
     **/
    public function mount($id)
    {
        $this->patientCode = $id;
    }

  
    public function refreshPage()
    {
        $this->isNavigated = true;
    }

    /**
     * Render the inpatient-case-information page with given parameters
     *
     * 
     *
     * @param none
     * @return void
     * @throws conditon
     * @author Christopher P. Napoles 12/21/2022
     **/
    public function render()
    {
        $dischargeTypes = DB::table('u_hisdischargetypes')->select('code','name')->get() ?? '';
        $cases = DB::table('u_hisips AS a')
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
            'a.U_ENDTIME'
            )
        ->leftJoin('u_hisdischargetypes AS b','a.U_TYPEOFDISCHARGE','=','b.CODE')
        ->whereRaw("(a.U_PATIENTID =?) AND (b.NAME LIKE ? OR a.U_ENDDATE LIKE ? OR a.DOCNO LIKE ? OR a.DATECREATED LIKE ? OR a.U_REMARKS2 LIKE ?)",
        [
            $this->patientCode,
            '%'.$this->search.'%',
            '%'.$this->search.'%',
            '%'.$this->search.'%',
            '%'.$this->search.'%',
            '%'.$this->search.'%',

        ])
        ->paginate(5)?? '';
        return view('livewire.inpatient.inpatient-case-information',['cases' => $cases]);
    }
}
//end
