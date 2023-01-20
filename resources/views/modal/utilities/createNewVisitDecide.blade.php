  <!-- Modal -->
  <div class="modal fade" id="createNewVisitDecide" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="createNewVisitDecideLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">    
      <div class="modal-content patient-type-modal-body" id="">
        <div class="modal-header float-left">
            <button type="button" class="close-modal btn-close redirect-on-close" id="close-modal" name="createNewVisitDecide" aria-label="Close">

        </div>
        <div class="modal-body  ">
            <div class="row text-center w-100">
                {{-- <i class="fa-solid fa-circle-info text-center info-register"></i> --}}
                <img class="reg-info-icon" src="{{asset('img/utilities-images/icons8-box-important.gif')}}" alt="" id="">
                
                <span class="mt-3"><h3><i>{{__("Do You Want to Create Visit")}}</i></h3></span>

            </div>
            <div class="d-flex justify-content-between mt-3">
                <button class="form-control btn-primary " id="create-visit-reg">Yes, Create Visit</button>
                <button class="form-control btn-primary" id="no-visit-reg">No, Just Register</button>
            </div>
        </div>
        
      </div>
    </div>
    
  </div>
  <link rel="stylesheet" href="{{ asset('css/patient-registration/patient-registration.css') }}">
