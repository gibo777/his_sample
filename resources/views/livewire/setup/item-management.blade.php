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
                            <label for="search">Search Items:</label>
                            <input type="text" name="searchItems"  id="searchItems" placeholder="Enter Item Details" class="border-radius-25 searchbar" wire:model.debounce.600ms="search" autocomplete="off" />
                        </div>
                        <div class="col-sm-2 pt-4 px-0">
                            <a class="border-radius-25 btn btn-primary" type="button" id="addItems">Add&nbsp;Items</a>

                        {{-- <button  name="Add Picture" class="btn btn-primary" data-toggle="modal" data-target="#addImageModal" >Add Picture</button> --}}
                        </div>
                    </div>
                </div>

                <div class="col-sm-2 text-end">
                    <label for="itemPerPage">Items per Page:</label>
                    <select name="itemPerPage" id="" wire:model="itemPerPage" class="border-radius-25 select-filter">
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
                <table class=" table table-borderless table-striped" id="patients" >
                    <thead>
                        <th scope="col" class="table-code">
                            <span class="float-left" wire:click="sortBy('CODE')"> Item&nbsp;Code
                            </span>
                        </th>
                        <th class="table-name-lname">
                            <span class="float-left" wire:click="sortBy('U_TYPE')"> Type
                            </span>
                        </th>
                        <th class="table-name-fname">
                            <span class="float-left" wire:click="sortBy('U_GROUP')"> Group
                            </span>
                        </th>
                        <th  class="table-name-mname">
                            <span class="float-left" wire:click="sortBy('U_BRANDNAME')"> Brand&nbsp;Name

                            </span>
                        </th>
                        <th>
                            <span class="float-left" wire:click="sortBy('U_GENERICNAME')"> Generic&nbsp;Name
                            </span>
                        </th>
                        <th>
                            <span class="float-left table-name"> Unit Cost
                            </span>
                        </th>
                                {{-- <th>Status</th> --}}

                    </thead>
                    <tbody>
                        @if($items)
                            @foreach($items as $item)
                            <tr class="mb-3" wire:key="{{ $item->CODE }}" ondblclick="itemView('{{ $item->CODE }}','img/profile.png')">
                                <td>{{ $item->NAME }}</td>
                                <td>{{ $item->U_TYPE }}</td>
                                <td>{{ $item->U_GROUP }}</td>
                                <td>{{ $item->U_BRANDNAME }}</td>
                                <td>{{ $item->U_GENERICNAME }}</td>
                                <td></td>
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
            <div class="row pagination-content float-right mt-3 mr-1">
                {{ $items->links('livewire.custom-pagination') }}
            </div>
            <div class="row float-left mt-3 ml-1">
                <a class="btn new-btn print-icon" href="report" id="getreport"><i class="las la-print"></i></a>
            </div>
        </div>
    </div>

</div>
@include('modal.setup.item-management.add-item-management')
@include('modal.setup.item-management.item-information')
@include('modal.setup.item-management.confirmation')