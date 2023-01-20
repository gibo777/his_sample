<style>
    @media print{
        @page{
            size: landscape;
            margin: 6mm 6mm 6mm 6mm;
        }
        td {
            padding-left: 10px;
            padding-top: 5px;
            padding-right: 10px;
            border-radius: 0px 0px 0px 0px !important;
        }
        tr{
            border-radius: 0px 0px 0px 0px !important;

        }
        .theadz{
            border-radius: 0px 0px 0px 0px !important;
        }
        tbody tr:nth-child(even) {
                /* background-color: #dad8d8; */
                background-color: rgb(232, 232, 232) !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            .thead{
                background-color: #8ecdf2 !important;
  color: black !important;
  -webkit-print-color-adjust: exact !important;
  print-color-adjust: exact !important;
  border-radius: 0px 0px 0px 0px !important;

}
table{
    border: 1px solid black !important;
}
.printoutpatient table tbody tr{
    border-top: 1px solid black !important;
  border-bottom: 1px solid black !important;

}
    }
</style>

<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body printoutpatient">
                <div class="container">

                    <div class="row">

                        <div class="col">
                            <img src="{{ asset('img/company/HIS.png') }}" alt="as"
                                style="height: 100px; width:90px;">
                        </div>
                        <div class="col-10">
                            <label style="font-size: 20px; font-weight:bolder">HOSPITAL NAME</label><br>
                            <label style="font-size: 12px; "><b>Outpatient Case Report </b></label><br>
                            {{-- <label style="font-size: 12px; "><b></label><br> --}}
                            <div class="row" >
                                <label style="font-size: 12px; "> <b>Period&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </b>
                                    <b>from</b> {{ \Carbon\Carbon::parse($start)->format('F j, Y') }}<b> to </b>
                                    {{ \Carbon\Carbon::parse($end)->format('F j, Y') }} </label>
                                    @if ($reportcount>1)
                                    <label style="font-size: 12px; "> <b>Total Cases&nbsp;: </b> <b>{{$reportcount}}</b></label>
@else
<label style="font-size: 12px; "> <b>Total Case: </b> <b>{{$reportcount}}</b></label>
                                    @endif
                                {{-- <label style="font-size: 12px; "> <b>Total No. of Patients: </b> <b>{{$reportcount}}</b></label> --}}
                            </div>


                        </div>
                    </div>
                </div>

                <table class="table table-bordered" style="border-top: 3px solid black; border-bottom:3px solid black;"
                    id="patients">
                    <thead class="thead">
                        <th scope="col" class="text-center theadz" valign="middle">
                            CASE ID

                        </th>
                        <th class="table-name-lname text-center theadz" valign="middle">
                           Admission Date

                        </th>
                        <th class="table-name-fname text-center theadz" valign="middle">
                             Admission Time

                        </th>
                        <th class="table-name-mname text-center theadz" valign="middle" width="9%">
                             MEDICAL RECORD N0. (MRN)


                        </th>
                        <th class="table-name-mname text-center theadz" valign="middle">
                             PATIENT NAME


                        </th>
                        <th class="table-name-mname text-center theadz" valign="middle">
                             AGE


                        </th>
                        <th class="table-name-mname text-center theadz" valign="middle" width="9%">
                             ADDRESS


                        </th>
                        <th class="table-name-mname text-center theadz" valign="middle">
                             CHIEF COMPLAINT


                        </th>
                        <th class="table-name-mname text-center theadz" valign="middle">
                             INITIAL DIAGNOSIS


                        </th>
                        <th class="table-name-mname text-center theadz" valign="middle">
                             ROOM NO


                        </th>

                        <th class="table-name-mname text-center theadz" valign="middle">
                             ATTENDING PHYSICIAN


                        </th>


                        {{-- <th>Status</th> --}}

                    </thead>
                    <tbody>

                        @foreach ($outpatientlistreport as $pat)
                            <tr>
                                <td style="text-align: center;">{{ $pat->CASEID }}</td>
                                <td style="text-align: center;">{{ $pat->START_DATE }}</td>
                                <td style="text-align: center;"> {{ $pat->START_TIME }}</td>
                                <td style="text-align: center;">{{ $pat->PATIENT_ID }}</td>
                                <td style="text-align: center;"> {{ $pat->PATIENT_NAME }}</td>
                                <td style="text-align: center;">{{ $pat->AGE }}</td>
                                <td style="text-align: center;">{{$pat->ADDRESS}}</td>
                                <td style="text-align: center;">{{ $pat->CHIEF_COMPLAINT }}</td>
                                <td style="text-align: center;">{{ $pat->INITIAL_DIAGNOSIS }}</td>
                                <td style="text-align: center;">{{ $pat->ROOM_NO }}</td>
                                <td style="text-align: center;"> {{ $pat->ATTENDING_DOCTOR }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                <div class="divFooter">
                    <p>Date Generated: {{ date('m/d/Y H:i:s') }}</p>
                    <p>Printed By: {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }}
                        {{ Auth::user()->middle_name }} </p>
                </div>
            </div>


        </div>
    </div>
</div>
