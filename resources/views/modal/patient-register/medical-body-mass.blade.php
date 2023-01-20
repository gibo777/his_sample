<!-- Modal -->
<div>
    <div class="modal fade" id="patientBodyMass" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1" aria-labelledby="patientBodyMassModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg modal-dialog-centered">
               <div class="modal-content">
                   <div class="modal-header">
                       <h1 class="modal-title fs-5" id="patientBodyMassModalLabel">Body Mass Index</h1>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body medical-body-mass-div overflow-auto">
                    <div class="row text-center">
                        <table class="table table-responsive-lg">
                               <tr>
                                   <th>Height</th>
                                   <th>Weight</th>
                                   <th>BMI</th>
                               </tr>
                               <tr>
                                   <td>
                                       <input type="number" class="border-radius-25" placeholder="In/s" id="reg-height-inches">
                                   </td>
                                   <td>
                                       <input type="number" class="border-radius-25" placeholder="Kg/s" id="reg-weight-kg">
                                   </td>
                                   <td>
                                       <input type="text" class="border-radius-25" placeholder="Total"  id="reg-bmi">
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <input type="number" class="border-radius-25" placeholder="Cm/s" id="reg-height-cm">
                                   </td>
                                   <td>
                                       <input type="number" class="border-radius-25" placeholder="Lb/s"  id="reg-weight-lb">
                                   </td>
                                   <td>
                                       <input type="text" class="border-radius-25" placeholder="Category"  id="reg-bmi-categ"> 
                                   </td>
                               </tr>
                           </table>
                       </div>
                       
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary border-radius-25" data-bs-dismiss="modal">Close</button>
                       <button type="button" class="btn btn-primary border-radius-25">Save changes</button>
                   </div>
               </div>
           </div>
       </div>
   
   </div>
      