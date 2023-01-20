<div>
    <div class="ci-container px-3 py-2">
        <div class="case-div border-radius-25">
            <div class="row justify-content-between px-2 overflow-auto" id="custom-scroll">
                {{-- {{$newVisitID}} --}}
                <div class="col">
                    <div class="row">
                        <div class="col-sm-5">
                            <label for="search">Search Patient's Case:</label>
                            <input type="text" name="search" id="search" placeholder="Search Case"
                                class="border-radius-25 searchbar" wire:model.debounce.600ms="search" autocomplete="off" />
                        </div>
                    </div>
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Case ID</th>
                            <th>Admit Type</th>
                            <th>Admit Date</th>
                            <th>Summary</th>
                            <th>Disposition</th>
                            <th>Discharge Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(sizeof($cases)>0)
                        @foreach($cases as $case)
                        <tr ondblclick="caseInfoList('{{ $case->DOCNO }}','{{strtolower(session('viewingType')) == 'inpatient' ? 'Ip' : 'Op'}}')">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$case->DOCNO}}</td>
                            <td>{{strtolower(session('viewingType'))}}</td>
                            <td>{{Carbon\Carbon::parse($case->DATECREATED)->toDateString()}}</td>
                            <td>{{$case->U_REMARKS2}}</td>
                            <td>{{$case->DISPOSITION}}</td>
                            <td>{{$case->U_ENDDATE}}</td>
                        </tr>
                        @endforeach
                        @else
                            <tr>
                                <td class="text-center border-radius-25" colspan="8">
                                    No Record Found
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            @include('modal.patient-register.case-information.case-information')
        </div>
        <div class="row pagination-content float-right mt-3 mr-1">
            {{ $cases->links('livewire.custom-pagination') }}
        </div>
    </div>
</div>
