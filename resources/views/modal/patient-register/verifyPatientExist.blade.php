  <!-- Modal -->
  <div class="modal fade" id="verifyPatientExist" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="verifyPatientExistLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">    
      <div class="modal-content" id="">
        <div class="modal-header float-left">
            <button type="button" class="close-modal closeViewFileModal btn-close" id="closeFileModal" name="verifyPatientExist" aria-label="Close">
        </div>
        <div class="modal-body ">
            <div class="row justify-content-between">
                <div class="h-100 col-sm-3 my-auto">
                
                        <i class="fa-solid fa-caret-left arrow-exist-modal" id="arrow-left-exist"></i>
                    
                
                </div>

                <div class="col-lg">
                    <div class="row">
                        <h3>{{__("Did You Mean?")}}</h3>
                    </div>
                    <div class="row img-div justify-center">
                        <img id="img" src="{{ URL::asset('img/profiles/profile-2.jpg') }}" alt=""
                            class="rounded border border-success mx-auto"  height="150" width="150" capture>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-3">
                                    <span>{{__("MRN:")}}</span>
                                </div>
                                <div class="col">
                                    <span class="CODE-exist text-right"></span>
                                </div> 
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col"> 
                            <div class="row">
                                <div class="col-sm-3">
                                    <span>{{__("Name:")}}</span>
                                </div>
                                <div class="col w-75">
                                    <span class="NAME-exist text-right"></span>
                                </div> 
                            </div>
                            
                        </div>
                        <div class="w-100"></div>
                        <div class="col"> 
                            <div class="row">
                                <div class="col">
                                    <span>{{__("Birthdate:")}}</span>
                                </div>
                                <div class="col">
                                    <span class="U_BIRTHDATE-exist text-right"></span>
                                </div> 
                            </div>
                            
                        </div>    
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn-secondary w-50" id="override-exist">No, Override</button>
                        <button class="btn-primary w-50" id="open-exist">Open Record</button>
                    </div>
                    


                </div>

                <div class="h-100 col-sm-3 my-auto">
                    <i class="fa-solid fa-caret-right text-right arrow-exist-modal" id="arrow-right-exist"></i>    
                </div>
            
            
            </div>


          
                {{-- <img src="" class="img-file" id="imgs" alt="" />
           
                <embed height="400" id="files" class="img-file w-100" allowfullscreen src=""/> --}}
        
        </div>
        
      </div>
    </div>
  </div>
