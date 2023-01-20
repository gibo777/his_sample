<div>
    <div id="getViewRestriction" content="{{session('viewingType')}}" hidden></div>
    <div action="" method="" id="newCaseForm" rights="{{$authPage}}">
        <div class="nc-container px-3 py-2">
            <div class="row first-row pb-2">
                <span hidden><input id="docId" name="DOCID" value="{{$case ? $case->DOCID :''}}"/></span>
                <div class="col text-center px-1">
                    <label for="">Case ID :</label>
                    <input type="text" class="d-block border-radius-25" id="caseId" name="DOCNO" value="{{$case ? $case->DOCNO : ''}}" readonly>
                </div>
                <div class="col text-center px-1">
                    <label for="">Admited Date/Time :</label>
                    <input type="text" class="d-block border-radius-25" id="admitDate" name="DATECREATED" value="{{$case ? $case->DATECREATED : ''}}">
                </div>
                <div class="col text-center px-1">
                    <label for="">Arrived By :</label>
                    <select class="border-radius-25 p-input-size-1 d-block" name="U_ARRIVEDBY" id="arrivedBy">
                        @if($case)
                            <option value="{{$case->U_ARRIVEDBY ? $case->U_ARRIVEDBY : ''}}">{{$case->U_ARRIVEDBY ? $case->U_ARRIVEDBY : '-Select Option-'}}</option>
                        @else
                            <option value="">-Select Option-</option>
                        @endif
                      
                        @foreach($arrivedBy as $arrived)
                            <option value="{{$arrived->description}}">{{$arrived->description}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col text-center px-1">
                    <label for="">Assigned Personnel :</label>
                    <select name="{{$table =='u_hisops' ? 'U_ASSISTEDBY' : 'U_ADMITTEDBY'}}" id="assignedPersonnel" class="border-radius-25">
                        <option value="{{$case ? ($table =='u_hisops' ? $case->U_ASSISTEDBY : $case->U_ADMITTEDBY) : ''}}">{{($case && ($table =='u_hisops' ? $case->U_ASSISTEDBY : $case->U_ADMITTEDBY) )? ($table =='u_hisops' ? $case->U_ASSISTEDBY : $case->U_ADMITTEDBY) : '-Select Option-'}}</option>
                        @foreach($handlers as $handler)
                            @if($handler->user_name != ($case ? ($table =='u_hisops' ? $case->U_ASSISTEDBY : $case->U_ADMITTEDBY) :''))
                                <option value="{{$handler->user_name}}">{{$handler->user_name}}</option>
                            @endif
                        @endforeach
                        @if($case && ($table =='u_hisops' ? $case->U_ASSISTEDBY : $case->U_ADMITTEDBY))
                            <option value="">-Select Option-</option>
                        @endif
                    </select>
                </div>
                <div class="col text-center px-1">
                    <label for="">Room :</label>
                    <input type="text" class="d-block border-radius-25" id="" name="" value="">
                </div>
                <div class="col text-center px-1" id="admitCol">
                    <label for="">Service Type</label>
                    <select name="U_DOCTORSERVICE" id="typeOfService" class="d-block border-radius-25">
                        <option value="{{$case ? $case->U_DOCTORSERVICE : ''}}">{{($case &&  $case->U_DOCTORSERVICE) ? $case->U_DOCTORSERVICE : '-Select Option-'}}</option>
                        @foreach($services as $service)
                            <option value="{{$service->NAME}}">{{$service->NAME}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col text-center px-1" id="dischargeCol" hidden>
                    <label for="">Disposition</label>
                    <select name="" id="" class="d-block border-radius-25">
                        <option value="">-Select Option-</option>
                    </select>
                </div>
            </div>
            <div class="row second-row">
                <div class="col-md-8" id="admitDiv">
                    <div class="row px-3">
                        <div class="col-2 px-0 align-self-center">
                            <label class="fw-bold m-0">Chief Complaint</label>
                        </div>
                        <div class="col">
                            <textarea class="border-radius-25" name="NE_U_CHIEFCOMPLAINT" id="chiefComplaint" value="{{$case ? $case->NE_U_CHIEFCOMPLAINT : ''}}">{{$case ? $case->NE_U_CHIEFCOMPLAINT : ''}}</textarea>
                        </div>
                    </div>
                    <div class="row px-3">
                        <div class="col-2 px-0 align-self-center">
                            <label class="fw-bold m-0">Initial Diagnosis</label>
                        </div>
                        <div class="col">
                            <textarea class="border-radius-25" name="U_REMARKS" id="initialDiagnosis" value="{{$case ? $case->U_REMARKS : ''}}">{{$case ? $case->U_REMARKS : ''}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col text-center">
                            <h5 class="d-inline mx-2">Case Order</h5>
                            <button type="button" id="selectRequest" class="d-inline btn btn-primary border-radius-25">Add</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row request-div border-radius-25 px-2 pt-2 mx-1 overflow-auto"  id="custom-scroll">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date/Time Requested</th>
                                        <th>Category</th>
                                        <th>ID</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Request By</th>
                                        <th>Date/Time Rendered</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Dec 1, 2022</td>
                                        <td>Medicine</td>
                                        <td>Paracetamol</td>
                                        <td>500 mg x 30 pcs</td>
                                        <td>Active</td>
                                        <td>Ricofredte_J</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dec 1, 2022</td>
                                        <td>Medicine</td>
                                        <td>Paracetamol</td>
                                        <td>500 mg x 30 pcs</td>
                                        <td>Active</td>
                                        <td>Ricofredte_J</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dec 1, 2022</td>
                                        <td>Medicine</td>
                                        <td>Paracetamol</td>
                                        <td>500 mg x 30 pcs</td>
                                        <td>Active</td>
                                        <td>Ricofredte_J</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dec 1, 2022</td>
                                        <td>Medicine</td>
                                        <td>Paracetamol</td>
                                        <td>500 mg x 30 pcs</td>
                                        <td>Active</td>
                                        <td>Ricofredte_J</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dec 1, 2022</td>
                                        <td>Medicine</td>
                                        <td>Paracetamol</td>
                                        <td>500 mg x 30 pcs</td>
                                        <td>Active</td>
                                        <td>Ricofredte_J</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" id="dischargeDiv" hidden>
                    <div class="row px-3 final-diagnosis-row">
                        <div class="col-2 px-0 align-self-center">
                            <label class="fw-bold m-0">Final Diagnosis</label>
                        </div>
                        <div class="col">
                            <textarea class="border-radius-25" name="" id="" value=""></textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col text-center">
                            <h5 class="d-inline mx-2">ICD/RVS</h5>
                            <button type="button" id="" class="d-inline btn btn-primary border-radius-25">Add</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row request-div border-radius-25 px-2 pt-2 mx-1 overflow-auto"  id="custom-scroll">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>User</th>
                                        <th>Date/Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>A90</td>
                                        <td>Dengue Fever</td>
                                        <td>dsadsa</td>
                                        <td>1:37 AM 11/20/2022</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>A90</td>
                                        <td>Dengue Fever</td>
                                        <td>dsadsa</td>
                                        <td>1:37 AM 11/20/2022</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>A90</td>
                                        <td>Dengue Fever</td>
                                        <td>dsadsa</td>
                                        <td>1:37 AM 11/20/2022</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>A90</td>
                                        <td>Dengue Fever</td>
                                        <td>dsadsa</td>
                                        <td>1:37 AM 11/20/2022</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>A90</td>
                                        <td>Dengue Fever</td>
                                        <td>dsadsa</td>
                                        <td>1:37 AM 11/20/2022</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 px-2">
                    <div class="row mb-2">
                        <div class="col text-center">
                            <h5 class="d-inline mx-2">Vital Signs</h5>
                            <button type="button" id="" class="d-inline btn btn-primary border-radius-25">Add</button>
                        </div>
                    </div>
                    <div class="row px-1 mx-0">
                        <div class="vital-div border-radius-25  overflow-auto" id="custom-scroll">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Date/Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>dsas</td>
                                        <td>dasd</td>
                                        <td>asda</td>
                                        <td>adsa</td>
                                        <td>asda</td>
                                        <td>ads</td>
                                    </tr>
                                    <tr>
                                        <td>dsas</td>
                                        <td>dasd</td>
                                        <td>asda</td>
                                        <td>adsa</td>
                                        <td>asda</td>
                                        <td>ads</td>
                                    </tr>
                                    <tr>
                                        <td>dsas</td>
                                        <td>dasd</td>
                                        <td>asda</td>
                                        <td>adsa</td>
                                        <td>asda</td>
                                        <td>ads</td>
                                    </tr>
                                    <tr>
                                        <td>dsas</td>
                                        <td>dasd</td>
                                        <td>asda</td>
                                        <td>adsa</td>
                                        <td>asda</td>
                                        <td>ads</td>
                                    </tr>
                                    <tr>
                                        <td>dsas</td>
                                        <td>dasd</td>
                                        <td>asda</td>
                                        <td>adsa</td>
                                        <td>asda</td>
                                        <td>ads</td>
                                    </tr>
                                    <tr>
                                        <td>dsas</td>
                                        <td>dasd</td>
                                        <td>asda</td>
                                        <td>adsa</td>
                                        <td>asda</td>
                                        <td>ads</td>
                                    </tr>
                                    <tr>
                                        <td>dsas</td>
                                        <td>dasd</td>
                                        <td>asda</td>
                                        <td>adsa</td>
                                        <td>asda</td>
                                        <td>ads</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <div class="row px-3 pt-2">
                        <div class="discard-button-group">
                            <button type="button" id="newCaseFirstSaveBtn" class="border-radius-25 btn btn-primary">{{$hasActive ? 'Update' : 'Save'}}</button>
                            <button type="button" id="dischargePageBtn" class="border-radius-25 btn btn-danger">Discharge Page ></button>
                        </div>
                        <div class="admission-button-group">
                            <button type="button" id="newCaseSecondSaveBtn" class="border-radius-25 btn btn-primary" hidden>Save</button>
                            <button type="button" id="admissionPageBtn" class="border-radius-25 btn btn-success" hidden>< Admission Page</button>
                        </div>
                    </div>
                </div> 
            </div>


            @include('modal.outpatient.new-case.select-request')
        </div>
    </div>
</div>
    