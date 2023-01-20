<!-- Modal -->
<div>
    <div class="modal fade" id="procedureDetailModal" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1" aria-labelledby="procedureDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="procedureDetailModalLabel"><span class="">Procedure</span> Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body procedure-modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label for="">Item Code</label>
                                <input type="text" class="d-block border-radius-25">
                            </div>
                            <div class="col">
                                <label for="">Item Group</label>
                                <select class="d-block border-radius-25" name="" id="">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Item Type</label>
                                <select class="d-block border-radius-25" name="" id="">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Procedure Name</label>
                                <input type="text" class="border-radius-25" name="" id="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Description</label>
                                <input type="text" class="border-radius-25" name="" id="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Sales Account</label>
                                <select class="d-block border-radius-25" name="" id="">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Result Template</label>
                                <select class="d-block border-radius-25" name="" id="">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="">SOA Category</label>
                                <select class="d-block border-radius-25" name="" id="">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="row p-2 justify-content-center">
                            <div class="col text-end">
                                <button type="button" class="w-50 border-radius-25 btn btn-danger" id="deactivateProcedureBtn">Deactivate</button>
                                <button type="button" class="w-50 border-radius-25 btn btn-success" id="activateProcedureBtn" hidden>Activate</button>
                            </div>
                            <div class="col text-start">
                                <button type="button" class="w-50 border-radius-25 btn btn-primary" id="">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      