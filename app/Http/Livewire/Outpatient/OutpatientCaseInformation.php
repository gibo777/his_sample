<?php

namespace App\Http\Livewire\Outpatient;

use Livewire\Component;
use Livewire\withPagination;
use Illuminate\Support\Facades\DB;

//start Christopher P. Napoles 12/21/2022
class OutpatientCaseInformation extends Component
{
    public $search='';
    public $patientCode='';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 5;
   
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

    public function mount($id){
        $this->patientCode = $id;
     }

     public $isNavigated = false;
 
     protected $listeners = ['refresh' => 'refreshPage'];
  
     public function refreshPage()
     {
        $this->isNavigated = true;
     }

    /**
     * Render the outpatient-case-information page with given parameters
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
        $cases = DB::table('u_hisops AS a')
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
        return view('livewire.outpatient.outpatient-case-information',['cases' => $cases]);
    }
}
//End
