let validateHMO = {
    U_HMO_HEALTHCAREPROVIDER: "", 
    U_HMO_ACCOUNTNUMBER: "",
    U_HMO_CLIENTTYPE: "",
    U_HMO_MEMBERTYPE: "",
    U_HMO_LASTNAME: "",
    U_HMO_FIRSTNAME: "",
    U_HMO_MIDDLENAME: "",
    U_HMO_EXTNAME: "",
    U_HMO_SEX: "",
    U_HMO_BIRTHDATE: "",
};

const hmoinfoexcept = [
    "U_HMO_SPECIFYOTHERS"
];


var idcount = 0;


function checkIfFieldEmpty(){
    let count = 0;

    Object.entries(validateHMO).forEach(([key, value]) => {
        validateHMO[key] = $(`.hmoGroup :input[name="${key}"]`).val();
        if (validateHMO[key] != "") {
            count++;
            // console.log(count);
        }

    }); 

    if (count == 10) {
      
        $(".addMoreHMOInfo").attr("disabled", false)

    } else {
        $(".addMoreHMOInfo").attr("disabled", true)
    }
}

function hmocheckIfDynamicFieldisEmpty(){

    // Change the value of the current object properties
    // from the first div.
    let count = 0;
    
    Object.entries(validateHMO).forEach(([key, value]) => {
        validateHMO[key] = $(`#hmoGroup-${idcount} :input[name="${key}"]`).val();
        if (validateHMO[key] != "") {
            count++;
            // console.log(count);
        }
        // console.log(validateHMO);
        // console.log($(`:input[name="${key}"]`).val());

    }); 

    if (count == 10) {
      
        $(".addMoreHMOInfo").attr("disabled", false)

    } else {
        $(".addMoreHMOInfo").attr("disabled", true)
    }
}

$(document).on("click", "#nav-hmo-info-tab", function(e){

    $(".addMoreHMOInfo").attr("disabled", true)

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                "content"
            ),
        },
    });
    let hmoInputsValidate = [];
    let hmoInputsValidateName = [];
    let hmoInputsValidateID = [];

    hmoInputsValidate = $("#hmoDiv :input");
    console.log(hmoInputsValidate);
    let temp_index = 0;
    let temp_i = 0;
    for (let i = 0; i < hmoInputsValidate.length; i++) {
        hmoInputsValidateName[i] = $(hmoInputsValidate[i]).attr("name");
        temp_i = temp_index;
        if (!hmoinfoexcept.includes(hmoInputsValidateName[i])) {
            hmoInputsValidateID[temp_i] = $(hmoInputsValidate[i]).attr("id");
            temp_index++;
        } else {
            temp_index = temp_i;
        }
    }
    for (let i = 0; i < hmoInputsValidateID.length; i++) {
        // checkIfFieldisEmpty($(`#${hmoInputsValidateID[i]}`).attr('name'), $(`#${hmoInputsValidateID[i]}`).val());
        $(document).on("change", `#${hmoInputsValidateID[i]}`, function () {
            // console.log("empty");
            checkIfFieldEmpty($(`#${hmoInputsValidateID[i]}`).attr('name'), $(`#${hmoInputsValidateID[i]}`).val());
        });
    }

});




$(document).on('click', '.addMoreHMOInfo', function (e) {
    try {

        $(".addMoreHMOInfo").attr("disabled", true)

        var healthprovidervalues = [];
        var typeclientvalues = [];
        let typemembervalues = [];
        let typesexvalues = [];
        healthprovider = $("#U_HMO_HEALTHCAREPROVIDER-0 option");
        typeclient = $("#U_HMO_CLIENTTYPE-0 option");
        typemember = $("#U_HMO_MEMBERTYPE-0 option");
        typesex = $("#U_HMO_SEX-0 option");

        for (let i = 0; i < healthprovider.length; i++) {
            if (!(healthprovidervalues.includes($(healthprovider[i]).val()))) {
                healthprovidervalues[i] = $(healthprovider[i]).val();
            }
        }
        // console.log(healthprovidervalues);
        for (let i = 0; i < typeclient.length; i++) {
            if (!(typeclientvalues.includes($(typeclient[i]).val()))) {
                typeclientvalues[i] = $(typeclient[i]).val();
            }
        }
        // console.log(typeclientvalues);
        for (let i = 0; i < typemember.length; i++) {
            if (!(typemembervalues.includes($(typemember[i]).val()))) {
                typemembervalues[i] = $(typemember[i]).val();
            }
        }
        // console.log(typemembervalues);
        for (let i = 0; i < typemember.length; i++) {
            if (!(typesexvalues.includes($(typesex[i]).val()))) {
                typesexvalues[i] = $(typesex[i]).val();
            }
        }
        // console.log(typesexvalues);

        if (healthprovidervalues[0] == "") {
            delete healthprovidervalues[0];
        }
        if (typeclientvalues[0] == "") {
            delete typeclientvalues[0];
        }
        if (typemembervalues[0] == "") {
            delete typemembervalues[0];
        }
        if (typesexvalues[0] == "") {
            delete typesexvalues[0];
        }

        idcount = $('.hmoGroup').length;
        console.log(idcount);
        
        newRowAdd = `<div class="hmoGroup" id="hmoGroup-${idcount}">
        <hr>
        <div class="row">
        <div class="col">
        <div class="float-end">
        <i class="closeHMO text-danger fa-solid fa-x" id="closeHMO-${idcount}"></i>
        </div>
        </div>
        </div>
        <div class="row">
            <div class="hmo-col-1">
                <label for="">Health Care Provider <span class="text-danger">*</span></label>
                <select name="U_HMO_HEALTHCAREPROVIDER" id="U_HMO_HEALTHCAREPROVIDER-${idcount}" class="border-radius-25 d-block">
                    <option value=""></option>
                    ${healthprovidervalues.map((v) => (
                        `<option value="${v}">${v}</option>`
                    ))}
                </select>
            </div>
            <div class="hmo-col-1">
                <label for="">if others, Specify</label>
                <input type="text" name="U_HMO_SPECIFYOTHERS" id = "U_HMO_SPECIFYOTHERS-${idcount}" class="border-radius-25 d-block">
            </div>
            <div class="hmo-col-1">
                <label for="">ID/Account No. <span class="text-danger">*</span></label>
                <input type="number" name="U_HMO_ACCOUNTNUMBER" id = "U_ACCOUNT_NO-${idcount}" class="border-radius-25 d-block">
            </div>
            <div class="hmo-col-1">
                <label for="">Client Type <span class="text-danger">*</span></label>
                <select name="U_HMO_CLIENTTYPE" id="U_HMO_CLIENTTYPE-${idcount}" class="border-radius-25 d-block">
                    <option value=""></option>
                    ${typeclientvalues.map((v) => (
                        `<option value="${v}">${v}</option>`
                    ))}
                </select>
            </div>
            <div class="hmo-col-1">
                <label for="">Member Type <span class="text-danger">*</span></label>
                <select name="U_HMO_MEMBERTYPE" id="U_HMO_MEMBERTYPE-${idcount}" class="border-radius-25 d-block">
                    <option value=""></option>
                    ${typemembervalues.map((v) => (
                        `<option value="${v}">${v}</option>`
                    ))}
                </select>
            </div>
        </div>
        <div class="row">
            <div class="hmo-col-1">
                <label for="">Last Name <span class="text-danger">*</span></label>
                <input type="text" name="U_HMO_LASTNAME" id = "U_HMO_LASTNAME-${idcount}" class="border-radius-25 d-block">
            </div>
            <div class="hmo-col-1">
                <label for="">First Name <span class="text-danger">*</span></label>
                <input type="text" name="U_HMO_FIRSTNAME" id = "U_HMO_FIRSTNAME-${idcount}" class="border-radius-25 d-block">
            </div>
            <div class="hmo-col-1">
                <label for="">Middle Name <span class="text-danger">*</span></label>
                <input type="text" name="U_HMO_MIDDLENAME" id = "U_HMO_MIDDLENAME-${idcount}" class="border-radius-25 d-block">
            </div>
            <div class="hmo-col-2">
                <label for="">Ext</label>
                <input type="text" name="U_HMO_EXTNAME" id = "U_HMO_EXTNAME-${idcount}" class="border-radius-25 d-block">
            </div>
            <div class="hmo-col-2">
                <label for="">Sex <span class="text-danger">*</span></label>
                <select name="U_HMO_SEX" id="U_HMO_SEX-${idcount}" class="border-radius-25 d-block">
                    <option value=""></option>
                    ${typesexvalues.map((v) => (
                        `<option value="${v}">${v}</option>`
                    ))}
                </select>
            </div>
            <div class="hmo-col-1">
                <label for="">Birthdate <span class="text-danger">*</span></label>
                <input type="text" name="U_HMO_BIRTHDATE" id = "U_HMO-BIRTHDAY-${idcount}" class="border-radius-25 d-block">
            </div>
        </div>
    </div>`;

        $('.add-hmo-group').append(newRowAdd);
        // countries = $(".country-background-reg-");

        let hmoInputsValidate = [];
        let hmoInputsValidateName = [];
        let hmoInputsValidateID = [];
    
        hmoInputsValidate = $(".add-hmo-group :input");
        console.log(hmoInputsValidate);
        let temp_index = 0;
        let temp_i = 0;
        for (let i = 0; i < hmoInputsValidate.length; i++) {
            hmoInputsValidateName[i] = $(hmoInputsValidate[i]).attr("name");
            temp_i = temp_index;
            if (!hmoinfoexcept.includes(hmoInputsValidateName[i])) {
                hmoInputsValidateID[temp_i] = $(hmoInputsValidate[i]).attr("id");
                temp_index++;
            } else {
                temp_index = temp_i;
            }
        }
        for (let i = 0; i < hmoInputsValidateID.length; i++) {
            // checkIfFieldisEmpty($(`#${hmoInputsValidateID[i]}`).attr('name'), $(`#${hmoInputsValidateID[i]}`).val());
            $(document).on("change", `#${hmoInputsValidateID[i]}`, function () {
                // console.log("empty");
                hmocheckIfDynamicFieldisEmpty($(`#${hmoInputsValidateID[i]}`).attr('name'), $(`#${hmoInputsValidateID[i]}`).val());
            });
        }
        // console.log(hmoInputsValidateName);
        console.log(hmoInputsValidateID);

        // console.log(countries);
        let closeDiv = [];
        closeDiv = $(".closeHMO");
        // closeDiv
        let closeDivID = [];
        let bgDiv = [];
        
        bgDiv = $(".add-hmo-group .hmoGroup");
        for (let i = 0; i < bgDiv.length; i++) {
            closeDivID[i] = $(closeDiv[i]).attr("id");
            if (i != (bgDiv.length - 1)) {
                console.log(closeDivID[i]);
                $(`#${closeDivID[i]}`).prop('hidden', true);
            }
            $(document).on('click', `#${closeDivID[i]}`, function () {
                $(bgDiv[i]).remove();
                $(`#${closeDivID[i - 1]}`).prop('hidden', false);
            });

        }

    } catch (error) {
        console.log(error);
    }

});