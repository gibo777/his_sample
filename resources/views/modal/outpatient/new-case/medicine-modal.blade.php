<!-- Modal -->
<div>
    <div class="modal fade" id="medicineModal" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="medicineLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="medicineLabel">Request <span class="text-primary">Medicine</span>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body medicine-modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <h5>List of Available Medicines</h5>
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
                                                    <th>Item Name</th>
                                                    <th>Item Details</th>
                                                    <th>Department</th>
                                                    <th>Stock</th>
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
                                        <h5>List of Ordered Medicines</h5>
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
                                                    <th>Item Name</th>
                                                    <th>Item Details</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
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
                                        <label for="">Item Name</label>
                                        <input type="text" class="border-radius-25" name="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="">Quantity</label>
                                        <input type="text" class="border-radius-25" name="">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    {{-- <div class="col div-big-input"> --}}
                                        <label for="">Item Details</label>
                                        <textarea name="" class="big-input border-radius-25"></textarea>
                                        {{-- <input type="text" class="big-input border-radius-25" name=""> --}}
                                    {{-- </div> --}}
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Dispensary Date/Time</label>
                                        <input type="datetime-local" class="border-radius-25" name="">
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
                                        <button type="button" class="btn btn-primary border-radius-25" id="medicineConfirmationBtn">Save</button>
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
