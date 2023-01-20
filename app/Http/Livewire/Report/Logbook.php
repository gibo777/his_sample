<?php

namespace App\Http\Livewire\Report;

use Carbon\Carbon;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Exports\logbookexport;
use Maatwebsite\Excel\Facades\Excel;
use stdClass;

class Logbook extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search = '';
    public $patientType = '';
    public $dateFrom = '';
    public $dateTo = '';
    public $sortColumnName = 'docno';
    public $sortDirection = 'desc';


    public function export(Request $request)
    {
        $startDate = $request->start;
        $endDate = $request->end;
        return Excel::download(new logbookexport($startDate, $endDate), 'Logbook Report (' . $startDate . '-' . $endDate . ').xlsx');
    }

    public function sortBy($columnName)
    {

        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }


        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection()
    {
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

    public function getDate(Request $request)
    {

        $LogoF = public_path() . '/img/company/HIS.jpg';
        $imageLogo = base64_encode(file_get_contents($LogoF));
        $search = $this->search;
        $dateFrom = $this->dateFrom;
        $dateTo = $this->dateTo;
        $patientType = $this->patientType;


        $patients = DB::table('v_report_logbook')
            ->select('docno', 'u_department', 'u_startdate', 'u_starttime', 'u_patientname', 'age', 'u_gender', 'u_address', 'typename')
            ->WhereBetween('u_startdate',  [$dateFrom, $dateTo])
            // ->where ('typename','=','OutPatients')
            ->where('u_patientname', 'like', '%' . $search . '%')
            ->paginate($this->perPage);

        $printPreviewPatient = DB::table('v_report_logbook')
            ->select('docno', 'u_department', 'u_startdate', 'u_starttime', 'u_patientname', 'age', 'u_gender', 'u_address', 'typename')
            ->WhereBetween('u_startdate',  [$dateFrom, $dateTo])
            // ->where ('typename','=','OutPatients')
            ->where('u_patientname', 'like', '%' . $search . '%')
            ->get();


        $data = [
            "imageLogo" => $imageLogo, "start" => $request->start, "end" => $request->end, 'patients' => $patients,
            'printPreviewPatient' => $printPreviewPatient
        ];

        // return view('livewire.report.admissionlist-pdf', [
        //     "imageLogo" => $imageLogo, "start" => $request->start,"reportcount"=>$admissionlistreportcount, "end" => $request->end, "admissionlistreport" => $admissionlistreport
        // ]);

        $pdf = PDF::setPaper('a4', 'landscape')->setOptions(['dpi' => 100, 'defaultFont' => 'Nunito, sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'isJavascriptEnabled' => true])->loadView('livewire.report.logbook-pdf', $data)->setWarnings(false);
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text(50, 561, "Printed by: " . Auth::user()->last_name . " ," . Auth::user()->first_name . " " . Auth::user()->middle_name, null, 10, array(0, 0, 0));
        $canvas->page_text(700, 561, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->download('Logbook_list_report.pdf');
    }

    public function render()
    {
        $search = $this->search;
        $dateFrom = $this->dateFrom;
        $dateTo = $this->dateTo;
        $patientType = $this->patientType;

        if ($dateFrom && $dateTo) {

            $patients = DB::table('v_report_logbook')
                ->select('docno', 'u_department', 'u_startdate', 'u_starttime', 'u_patientname', 'age', 'u_gender', 'u_address', 'typename')
                ->WhereBetween('u_startdate',  [$dateFrom, $dateTo])
                // ->where ('typename','=','OutPatients')
                ->where('u_patientname', 'like', '%' . $search . '%')
                ->orderBy('v_report_logbook.' . $this->sortColumnName, $this->sortDirection)
                ->paginate($this->perPage);

            $printPreviewPatient = DB::table('v_report_logbook')
                ->select('docno', 'u_department', 'u_startdate', 'u_starttime', 'u_patientname', 'age', 'u_gender', 'u_address', 'typename')
                ->WhereBetween('u_startdate',  [$dateFrom, $dateTo])
                // ->where ('typename','=','OutPatients')
                ->where('u_patientname', 'like', '%' . $search . '%')
                ->orderBy('v_report_logbook.' . $this->sortColumnName, $this->sortDirection)
                ->get();


            return view(
                'livewire.Report.logbook',
                [
                    'patients' => $patients,
                    'printPreviewPatient' => $printPreviewPatient
                ]
            );
        } else {
            return view(
                'livewire.Report.logbook',
                [
                    'patients' => '',
                    'printPreviewPatient' => ''
                ]
            );
        }
    }
}
