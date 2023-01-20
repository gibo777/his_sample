<!-- Modal -->
<div class="modal fade" id="patientRegisterAllergiesModal" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1"
    aria-labelledby="patientRegisterAllergiesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="patientRegisterAllergiesModalLabel">Allergies</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body allergies-modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <label for="">Allergies To</label>
                            <input type="text" class="border-radius-25" name="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Description</label>
                            <input type="text" class="border-radius-25" name="">
                        </div>
                    </div>
                    <div class="row pt-1">
                        <h6>Allergy List</h6>
                    </div>
                    <div class="row table-row">
                        <div class="col table-col overflow-auto" id="custom-scroll">
                            <table class="table">
                                <thead class="text-center position-sticky top-0">
                                    <tr>
                                        <th>#</th>
                                        <th>Allergy To</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>.</td>
                                        <td>.</td>
                                        <td>.</td>
                                    </tr>
                                    <tr>
                                        <td>.</td>
                                        <td>.</td>
                                        <td>.</td>
                                    </tr>
                                    <tr>
                                        <td>.</td>
                                        <td>.</td>
                                        <td>.</td>
                                    </tr>
                                    <tr>
                                        <td>.</td>
                                        <td>.</td>
                                        <td>.</td>
                                    </tr>
                                    <tr>
                                        <td>.</td>
                                        <td>.</td>
                                        <td>.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row py-1 justify-content-center">
                        <div class="col-8">
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-danger border-radius-25 w-100">Remove</button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-primary border-radius-25 w-100">Add</button>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col">
                                    <button type="button" class="btn btn-primary border-radius-25 w-100">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
