<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\utilities\Helper;

class CaseIdController extends Controller
{
    use Helper;
    public function checkId(Request $request){

        try {
            $table = $request->type == 'Ip' ? 'u_hisips' : 'u_hisops' ;
            $caseId =$this->getLastCode($table,'DOCNO');
            $caseDocId =$this->getLastCode($table,'DOCID');
            $currentYear = Carbon::now()->format('y'); //last 2 digits of this year
            $caseIdYear = substr($caseId->DOCNO,0,2); //First 2 digits of last caseid
            $digits = substr($caseId->DOCNO,3);// last 5 digits of the caseId
            $lengthIndicator = strlen($digits);
            $count = 0;
            $caseDocId->DOCID++;
            $caseDocId =$caseDocId->DOCID;
            if($caseId){
                if($caseIdYear == $currentYear){
                    $caseId->DOCNO++;
                    $caseId = $caseId->DOCNO;
                }else{
                    $caseId =$currentYear.'-'.'00001';
                }
            }else{
                $caseId =$currentYear.'-'.'00001';
            }
           
            return response(['caseId' =>$caseId, 'docId' => $caseDocId]);
        } catch (Throwable $e) {
            error_log($e);
            return false;
        }
       
    }

}
