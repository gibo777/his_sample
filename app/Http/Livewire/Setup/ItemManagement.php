<?php

namespace App\Http\Livewire\Setup;

use \stdClass;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ItemManagement extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $itemPerPage = 10;
    public $search = '';
    public $sortColumnName = 'DOCNO';
    public $sortDirection = 'desc';

     //sort table
    public function sortBy($columnName)
    {

        if($this->sortColumnName === $columnName){
            $this->sortDirection = $this->swapSortDirection();

        }else{
            $this->sortDirection = 'asc';
        }
        

        $this->sortColumnName = $columnName;
    }

    //sort direction
    public function swapSortDirection(){
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    //livewire component first render
    public function mount()
    {
        $this->reset();
    }

    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        
        //fetch data items
        $items = DB::table('u_hisitems')
        ->select('CODE','NAME','DATECREATED','U_TYPE','U_GROUP','U_BRANDNAME','U_GENERICNAME')
        ->where('CODE','like','%'.$this->search.'%')
        ->orWhere('NAME','like','%'.$this->search.'%')
        ->orWhere('U_TYPE','like','%'.$this->search.'%')
        ->orWhere('U_GROUP','like','%'.$this->search.'%')
        ->orWhere('U_BRANDNAME','like','%'.$this->search.'%')
        ->orWhere('U_GENERICNAME','like','%'.$this->search.'%')
        ->paginate($this->itemPerPage);

        return view('livewire.setup.item-management',['items'=>$items]);
    }
}
