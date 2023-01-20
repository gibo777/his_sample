<?php

namespace App\Http\Livewire\Setup;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class UserManagement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $sortColumnName = 'id';
    public $sortDirection = 'desc';
    public $perPage = 10;

    public function sortBy($columnName)
    {
        // dd('here');

        if($this->sortColumnName === $columnName){
            $this->sortDirection = $this->swapSortDirection();

        }else{
            $this->sortDirection = 'asc';
        }
        

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection(){
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';

    }

    public function paginationView()
    {
        return 'livewire.custom-pagination';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = $this->search;
        // error_log($search);
        $role=Auth::user()->role_name;
        $users = DB::table('users')
        ->Where('id', 'like', '%'.$search.'%')
        ->orWhere('first_name','like','%'.$search.'%')
        ->orWhere('last_name','like','%'.$search.'%')
        ->orWhere('middle_name', 'like','%'.$search.'%')
        ->orWhereRaw("CONCAT(first_name,' ',last_name) LIKE?", '%'.$search.'%')
        ->orWhereRaw("CONCAT(last_name,' ',first_name) LIKE?", '%'.$search.'%')
        ->orWhereRaw("CONCAT(first_name,' ',middle_name,' ',last_name) LIKE?", '%'.$search.'%')
        ->orWhereRaw("CONCAT(last_name,' ',first_name,' ',middle_name) LIKE?", '%'.$search.'%')
        ->orderBy($this->sortColumnName, $this->sortDirection)
        ->paginate($this->perPage);
        

        return view('livewire.setup.user-management',
        [
            'users'=>$users,
            'role'=>$role,
        ]);
    }
}
