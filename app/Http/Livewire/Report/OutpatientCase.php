<?php

namespace App\Http\Livewire\Report;

use App\Exports\exportoutpatientcase;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OutpatientCase extends Component
{
    public $StartDate = "", $EndDate = "", $search = "", $doctor = "", $perPage = "5";

    public function export(Request $request)
    {
        $startDate = $request->start;
        $endDate = $request->end;
        $doctor = $request->doctor;
        return Excel::download(new exportoutpatientcase($startDate, $endDate, $doctor), 'Outpatient Visit Report (' . $startDate . '-' . $endDate . ').xlsx');
    }

    public function getDate(Request $request)
    {

        $LogoF = public_path() . '/img/company/HIS.jpg';
        $imageLogo = base64_encode(file_get_contents($LogoF));
        if ($request->doctor == "all") {
            $outpatientlistreport = DB::table('v_report_outpatientcase')
                ->where('START_DATE', '>=', $request->start)
                ->where('START_DATE', '<=', $request->end)
                ->get();

            $outpatientlistreportcount = DB::table('v_report_outpatientcase')
                ->where('START_DATE', '>=', $request->start)
                ->where('START_DATE', '<=', $request->end)
                ->count();
        } else {
            $outpatientlistreport = DB::table('v_report_outpatientcase')
                ->where('START_DATE', '>=', $request->start)
                ->where('START_DATE', '<=', $request->end)
                ->where('ATTENDING_DOCTOR', 'like', '%' . $request->doctor . '%')->get();

            $outpatientlistreportcount = DB::table('v_report_outpatientcase')
                ->where('START_DATE', '>=', $request->start)
                ->where('START_DATE', '<=', $request->end)
                ->where('ATTENDING_DOCTOR', 'like', '%' . $request->doctor . '%')->count();
        }


        $data = [
            "imageLogo" => $imageLogo, "start" => $request->start, "end" => $request->end, "reportcount" => $outpatientlistreportcount,
            "outpatientlistreport" => $outpatientlistreport
        ];

        // return view('livewire.report.admissionlist-pdf', [
        //     "imageLogo" => $imageLogo, "start" => $request->start,"reportcount"=>$admissionlistreportcount, "end" => $request->end, "admissionlistreport" => $admissionlistreport
        // ]);

        $pdf = PDF::setPaper('a4', 'landscape')->setOptions(['dpi' => 100, 'defaultFont' => 'Nunito, sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'isJavascriptEnabled' => true])->loadView('livewire.report.outpatientlist-pdf', $data)->setWarnings(false);
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text(50, 561, "Printed by: " . Auth::user()->last_name . " ," . Auth::user()->first_name . " " . Auth::user()->middle_name, null, 10, array(0, 0, 0));
        $canvas->page_text(700, 561, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->download('Outpatient_List_Report.pdf');
    }
    public function render()
    {
        $start = $this->StartDate;
        $end = $this->EndDate;
        $search = $this->search;
        $doctor = $this->doctor;
        $doctors = DB::table('u_hisdoctors')->SELECT('NAME')->orderBy('NAME', 'ASC')->get();

        $outpatientlist = DB::table('v_report_outpatientcase')
            ->where('START_DATE', '>=', $start)
            ->where('START_DATE', '<=', $end)
            ->where('ATTENDING_DOCTOR', 'like', '%' . $doctor . '%')->paginate($this->perPage);
        $outpatientlistreport = DB::table('v_report_outpatientcase')
            ->where('START_DATE', '>=', $start)
            ->where('START_DATE', '<=', $end)
            ->where('ATTENDING_DOCTOR', 'like', '%' . $doctor . '%')->get();

        $outpatientlistreportcount = DB::table('v_report_outpatientcase')
            ->where('START_DATE', '>=', $start)
            ->where('START_DATE', '<=', $end)
            ->where('ATTENDING_DOCTOR', 'like', '%' . $doctor . '%')->count();
        return view('livewire.report.outpatient-case', ["doctors" => $doctors, "reportcount" => $outpatientlistreportcount, "start" => $start, "end" => $end, "outpatientlist" => $outpatientlist, "outpatientlistreport" => $outpatientlistreport]);
    }
}
