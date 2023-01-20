
 <!-- Modal -->
       <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body printlogbook">
                   <div class="container">

                       <div class="row">

                           <div class="col">
                               <img src="{{ asset('img/company/HIS.png') }}" alt="as"
                                   style="height: 90px; width:90px;">
                           </div>
                           <div class="col-10">
                               <label style="font-size: 20px; font-weight:bolder"> HIS </label><br>
                               <label style="font-size: 12px; "><b>Log Book</b></label><br>
                               <label style="font-size: 12px; "><b>Patient Type :</b> Outpatient</label><br>
                               <label style="font-size: 12px; "> <b>From </b> 01/01/2013 <b>To</b>
                                   01/03/2023</label>
                           </div>
                       </div>
                   </div>

                   <table class="table table-bordered" style="border-top: 3px solid black; border-bottom:3px solid black;"
                   id="patients">
                   <thead  class="thead">

                    <th style="text-align: center;">Case No. </th>
                    <th style="text-align: center;">Station</th>
                    <th style="text-align: center;">Date and Time Admission</th>
                    <th style="text-align: center;">Full Name</th>
                    <th style="text-align: center;">Age</th>
                    <th style="text-align: center;">Sex</th>
                    <th style="text-align: center;">Address</th>

                </thead>
                   <tbody>
                    @if ($printPreviewPatient != '')
                        @foreach ($printPreviewPatient as $patient)
                            <tr>
                                <td>{{ $patient->docno }}</td>
                                <td>{{ $patient->u_department }}</td>
                                <td>{{ $patient->u_startdate . ' ' . $patient->u_starttime }}</td>
                                <td>{{ $patient->u_patientname }}</td>
                                <td>{{ $patient->age }}</td>
                                <td>{{ $patient->u_gender }}</td>
                                <td>{{ $patient->u_address }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="8">
                                Please Select Filter
                            </td>
                        </tr>
                    @endif
                </tbody>
               </table>

<div class="footer"> <p>Date Generated: {{ date('m/d/Y H:i:s') }}</p>
    <p>Printed By: {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }}
        {{ Auth::user()->middle_name }} </p></div>

               </div>

           </div>
       </div>
   </div>
