<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table,
        thead,
        tr,
        th,
        td {
            border: 1px solid black;
        }

        tbody tr:nth-child(even) {
            /* background-color: #dad8d8; */
            background-color: rgb(232, 232, 232) !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .thead {
            background-color: #00a1ff !important;
            color: black !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
            border-radius: 0px 0px 0px 0px !important;

        }
    </style>
</head>

<body>


    <table>
        <thead>
            <tr>
                <th colspan="4" align="center">HOSPITAL NAME</th>
            </tr>
            <tr>
                <th colspan="4" align="center">INPATIENT CASE REPORT</th>
            </tr>
            <tr>
                <th colspan="4" align="center">Period: <span>FROM {{ \Carbon\Carbon::parse($start)->format('F j, Y') }}
                 </span> <span> TO {{ \Carbon\Carbon::parse($end)->format('F j, Y') }} </span></th>
                </tr>
                <tr>
                    @if ($reportcount>"1")
                    <th colspan="4" align="center">Total Cases: <b>{{$reportcount}}</b></th>
                    @else
                    <th colspan="4" align="center">Total Case: <b>{{$reportcount}}</b></th>

                    @endif

                </tr>

            <tr>
                <th valign="middle">
                    CASE ID

                </th>
                <th valign="middle">
                    Admission Date

                </th>
                <th valign="middle">
                    Admission Time

                </th>
                <th valign="middle">
                    MEDICAL RECORD N0. (MRN)


                </th>
                <th valign="middle">
                    PATIENT NAME


                </th>
                <th valign="middle">
                    AGE


                </th>
                <th valign="middle">
                    ADDRESS


                </th>
                <th valign="middle">
                    CHIEF COMPLAINT


                </th>
                <th valign="middle">
                    INITIAL DIAGNOSIS


                </th>
                <th valign="middle">
                    ROOM NO


                </th>

                <th valign="middle">
                    ATTENDING PHYSICIAN


                </th>
            </tr>

            {{-- <th>Status</th> --}}

        </thead>
        <br><br>
        <tbody>

            @foreach ($admissionlistreport as $pat)
                <tr>
                    <td>{{ $pat->CASEID }}</td>
                    <td>{{ $pat->START_DATE }}</td>
                    <td> {{ $pat->START_TIME }}</td>
                    <td>{{ $pat->PATIENT_ID }}</td>
                    <td> {{ $pat->PATIENT_NAME }}</td>
                    <td>{{ $pat->AGE }}</td>
                    <td>{{ $pat->ADDRESS }}</td>
                    <td>{{ $pat->CHIEF_COMPLAINT }}</td>
                    <td>{{ $pat->INITIAL_DIAGNOSIS }}</td>
                    <td>{{ $pat->ROOM_NO }}</td>
                    <td> {{ $pat->ATTENDING_DOCTOR }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
