<div>
    <div class="overflow-auto inpatient-div mb-4 pb-0 px-3 border-radius-25" id="custom-scroll">
        <div class="row justify-content-between px-2">
            {{-- {{$newVisitID}} --}}
            <div class="col">
                <div class="row">
                    <div class="col-sm-5">
                        <label for="search">Search Patients:</label>
                        <input type="text" name="search" id="search" placeholder="Enter Patient Name"
                            class="border-radius-25 searchbar" wire:model.debounce.600ms="search" autocomplete="off" />
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
              <table class="table" id="patients" >
                  <thead>
                     <th scope="col" class="table-code">
                          <span class="float-left" wire:click="sortBy('DOCNO')"> Visit ID
                              <i class="fa fa-arrow-up {{$sortColumnName ==='DOCNO' && $sortDirection ==='asc' ?'':'hidden '}} float-right pt-1"></i>
                              <i class="fa fa-arrow-down {{$sortColumnName ==='DOCNO' && $sortDirection ==='desc' ?'':'hidden '}} float-right pt-1"></i>
        
                          </span>
                      </th>
                      <th scope="col" class="table-code">
                          <span class="float-left" wire:click="sortBy('U_PATIENTID')"> MRN
                              <i class="fa fa-arrow-up {{$sortColumnName ==='U_PATIENTID' && $sortDirection ==='asc' ?'':'hidden '}} float-right pt-1"></i>
                              <i class="fa fa-arrow-down {{$sortColumnName ==='U_PATIENTID' && $sortDirection ==='desc' ?'':'hidden '}} float-right pt-1"></i>
                              
                          </span>
                      </th>
                      <th class="table-name-lname">
                          <span class="float-left" wire:click="sortBy('U_LASTNAME')"> Last&nbsp;Name
                              <i class="fa fa-arrow-up {{$sortColumnName ==='U_LASTNAME' && $sortDirection ==='asc' ?'':'hidden '}} float-right pt-1"></i>
                              <i class="fa fa-arrow-down {{$sortColumnName ==='U_LASTNAME' && $sortDirection ==='desc' ?'':'hidden '}} float-right pt-1"></i>
                          </span>
                      </th>
                      <th class="table-name-fname">
                          <span class="float-left" wire:click="sortBy('U_FIRSTNAME')"> First&nbsp;Name
                              <i class="fa fa-arrow-up {{$sortColumnName ==='U_FIRSTNAME' && $sortDirection ==='asc' ?'':'hidden '}} float-right pt-1"></i>
                              <i class="fa fa-arrow-down {{$sortColumnName ==='U_FIRSTNAME' && $sortDirection ==='desc' ?'':'hidden '}} float-right pt-1"></i>
                          </span>
                      </th>
                      <th  class="table-name-mname">
                          <span class="float-left" wire:click="sortBy('U_MIDDLENAME')"> Middle&nbsp;Name
                              <i class="fa fa-arrow-up {{$sortColumnName ==='U_MIDDLENAME' && $sortDirection ==='asc' ?'':'hidden '}} float-right pt-1"></i>
                              <i class="fa fa-arrow-down {{$sortColumnName ==='U_MIDDLENAME' && $sortDirection ==='desc' ?'':'hidden '}} float-right pt-1"></i>
                          </span>
                      </th>
                      <th>Ext.</th>
                      <th>
                          <span class="float-left" wire:click="sortBy('U_BIRTHDATE')"> Birth&nbsp;Date
                              <i class="fa fa-arrow-up {{$sortColumnName ==='U_BIRTHDATE' && $sortDirection ==='asc' ?'':'hidden '}} float-right pt-1"></i>
                              <i class="fa fa-arrow-down {{$sortColumnName ==='U_BIRTHDATE' && $sortDirection ==='desc' ?'':'hidden '}} float-right pt-1"></i>
                          </span>
                      </th>
                      <th>
                          <span class="float-left table-name" wire:click="sortBy('U_GENDER')"> Sex
                              <i class="fa fa-arrow-up {{$sortColumnName ==='U_GENDER' && $sortDirection ==='asc' ?'':'hidden '}} float-right pt-1"></i>
                              <i class="fa fa-arrow-down {{$sortColumnName ==='U_GENDER' && $sortDirection ==='desc' ?'':'hidden '}} float-right pt-1"></i>
                          </span>
                      </th>
                      <th>No.&nbsp;of&nbsp;Visit</th>
                              {{-- <th>Status</th> --}}
                  </thead>
                  <tbody>
                    @if (sizeof($patients) > 0)
                        @foreach($patients as $patient)
                        <tr class="mb-3 ipPatientInfo" ondblclick="inpatientRecord('{{ $patient->U_PATIENTID }}','img/profile.png')">
                            <td >{{ $patient->DOCNO }}</td>
                            <td >{{ $patient->U_PATIENTID }}</td>
                            <td>{{ $patient->U_LASTNAME }}</td>
                            <td>{{ $patient->U_FIRSTNAME }}</td>
                            <td>{{ $patient->U_MIDDLENAME }}</td>
                            <td>{{ $patient->U_EXTNAME }}</td>
                            <td>{{ date('m/d/Y', strtotime($patient->U_BIRTHDATE)) }}</td>
                            <td>{{ $patient->U_GENDER }}</td>
                            <td>{{ $patient->U_VISITNO }}</td>         
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
                            <td class="text-center border-radius-25" colspan="8">
                                No Record Found
                            </td>
                        </tr>
                    @endif
                     
                  </tbody>
              </table>
          </div>
          <div class="row pagination-content float-right mt-3 mr-1">
              {{ $patients->links('livewire.custom-pagination') }}
          </div>
      </div>
      
</div>
