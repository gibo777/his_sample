<!-- Modal -->
<div>
    <div class="modal fade" id="outpatientCaseInformationModal" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1" aria-labelledby="outpatientCaseInformationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered overflow-auto">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="outpatientCaseInformationModalLabel"><span class="">{{session('viewingType')}}</span> Case Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body case-information-modal-body overflow-auto">
                    <div class="container">
                        <div class="row text-center" id="caseInfoTopFirstInput">
                            <div class="col">
                                <label for=""><b>Case ID</b></label>
                                <input type="text" class="border-radius-25" name="" id="caseInformationId" readonly>
                            </div>
                            <div class="col">
                                <label for=""><b>Admit Date/Time</b></label>
                                <input type="text" class="border-radius-25" name="" id="caseInformationAdmit" readonly>
                            </div>
                            <div class="col">
                                <label for=""><b>Arrived By</b></label>
                                <input type="text" class="border-radius-25" name="" id="caseInformationArrived" readonly>
                            </div>
                            <div class="col">
                                <label for=""><b>Assigned Personnel</b></label>
                                <input type="text" class="border-radius-25" name="" id="caseInformationAssignedPersonnel" readonly>
                            </div>
                            <div class="col">
                                <label for=""><b>Room</b></label>
                                <input type="text" class="border-radius-25" name="" id="caseInformationRoom" readonly>
                            </div>
                            <div class="col">
                                <label for=""><b>Service Type</b></label>
                                <input type="text" class="border-radius-25" name="" id="caseInformationService" readonly>
                            </div>
                        </div>
                        <div class="row text-center" id="caseInfoTopSecondInput" hidden>
                            <div class="col">
                                <label for=""><b>Case ID</b></label>
                                <input type="text" class="border-radius-25" name="" id="caseInformationId2" readonly>
                            </div>
                            <div class="col">
                                <label for=""><b>Discharge Date/Time</b></label>
                                <input type="text" class="border-radius-25" name="" id="caseInformationDischarge" readonly>
                            </div>
                            <div class="col">
                                <label for=""><b>Arrived By</b></label>
                                <input type="text" class="border-radius-25" name="" id="caseInformationArrived2" readonly>
                            </div>
                            <div class="col">
                                <label for=""><b>Assigned Personnel</b></label>
                                <input type="text" class="border-radius-25" name="" id="caseInformationAssignedPersonnel" readonly>
                            </div>
                            <div class="col">
                                <label for=""><b>Room</b></label>
                                <input type="text" class="border-radius-25" name="" id="caseInformationRoom2" readonly>
                            </div>
                            <div class="col">
                                <label for=""><b>Disposition</b></label>
                                <input type="text" class="border-radius-25" name="" id="caseInformationDisposition" readonly>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-8 col" id="textareaAndCaseOrderDiv">
                                <div class="row text-center">
                                    <div class="col-3 align-self-center">
                                        <label for="" class="d-inline"><b>Chief Complaint</b></label>
                                    </div>
                                    <div class="col">
                                        <textarea name="" id="caseInformationComplaint" class="d-inline border-radius-25" readonly></textarea>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-3 align-self-center">
                                        <label for="" class="d-inline"><b>Initial Diagnosis</b></label>
                                    </div>
                                    <div class="col">
                                        <textarea name="" id="caseInformationInitial" class="border-radius-25" readonly></textarea>
                                    </div>
                                </div>
                                <div class="row p-2 text-center">
                                    <h6>Case Order</h6>
                                    <div class="case-order-div overflow-auto border-radius-25" id="custom-scroll">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date/Time Request</th>
                                                    <th>Category</th>
                                                    <th>ID</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Request By</th>
                                                    <th>Date/Time Rendered</th>
                                                </tr>
                                            </thead>
                                            <tbody id="caseOrdersTable">
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 col" id="finalDiagnosisAndICDDiv" hidden>
                                <div class="row text-center">
                                    <div class="col">
                                        <label for="" class="d-inline"><b>Final Diagnosis</b></label>
                                        <textarea name="" id="caseInformationFinal" class="d-inline border-radius-25" readonly></textarea>
                                    </div>
                                </div>
                                <div class="row pt-2 px-2 text-center">
                                    <h6>ICD</h6>
                                    <div class="icd-div overflow-auto border-radius-25" id="custom-scroll">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th>User</th>
                                                    <th>Date/Time</th>
                                                </tr>
                                            </thead>
                                            <tbody id="icdsTable">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row pt-2 px-2 text-center">
                                    <h6>RVS</h6>
                                    <div class="icd-div overflow-auto border-radius-25" id="custom-scroll">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th>User</th>
                                                    <th>Date/Time</th>
                                                </tr>
                                            </thead>
                                            <tbody id="icdsTable">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col">
                                <div class="row p-2 text-center" id="caseInfoVitalSign">
                                    <h6>Vital Signs</h6>
                                    <div class="vital-signs-div border-radius-25 p-2 overflow-auto" id="custom-scroll">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Date/Time</th>
                                                    <th>Temp</th>
                                                    <th>BP</th>
                                                    <th>HR</th>
                                                    <th>RR</th>
                                                    <th>OS</th>
                                                </tr>
                                            </thead>
                                            <tbody id="vitalSignsTable">
                                               
                                       
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row p-2 text-center" id="CasInfoMayGoHomeId" hidden>
                                    <h6>May Go Home Checklist</h6>
                                    <div class="vital-signs-div border-radius-25 p-2 overflow-auto" id="custom-scroll">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Department</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-start">
                                                <tr>
                                                    <td>Emergency Room</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Radiology</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Laboratory</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Pharmacy</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Nurse Station</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Central Supplies</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Ultrasound</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>CT-Scan</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Emergency Room</td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <button type="button" class="btn btn-danger border-radius-25" id="caseInfoDischargeBtn">Discharge Page ></button>
                                    <button type="button" class="btn btn-success border-radius-25" id="caseInfoAdmissionBtn" hidden>< Admission Page</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      