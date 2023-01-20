<!-- Modal -->
<div class="modal fade" id="outpatientMedicalConditionModal" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1" aria-labelledby="outpatientMedicalConditionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="outpatientMedicalConditionModalLabel">Medical Conditions</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body medical-condition-modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <h5>List of Medical Conditions</h5>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col">
                                    <input class="search-input border-radius-25" type="text" class="border-radius-25" placeholder="Search">
                                </div>
                            </div>
                            <div class="row table-row border-radius-25 p-2">
                                <div class="col table-col p-2 border-radius-25 overflow-auto" id="custom-scroll">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Group</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <h5>Patient's list of Medical Conditions</h5>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col">
                                    <input class="search-input border-radius-25" type="text" class="border-radius-25" placeholder="Search">
                                </div>
                            </div>
                            <div class="row table-row border-radius-25 p-2">
                                <div class="col table-col p-2 border-radius-25 overflow-auto" id="custom-scroll">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Group</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Date of Diagnosis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row bottom-input-button-row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label for="">Condition Name</label>
                                    <input type="text" class="border-radius-25" name="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Date of Diagnosis</label>
                                    <input type="text" class="border-radius-25" name="">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="">Condition Details</label>
                                <textarea name="" class="big-input border-radius-25"></textarea>
                            </div>
                        </div>
                        <div class="col align-self-end pt-2">
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-danger border-radius-25">Remove</button>
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary border-radius-25">Add</button>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col">
                                    <button type="button" class="btn btn-primary border-radius-25">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
