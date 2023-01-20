<div>
    @include('modal/utilities/patientTypeModal')
    @include('modal/utilities/patientTypeModalExist')

    <div class="">
        <div class="registration-div border-radius-25 pb-0 px-3 mb-4 overflow-auto" id="custom-scroll">
            {{-- The best athlete wants his opponent at his best. --}}

            <div class="row justify-content-between px-2 ">
            {{-- {{$newVisitID}} --}}
                <div class="col">
                    <div class="row">
                        <div class="col-sm-5">
                            <label for="search">Search Patients:</label>
                            <input type="text" name="search"  id="search" placeholder="Enter Patient Name" class="border-radius-25 searchbar" wire:model.debounce.600ms="search" autocomplete="off" />
                        </div>
                        <div class="col-sm-2 pt-4 px-0">
                            <a class="border-radius-25 btn btn-primary {{$authPage!='R'?'':'disabled'}}" id="addPatient" rights="{{$authPage}}"><i id="{{$role}}">Add&nbsp;Patient</i> </a>

                        {{-- <button  name="Add Picture" class="btn btn-primary" data-toggle="modal" data-target="#addImageModal" >Add Picture</button> --}}
                        </div>
                    </div>
                </div>

                <div class="col-sm-2 text-end">
                    <label for="itemPerPage">Patients per Page:</label>
                    <select name="itemPerPage" id="" wire:model="perPage" class="border-radius-25 select-filter">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                </div>
            </div>

            <div class="loading-div" wire:loading>
                <span style="font-size:1.5rem;">Loading...</span>
                <br/>
                <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
            <div wire:loading.remove >
                <table class=" table table-borderless" id="patients" >
                    <thead>
                        <th scope="col" class="table-code">
                            <span class="float-left" wire:click="sortBy('CODE')"> MRN
                            </span>
                        </th>
                        <th class="table-name-lname">
                            <span class="float-left" wire:click="sortBy('U_LASTNAME')"> Last&nbsp;Name
                            </span>
                        </th>
                        <th class="table-name-fname">
                            <span class="float-left" wire:click="sortBy('U_FIRSTNAME')"> First&nbsp;Name
                            </span>
                        </th>
                        <th  class="table-name-mname">
                            <span class="float-left" wire:click="sortBy('U_MIDDLENAME')"> Middle&nbsp;Name

                            </span>
                        </th>
                        <th>Ext.</th>
                        <th>
                            <span class="float-left" wire:click="sortBy('U_BIRTHDATE')"> Birth&nbsp;Date
                            </span>
                        </th>
                        <th>
                            <span class="float-left table-name" wire:click="sortBy('U_GENDER')"> Sex
                            </span>
                        </th>
                        <th>No.&nbsp;of&nbsp;Visit</th>
                                {{-- <th>Status</th> --}}

                    </thead>
                    <tbody>
                        @if(sizeof($patients) > 0)
                            @foreach($patients as $patient)
                            <tr class="mb-3" wire:key="{{ $patient->CODE }}" id="patientUpdate" ondblclick="viewRecord('{{ $patient->CODE }}','img/profile.png')">
                                <td>{{ $patient->CODE }}</td>
                                <td>{{ $patient->U_LASTNAME }}</td>
                                <td>{{ $patient->U_FIRSTNAME }}</td>
                                <td>{{ $patient->U_MIDDLENAME }}</td>
                                <td>{{ $patient->U_EXTNAME }}</td>
                                <td>{{ date('m/d/Y', strtotime($patient->U_BIRTHDATE)) }}</td>
                                <td>{{ $patient->U_GENDER }}</td>
                                <td>{{ $patient->U_VISITCOUNT }}</td>
                                {{-- <td>
                                    @if($patient->U_ACTIVE==1)
                                        {{ ('Yes') }}

                                    @else
                                        {{('No')}}

                                    @endif
                                </td>          --}}
                            </tr>
                                    {{-- @empty --}}
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="8">
                                    No Record Found
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="hidden">
                <input type="hidden" id="restrictionViewing" value="{{$authPage!='R'?'F':'R'}}">
            </div>
            <div class="row pagination-content float-right mt-3 mr-1">
                {{ $patients->links('livewire.custom-pagination') }}
            </div>
            {{-- <div class="row float-left mt-3 ml-1">
                <a class="btn new-btn print-icon" href="report" id="getreport"><i class="las la-print"></i></a>
            </div> --}}
        </div>
    </div>

</div>