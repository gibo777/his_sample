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

class exportoutpatientcase implements FromView, ShouldAutoSize, WithEvents, WithDrawings
{
    use Exportable, RegistersEventListeners;
    public $start="",$end="";
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
    public function __construct($start, $end , $doctor)
    {

        $LogoF = public_path() . '/img/company/HIS.png';
        $this->imageLogo = base64_encode(file_get_contents($LogoF));
        // $start = $this->start;
        $this->start = $start;

        $this->end = $end;
        $this->doctor = $doctor;
        if($this->doctor =="all"){

            $this->outpatientlist = DB::table('v_report_outpatientcase')
            ->where('START_DATE', '>=', $start)
            ->where('START_DATE', '<=', $end)
            ->get();
            $this->outpatientlistcount = DB::table('v_report_outpatientcase')
            ->where('START_DATE', '>=', $start)
            ->where('START_DATE', '<=', $end)
            ->count();
        }
        else{

            $this->outpatientlist = DB::table('v_report_outpatientcase')
            ->where('START_DATE', '>=', $start)
            ->where('START_DATE', '<=', $end)
            ->where('ATTENDING_DOCTOR', 'like', '%' . $doctor . '%')->get();
            $this->outpatientlistcount = DB::table('v_report_outpatientcase')
            ->where('START_DATE', '>=', $start)
            ->where('START_DATE', '<=', $end)
            ->where('ATTENDING_DOCTOR', 'like', '%' . $doctor . '%')->count();
        }



    }

    public function view(): View
    {

        return view('livewire.report.outpatient-case-excel',["imageLogo"=>$this->imageLogo,"reportcount"=>$this->outpatientlistcount
        ,"outpatientlist"=>$this->outpatientlist,"start"=>$this->start,"end"=>$this->end]);
    }
}
