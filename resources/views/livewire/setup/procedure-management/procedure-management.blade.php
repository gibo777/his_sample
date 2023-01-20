<div class="procedure-management-div">
    <div class="container p-3 border-radius-25">
        <div class="row">
            <div class="col">
                <h5>Procedure Listing</h5>
            </div>
        </div>
        <div class="row py-1">
            <div class="col">
                <input type="text" class="border-radius-25" name="" id="">
            </div>
            <div class="col">
                <button type="button" id="procedureManagement" class="border-radius-25 btn btn-primary">Add Procedure</button>
            </div>
            <div class="col text-end">
                <label for="">Show</label>&nbsp;
                <select class="border-radius-25" name="" id="">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="row procedure-table-row">
            <div class="col procedure-table-col overflow-auto" id="custom-scroll">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th>
                                Item Code
                            </th>
                            <th>
                                Group
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                SOA Category
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-start">
                        <tr ondblclick="procedureDetail()">
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
                        </tr>
                        <tr>
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
                        </tr>
                        <tr>
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
                        </tr>
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
@include('modal.setup.procedure-management.procedure-management-modal')
@include('modal.setup.procedure-management.procedure-details-modal')
@include('modal.setup.procedure-management.confirm-modal')