<?php

namespace App\Exports;


use Illuminate\Http\Request;
use \Maatwebsite\Excel\Sheet;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class logbookexport implements FromView, ShouldAutoSize, WithEvents, WithDrawings
{
    use Exportable, RegistersEventListeners;
    public $start = "", $end = "";
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('HIS LOGO');
        $drawing->setDescription('HIS');
        $drawing->setPath(public_path('/img/company/HIS.png'));
        $drawing->setHeight(80);
        $drawing->setCoordinates('A1');

        return $drawing;
    }
    public function registerEvents(): array
    {
        return [
            BeforeExport::class  => function (BeforeExport $event) {
            },
            AfterSheet::class    => function (AfterSheet $event) {
                $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->sheet->getDelegate()->getParent()->getDefaultStyle()->getFont()->setName('Nunito');
                // $event->sheet->setAutoSize(true);
                // $event->sheet->setCellValue('c1', 'CONSOLIDATED NEW PATIENT REPORT');


            },
        ];
    }
    public function __construct($start, $end)
    {

        $LogoF = public_path() . '/img/company/HIS.png';
        $this->imageLogo = base64_encode(file_get_contents($LogoF));

        $this->dateFrom = $start;
        $this->dateTo = $end;

        $this->printPreviewPatient = DB::table('v_report_logbook')
            ->select('docno', 'u_department', 'u_startdate', 'u_starttime', 'u_patientname', 'age', 'u_gender', 'u_address', 'typename')
            ->WhereBetween('u_startdate',  [$this->dateFrom, $this->dateTo])
            // ->where ('typename','=','OutPatients')

            ->get();
    }

    public function view(): View
    {

        return view('livewire.report.logbook-excel', [
            "start" => $this->dateFrom,
            "end" => $this->dateTo,
            'printPreviewPatient' => $this->printPreviewPatient
        ]);
    }
}
