<div class="hmo-container px-3 py-2">
    <h5>Health Care Provider Details</h5>
    <div class="row hmo-row border-radius-25 p-2 shadow-sm">
        <div class="col" id="hmoDiv">
            <div class="hmoGroup" id="hmoGroup">
                <div class="row">
                    <div class="hmo-col-1">
                        <label for="">Health Care Provider <span class="text-danger">*</span></label>
                        <select name="U_HMO_HEALTHCAREPROVIDER" id="U_HMO_HEALTHCAREPROVIDER-0" class="border-radius-25 d-block">
                            <option value=""></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="hmo-col-1">
                        <label for="">if others, Specify</label>
                        <input type="text" name="U_HMO_SPECIFYOTHERS" id = "U_HMO_SPECIFYOTHERS-0" class="border-radius-25 d-block">
                    </div>
                    <div class="hmo-col-1">
                        <label for="">ID/Account No. <span class="text-danger">*</span></label>
                        <input type="number" name="U_HMO_ACCOUNTNUMBER" id = "U_ACCOUNT_NO-0" class="border-radius-25 d-block">
                    </div>
                    <div class="hmo-col-1">
                        <label for="">Client Type <span class="text-danger">*</span></label>
                        <select name="U_HMO_CLIENTTYPE" id="U_HMO_CLIENTTYPE-0" class="border-radius-25 d-block">
                            <option value=""></option>
                            <option value="C1">C1</option>
                            <option value="C2">C2</option>
                        </select>
                    </div>
                    <div class="hmo-col-1">
                        <label for="">Member Type <span class="text-danger">*</span></label>
                        <select name="U_HMO_MEMBERTYPE" id="U_HMO_MEMBERTYPE-0" class="border-radius-25 d-block">
                            <option value="">--Select--</option>
                            <option value="qwq">qwq</option>
                            <option value="dfd">fdf</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="hmo-col-1">
                        <label for="">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="U_HMO_LASTNAME" id = "U_HMO_LASTNAME-0" class="border-radius-25 d-block">
                    </div>
                    <div class="hmo-col-1">
                        <label for="">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="U_HMO_FIRSTNAME" id = "U_HMO_FIRSTNAME-0" class="border-radius-25 d-block">
                    </div>
                    <div class="hmo-col-1">
                        <label for="">Middle Name <span class="text-danger">*</span></label>
                        <input type="text" name="U_HMO_MIDDLENAME" id = "U_HMO_MIDDLENAME-0" class="border-radius-25 d-block">
                    </div>
                    <div class="hmo-col-2">
                        <label for="">Ext</label>
                        <input type="text" name="U_HMO_EXTNAME" id = "U_HMO_EXTNAME-0" class="border-radius-25 d-block">
                    </div>
                    <div class="hmo-col-2">
                        <label for="">Sex <span class="text-danger">*</span></label>
                        <select name="U_HMO_SEX" id="U_HMO_SEX-0" class="border-radius-25 d-block">
                            <option value=""></option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                    <div class="hmo-col-1">
                        <label for="">Birthdate <span class="text-danger">*</span></label>
                        <input type="text" name="U_HMO_BIRTHDATE" id = "U_HMO-BIRTHDAY-0" class="border-radius-25 d-block">
                    </div>
                </div>
            </div>
            <div class="add-hmo-group">

            </div>
        </div>

    </div>
    <div class="row add-hmo-btn text-center">
        <div class="col align-self-center">
            <button type="button" class="btn addMoreHMOInfo shadow-sm">Add More +</button>
        </div>
    </div>
    <div class="row pt-2 ">
        <div class="col text-end">
            <button type="button" class="btn btn-primary border-radius-25">Save</button>
        </div>
    </div>
</div>