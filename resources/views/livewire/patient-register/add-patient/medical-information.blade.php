<div>
    @include('modal.patient-register.add-patient.medical-body-mass')
    @include('modal.patient-register.add-patient.medical-procedure-history')
    @include('modal.patient-register.add-patient.medical-condition-modal')
    @include('modal.patient-register.add-patient.family-health-modal')
    <form action="" method="">
        <div class="mi-container px-0 py-2">
            <div class="">
                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row mx-5">
                                {{-- Start of body mass index and medical procedure history --}}
                                <div class="col d-inline ">
                                    <div class="row px-1">
                                        <div class="col-9 px-1">
                                            <h5>Body Mass Index</h5>
                                        </div>
                                        <div class="col-3 px-1 text-end">
                                            <button type="button" class="border-radius-25 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPatientBodyMass">
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row px-1 py-1 ">
                                        <div class="medical-div border-radius-25 px-3 overflow-auto" id="custom-scroll">
                                            <table class="table table-striped border-radius-25">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Height</th>
                                                        <th>Weight</th>
                                                        <th>Category</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
            
                                <div class="col d-inline">
                                    <div class="row px-1">
                                        <div class="col px-1">
                                            <h5>Medical Condition</h5>
                                        </div>
                                        <div class="col px-1 text-end">
                                            <button type="button" class="border-radius-25 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPatientMedicalConditionModal">
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row px-1 py-1">
                                        <div class="medical-div border-radius-25 px-3 overflow-auto" id="custom-scroll">
                                            <table class="table table-striped border-radius-25">
                                                <thead>
                                                    <tr>
                                                        <th>Date Added</th>
                                                        <th>Code</th>
                                                        <th>Group</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
                                {{-- End of body mass index and medical procedure history --}}
                            </div>
                            <div class="row">
                                <div class="col text-end mx-5">
                                    <button type="button" id="" class="border-radius-25 btn btn-primary">Save</button>
                                </div>
                                
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row mx-5">
                                {{-- Start of body mass index and medical procedure history --}}
                                <div class="col d-inline ">
                                    <div class="row px-1">
                                        <div class="col px-1">
                                            <h5>Family Health History</h5>
                                        </div>
                                        <div class="col px-1 text-end">
                                            <button type="button" class="border-radius-25 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPatientFamilyHealthModal">
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row px-1 py-1 ">
                                        <div class="medical-div border-radius-25 px-3 overflow-auto" id="custom-scroll">
                                            <table class="table table-striped border-radius-25">
                                                <thead>
                                                    <tr>
                                                        <th>Date Added</th>
                                                        <th>Code</th>
                                                        <th>Description</th>
                                                        <th>Relationship</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
            
                                <div class="col d-inline">
                                    <div class="row px-1">
                                        <div class="col px-1">
                                            <h5>Medical Procedure History</h5>
                                        </div>
                                        <div class="col px-1 text-end">
                                            <button type="button" class="border-radius-25 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPatientProcedureHistoryModal">
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row px-1 py-1">
                                        <div class="medical-div border-radius-25 px-3 overflow-auto" id="custom-scroll">
                                            <table class="table table-striped border-radius-25">
                                                <thead>
                                                    <tr>
                                                        <th>Date Added</th>
                                                        <th>Code</th>
                                                        <th>Description</th>
                                                        <th>Date Accomplished</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
                                {{-- End of body mass index and medical procedure history --}}
                            </div>
                            <div class="row">
                                <div class="col text-end mx-5">
                                    <button type="button" id="" class="border-radius-25 btn btn-primary">Save</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <button class="medical-button-cust carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                        data-bs-slide="prev">
                        <span aria-hidden="true"><i class="fa-solid fa-caret-left"></i></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="medical-button-cust carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                        data-bs-slide="next">
                       
                        <span aria-hidden="true"><i class="fa-solid fa-caret-right"></i></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
