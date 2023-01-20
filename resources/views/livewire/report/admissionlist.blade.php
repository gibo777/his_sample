
<div>
    @include('modal.report.printadmission')



    <div class="overflow-auto outpatient-div pb-0 border-radius-25 px-3">
        <div class="container">
        <div class="row">
            <div class="col-2">
                <label for="" >Select Date From <span class="text-danger">*</span></label>
                <input   wire:model="StartDate" type="date" id="startDate1"
                    class="border-radius-25 datetimepicker d-block" placeholder="mm-dd-yyyy">
            </div>
            <div class="col-2">
                <label for="">Select Date To <span class="text-danger">*</span></label>
                <input  wire:model="EndDate" type="date" id="endDate1"
                    class="border-radius-25 datetimepicker d-block" placeholder="mm-dd-yyyy">
            </div>
            <div class="col-sm">
                <label for="">Attending Doctor</label>

                    <select class="border-radius-25  d-block" id="doctor" name="doctor" wire:model="doctor" style="width: 55%;">
                        <option value=" ">All</option>

                        @foreach ($doctors as $com )
                            <option value="{{$com->NAME}}">{{$com->NAME}}</option>
                        @endforeach

                    </select>
            </div>
            <div class="col-sm">
                <label for="" >Export </label>
                <i class="fa-solid fa-print report-buttons" id="admission_report_printbtn"></i>
                <i class="fa-solid fa-file-pdf report-buttons " id="admission_report_pdfbtn"></i>
                <i class="fa-solid fa-file-excel report-buttons " id="admission_report_excelbtn"></i>
            </div>

        </div>

    <br>


    </div>

    <div class="loading-div" wire:loading>
        <span style="font-size:1.5rem;">Loading...</span>
        <br />
        <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
            <span class="visually-hidden"></span>
        </div>
    </div>
    <div class="printme">
        <table class=" table table-striped" id="patients">
            <thead>
                <th scope="col">
                    <span class="float-left" > CASE ID
                    </span>
                </th>
                <th class="table-name-lname">
                    <span class="float-left" > Admission Date
                    </span>
                </th>
                <th class="table-name-fname">
                    <span class="float-left" > Admission Time
                    </span>
                </th>
                <th class="table-name-mname">
                    <span class="float-left" > MRN

                    </span>
                </th>
                <th class="table-name-mname">
                    <span class="float-left" > PATIENT NAME

                    </span>
                </th>
                <th class="table-name-mname">
                    <span class="float-left" > AGE

                    </span>
                </th>
                <th class="table-name-mname">
                    <span class="float-left" > ADDRESS

                    </span>
                </th>
                <th class="table-name-mname">
                    <span class="float-left" > CHIEF COMPLAINT

                    </span>
                </th>
                <th class="table-name-mname">
                    <span class="float-left" > INITIAL DIAGNOSIS

                    </span>
                </th>
                <th class="table-name-mname">
                    <span class="float-left" > ROOM NO

                    </span>
                </th>

                <th class="table-name-mname">
                    <span class="float-left" > ATTENDING DOCTOR

                    </span>
                </th>


                {{-- <th>Status</th> --}}

            </thead>
            <tbody>
@if (sizeof($admissionlist) > 0)
@foreach ($admissionlist as $pat )

    <tr>
        <td>{{$pat->CASEID}}</td>
        <td>{{$pat->START_DATE}}</td>
        <td>{{$pat->START_TIME}}</td>
        <td>{{$pat->PATIENT_ID}}</td>
        <td>{{$pat->PATIENT_NAME}}</td>
        <td>{{$pat->AGE}}</td>
        <td>-</td>
        <td>{{$pat->CHIEF_COMPLAINT}}</td>
        <td>{{$pat->INITIAL_DIAGNOSIS}}</td>
        <td>{{$pat->ROOM_NO}}</td>
        <td>{{$pat->ATTENDING_DOCTOR}}</td>
    </tr>
@endforeach
@else
<tr  >
    <td class="text-center"  colspan="11">
        Please Select Filter
    </td>
</tr>
@endif
            </tbody>
        </table>
        <div class="row pagination-content float-right mt-3 mr-1">
            {{ $admissionlist->links('livewire.custom-pagination') }}
        </div>
    </div>
    </div>

</div>
