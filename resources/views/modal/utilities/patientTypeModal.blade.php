  <!-- Modal -->
  <div class="modal fade" id="patientTypeModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="patientTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">    
      <div class="modal-content patient-type-modal-body" id="">
        <div class="modal-header float-left">
            <button type="button" class="close-modal closeViewFileModal btn-close" id="close-modal" name="patientTypeModal" aria-label="Close">

        </div>
        <div class="modal-body  ">
            <div class="row text-center w-100">
                {{-- <i class="fa-solid fa-circle-info text-center info-register"></i> --}}
                <img class="reg-info-icon" src="{{asset('img/utilities-images/icons8-box-important.gif')}}" alt="" id="">
                
                <span class="mt-3"><h3><i>{{__("Select Type of Patient")}}</i></h3></span>

            </div>
            <div class="d-flex justify-content-between mt-3">
                <button class="form-control btn-primary " id="inpatient-type-reg">Inpatient</button>
                <button class="form-control btn-primary" id="outpatient-type-reg">Outpatient</button>
            </div>
        </div>
        
      </div>
    </div>
    
  </div>
  <link rel="stylesheet" href="{{ asset('css/patient-registration/patient-registration.css') }}">
