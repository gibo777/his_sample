<?php

namespace App\Http\Livewire\Dashboard;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{


    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @return Object 
     * @author Kier Aguilar 12/9/2022
     **/
    // doc_f
    public function render()
    {

        
        $years =DB::table('u_hispatients')
            ->selectRaw('YEAR(DATECREATED) as year')
            ->groupBy('year')
            // ->whereYear('created_at', '=', $year)
            //   ->whereMonth('created_at', '=', $month)
              ->get();
        return view('livewire.dashboard.dashboard',[
            'years'=>$years,
            // 'data'=>$data
        ]);
    }
}
