<!-- Modal -->
<div>
    <div wire:ignore.self class="modal modal-child fade" id="procedureModal" data-bs-backdrop="false"
        data-bs-keyboard="true" tabindex="-1" aria-labelledby="procedureLabel" aria-hidden="true"
        data-modal-parent="#selectRequest">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="procedureLabel">Order <span class="text-primary">Procedures</span>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body procedure-modal-div">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <h5>List of Available Procedure</h5>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col">
                                        <input class="search-input border-radius-25" type="text"
                                            class="border-radius-25" placeholder="Search">
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
                                                    <th>SOA Category</th>
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
                                                <tr>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                </tr>
                                                <tr>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                </tr>
                                                <tr>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                </tr>
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
                                        <h5>List of Ordered Procedure</h5>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col">
                                        <input class="search-input border-radius-25" type="text"
                                            class="border-radius-25" placeholder="Search">
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
                                                    <th>Start Date</th>
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
                                                <tr>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                </tr>
                                                <tr>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                </tr>
                                                <tr>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                    <td>.</td>
                                                </tr>
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
                                        <label for="">Procedure</label>
                                        <input type="text" class="border-radius-25" name="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="">Repetition</label>
                                        <input type="text" class="border-radius-25" name="">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    {{-- <div class="col div-big-input"> --}}
                                    <label for="">Procedure Details</label>
                                    <textarea name="" class="big-input border-radius-25"></textarea>
                                    {{-- <input type="text" class="big-input border-radius-25" name=""> --}}
                                    {{-- </div> --}}
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Start Date/Time</label>
                                        <input type="datetime-local" class="border-radius-25" name=""
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="">Interval</label>
                                        <input type="text" class="border-radius-25" name="">
                                    </div>
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
                                        <button type="button" class="btn btn-primary border-radius-25" id="procedureConfirmationBtn">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

