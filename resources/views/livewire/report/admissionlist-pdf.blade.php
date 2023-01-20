<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, thead, tr,th, td {
            border: 1px solid black;
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
    </style>
</head>
<body>
    <div class="col" style="display:inline;">

        <img src="data:image/jpeg;base64,{{ $imageLogo }}" alt="as"
            style="height: 90px; width:90px;">
    </div>
    <div class="col-10" style="display: inline-block;">
        <label style="font-size: 20px; font-weight:bolder;">HOSPITAL NAME</label><br>
        <label style="font-size: 12px; "><b>Inpatient Case Report </b></label><br>
        {{-- <label style="font-size: 12px; "><b></label><br> --}}
        <div class="row" >
            <label style="font-size: 12px; "> <b>Period&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </b>
                FROM <b>{{ \Carbon\Carbon::parse($start)->format('F j, Y') }}</b> TO
                <b>{{ \Carbon\Carbon::parse($end)->format('F j, Y') }}</b>  </label>
                <br>
                @if ($reportcount>1)
                <label style="font-size: 12px; "> <b>Total Cases&nbsp;: </b> <b>{{$reportcount}}</b></label>
@else
<label style="font-size: 12px; "> <b>Total Case: </b> <b>{{$reportcount}}</b></label>
                @endif
            {{-- <label style="font-size: 12px; "> <b>Total No. of Patients: </b> <b>{{$reportcount}}</b></label> --}}
        </div>


    </div>
    <table class="table table-bordered" style="border: 1px solid black; border-collapse: collapse;"
    id="patients">
    <thead class="thead">
        <th scope="col" class="text-center theadz" style="font-size: 15px;" valign="middle">
            CASE ID

        </th>
        <th class="table-name-lname text-center theadz" style="font-size: 15px;" valign="middle">
           Admission Date

        </th>
        <th class="table-name-fname text-center theadz" style="font-size: 15px;" valign="middle">
             Admission Time

        </th>
        <th class="table-name-mname text-center theadz" style="font-size: 15px;" valign="middle" width="9%">
             MEDICAL RECORD N0. (MRN)


        </th>
        <th class="table-name-mname text-center theadz" style="font-size: 15px;" width="15%" valign="middle">
             PATIENT NAME


        </th>
        <th class="table-name-mname text-center theadz" style="font-size: 15px;" valign="middle">
             AGE


        </th>
        <th class="table-name-mname text-center theadz" style="font-size: 15px;" valign="middle" width="9%">
             ADDRESS


        </th>
        <th class="table-name-mname text-center theadz" style="font-size: 15px;" valign="middle">
             CHIEF COMPLAINT


        </th>
        <th class="table-name-mname text-center theadz" style="font-size: 15px;" valign="middle">
             INITIAL DIAGNOSIS


        </th>
        <th class="table-name-mname text-center theadz" style="font-size: 15px;" valign="middle">
             ROOM NO


        </th>

        <th class="table-name-mname text-center theadz" style="font-size: 15px;" width="15%" valign="middle">
             ATTENDING PHYSICIAN


        </th>


        {{-- <th>Status</th> --}}

    </thead>
    <tbody>

        @foreach ($admissionlistreport as $pat)
            <tr>
                <td style="text-align: center; font-size:12px; ">{{ $pat->CASEID }}</td>
                <td style="text-align: center; font-size:12px;">{{ $pat->START_DATE }}</td>
                <td style="text-align: center; font-size:12px;"> {{ $pat->START_TIME }}</td>
                <td style="text-align: center; font-size:12px;">{{ $pat->PATIENT_ID }}</td>
                <td style="text-align: center; font-size:12px;"> {{ $pat->PATIENT_NAME }}</td>
                <td style="text-align: center; font-size:12px;">{{ $pat->AGE }}</td>
                <td style="text-align: center; font-size:12px;">{{$pat->ADDRESS}}</td>
                <td style="text-align: center; font-size:12px;">{{ $pat->CHIEF_COMPLAINT }}</td>
                <td style="text-align: center; font-size:12px;">{{ $pat->INITIAL_DIAGNOSIS }}</td>
                <td style="text-align: center; font-size:12px;">{{ $pat->ROOM_NO }}</td>
                <td style="text-align: center; font-size:12px;"> {{ $pat->ATTENDING_DOCTOR }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>


{{-- <div class="divFooter">Printed By: {{ Auth::user()->last_name }}, {{Auth::user()->first_name}} {{Auth::user()->middle_name}} | Date Printed: {{ date('m/d/Y') }}</div> --}}
