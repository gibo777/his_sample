<?php

namespace App\Http\Livewire\Report;

use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Exports\exportadmissionlist;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class Admissionlist extends Component
{
    use WithPagination;
    public $StartDate = "", $EndDate = "", $search = "",$doctor="", $perPage = "5";
    public function export(Request $request){
        $startDate = $request->start;
        $endDate = $request->end;
        $doctor = $request->doctor;
        return Excel::download(new exportadmissionlist($startDate,$endDate,$doctor),'Inpatient Visit Report ('.$startDate.'-'.$endDate.').xlsx');
    }
    public function getDate(Request $request)
    {

        $LogoF = public_path() . '/img/company/HIS.jpg';
        $imageLogo = base64_encode(file_get_contents($LogoF));
        // dd($request->doctor);
        if($request->doctor == "all"){
            $admissionlistreport = DB::table('v_report_admission_list')
            ->where('START_DATE', '>=', $request->start)
            ->where('START_DATE', '<=', $request->end)
            ->get();
            $admissionlistreportcount = DB::table('v_report_admission_list')
            ->where('START_DATE', '>=', $request->start)
            ->where('START_DATE', '<=', $request->end)
            ->count();
        }
        else{
            $admissionlistreport = DB::table('v_report_admission_list')
            ->where('START_DATE', '>=', $request->start)
            ->where('START_DATE', '<=', $request->end)
            ->where('ATTENDING_DOCTOR', 'like', '%' . $request->doctor . '%')->get();
            $admissionlistreportcount = DB::table('v_report_admission_list')
            ->where('START_DATE', '>=', $request->start)
            ->where('START_DATE', '<=', $request->end)
            ->where('ATTENDING_DOCTOR', 'like', '%' . $request->doctor . '%')->count();
        }


        $data = [
            "imageLogo" => $imageLogo, "start" => $request->start, "end" => $request->end,"reportcount"=>$admissionlistreportcount, "admissionlistreport" => $admissionlistreport
        ];

        // return view('livewire.report.admissionlist-pdf', [
        //     "imageLogo" => $imageLogo, "start" => $request->start,"reportcount"=>$admissionlistreportcount, "end" => $request->end, "admissionlistreport" => $admissionlistreport
        // ]);

        $pdf = PDF::setPaper('a4', 'landscape')->setOptions(['dpi' => 100, 'defaultFont' => 'Nunito, sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'isJavascriptEnabled' => true])->loadView('livewire.report.admissionlist-pdf', $data)->setWarnings(false);
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text(50, 561, "Printed by: ".Auth::user()->last_name." ,".Auth::user()->first_name." ".Auth::user()->middle_name, null, 10, array(0, 0, 0));
        $canvas->page_text(700, 561, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->download('Admission_List_Report.pdf');

    }
    public function render()
    {
        $start = $this->StartDate;
        $end = $this->EndDate;
        $search = $this->search;
        $doctor = $this->doctor;
        $doctors = DB::table('u_hisdoctors')->SELECT('NAME')->orderBy('NAME','ASC')->get();

        $admissionlist = DB::table('v_report_admission_list')
            ->where('START_DATE', '>=', $start)
            ->where('START_DATE', '<=', $end)
            ->where('ATTENDING_DOCTOR', 'like', '%' . $doctor . '%')->paginate($this->perPage);
        $admissionlistreport = DB::table('v_report_admission_list')
            ->where('START_DATE', '>=', $start)
            ->where('START_DATE', '<=', $end)
            ->where('ATTENDING_DOCTOR', 'like', '%' . $doctor . '%')->get();

            $admissionlistreportcount = DB::table('v_report_admission_list')
            ->where('START_DATE', '>=', $start)
            ->where('START_DATE', '<=', $end)
            ->where('ATTENDING_DOCTOR', 'like', '%' . $doctor . '%')->count();
        return view('livewire.report.admissionlist', ["doctors"=>$doctors,"reportcount"=>$admissionlistreportcount,"start" => $start, "end" => $end, "admissionlist" => $admissionlist, "admissionlistreport" => $admissionlistreport]);
    }
}
