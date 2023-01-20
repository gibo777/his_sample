let validateBG = {
    U_BG_LASTNAME: "",
    U_BG_FIRSTNAME: "",
    U_BG_RELATIONSHIP: "",
    U_BG_CONTACTNO: "",
    U_BG_COUNTRY: "",
    U_BG_PROVINCE: "",
    U_BG_CITY: "",
    U_BG_BRGY: "",
    U_BG_ZIP: "",
    U_BG_STREET: "",
};

var countryCount = 0;

const bgInfoExcept = [

    "U_BG_CONTACTNO2ND",
    "U_BG_EMERGENCY",
    "U_BG_EXTNAME",
    "U_BG_MIDDLENAME"

];


function checkIfFieldisEmpty() {
    // index = name;

    let count = 0;
    Object.entries(validateBG).forEach(([key, value]) => {

        validateBG[key] = $(`.backgroundGroup :input[name="${key}"]`).val();
        if (validateBG[key] != "") {
            count++;
        }
        // console.log(count);
        // console.log(validateBG);
        // console.log($(`:input[name="${key}"]`).val());
    });
    // console.log(count);
    // console.log(validateBG);
    // $("#addMoreBackgroundInfo").attr("disabled", false); 
    // document.getElementById("addMoreBackgroundInfo").setAttribute("disabled", false);
    // console.log($("#addMoreBackgroundInfo"));

    if (count == 10) {
        // document.getElementById("addMoreBackgroundInfo").removeAttribute("disabled");
        $(".addMoreBackgroundInfo").attr("disabled", false)

    } else {
        $(".addMoreBackgroundInfo").attr("disabled", true)
    }
    // if ()
}

// GETS THE NAME VALUE OF THE DYNAMIC INPUTS, ALSO COUNTS VALIDATED INPUTS TO PROCEED TO ADD MORE.
function bgcheckIfDynamicFieldisEmpty(){

    // Change the value of the current object properties
    // from the first div.
    let count = 0;
    
    Object.entries(validateBG).forEach(([key, value]) => {
        validateBG[key] = $(`#backgroundGroup-${countryCount} :input[name="${key}"]`).val();
        if (validateBG[key] != "") {
            count++;
            
        }
        // console.log(count);
        // console.log(validateBG);
        // console.log($(`:input[name="${key}"]`).val());

    }); 

    if (count == 10) {
      
        $(".addMoreBackgroundInfo").attr("disabled", false)

    } else {
        $(".addMoreBackgroundInfo").attr("disabled", true)
    }
}

$(document).on("click", "#nav-background-info-tab", function () {

    if ($("#restrictionViewRecord").val() != "F") {
        // console.log($("#restrictionViewRecord").val());
        // $("#patientInformationUpdateForm :input").css("pointer-events", "none");
        console.log($(".backgroundGroup :input"));
        $("#backgroundDiv :input").attr("disabled", "true");
    }

    Livewire.emit('refreshBGInfo');

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                "content"
            ),
        },
    });

    // if()
    patientCode = $("#patient-mrn").val();
    // console.log($("#patient-mrn").val());
    const postMrn = $.ajax({ url: `/saveMrn?code=${patientCode}`, method: 'POST' });


    // if (postMrn) {
    //     $(".addMoreBackgroundInfo").attr("disabled", false)

    // }
    let bgInputsValidate = [];
    let bgInputsValidateName = [];
    let bgInputsValidateID = [];

    bgInputsValidate = $("#backgroundDiv :input");
    console.log(bgInputsValidate);
    let temp_index = 0;
    let temp_i = 0;
    for (let i = 0; i < bgInputsValidate.length; i++) {
        bgInputsValidateName[i] = $(bgInputsValidate[i]).attr("name");
        temp_i = temp_index;
        if (!bgInfoExcept.includes(bgInputsValidateName[i])) {
            bgInputsValidateID[temp_i] = $(bgInputsValidate[i]).attr("id");
            temp_index++;
        } else {
            temp_index = temp_i;
        }
    }
    for (let i = 0; i < bgInputsValidateID.length; i++) {
        // checkIfFieldisEmpty($(`#${bgInputsValidateID[i]}`).attr('name'), $(`#${bgInputsValidateID[i]}`).val());
        $(document).on("change", `#${bgInputsValidateID[i]}`, function () {
            // console.log("empty");
            checkIfFieldisEmpty($(`#${bgInputsValidateID[i]}`).attr('name'), $(`#${bgInputsValidateID[i]}`).val());
        });
    }

    console.log(bgInputsValidateID);
});

$(document).on('click', '.addMoreBackgroundInfo', function (e) {
    try {

        $(".addMoreBackgroundInfo").attr("disabled", true)
        var countryValues = [];
        var provinceValues = [];
        let valuesTwo = [];
        let values = [];
        let countries = [];
        let provinces = [];
        let relations = [];
        let relationsValues = [];
        values = $("#country-background-reg-0 option");
        relations = $("#U_BG_RELATIONSHIP-0 option");
        valuesTwo = $("#province-background-reg-0 option");

        for (let i = 0; i < relations.length; i++) {
            if (!(relationsValues.includes($(relations[i]).val()))) {
                relationsValues[i] = $(relations[i]).val();
            }
        }
        // console.log(relationsValues);
        for (let i = 0; i < values.length; i++) {
            if (!(countryValues.includes($(values[i]).val()))) {
                countryValues[i] = $(values[i]).val();
            }
        }
        // console.log(countryValues);

        if (relationsValues[0] == "") {
            delete relationsValues[0];
        }

        // console.log(countryValues);
        // console.log(provinceValues);
        countryCount = $('.backgroundGroup').length;
        // console.log(contactCount);
        if (countryValues[0] == "") {
            delete countryValues[0];
        }
        if (provinceValues[0] == "") {
            delete provinceValues[0];
        }

        newRowAdd = `<div class="backgroundGroup" id="backgroundGroup-${countryCount}">
        <hr>
        <div class="row">
            
            <div class="col text-center">
                <input type="checkbox" name="U_BG_EMERGENCY" id="U_BG_EMERGENCY-${countryCount}" class="d-inline" value="0">&nbsp;
                <label for="U_BG_EMERGENCY" > Set as <span class="text-danger">Emergency</span> Contact</label>
                <div class="float-end">
                    <i class="closeBackground text-danger fa-solid fa-x" id="closeBackground-${countryCount}"></i>
                </div>
                <div class="col"hidden >
                            <input type="text" name="id_patient" id="bg-info-id-${countryCount}" >
                        </div>
            </div>
            
        </div>
        <div class="row">
            <div class="bi-col-1">
                <label for="" class="d-block">Last Name <span class="text-danger">*</span></label>
                <input type="text" name="U_BG_LASTNAME" id="U_BG_LASTNAME-${countryCount}" class="border-radius-25">
            </div>
            <div class="bi-col-1">
                <label for="" class="d-block">First Name <span class="text-danger">*</span></label>
                <input type="text" name="U_BG_FIRSTNAME" id="U_BG_FIRSTNAME-${countryCount}" class="border-radius-25">
            </div>
            <div class="bi-col-1">
                <label for="" class="d-block">Middle Name <span class="text-danger">*</span></label>
                <input type="text" name="U_BG_MIDDLENAME" id="U_BG_MIDDLENAME-${countryCount}" class="border-radius-25">
            </div>
            <div class="bi-col-2">
                <label for="" class="d-block">Ext.</label>
                <input type="text" name="U_BG_EXTNAME" id="U_BG_EXTNAME-${countryCount}" class="border-radius-25">
            </div>
            <div class="bi-col-1">
                <label for="" class="d-block">Relationship <span class="text-danger">*</span></label>
                <select name="U_BG_RELATIONSHIP" id="U_BG_RELATIONSHIP-${countryCount}" class="border-radius-25" >
                    <option value=""></option>
                    ${relationsValues.map((c) => (
            `<option value="${c}">${c}</option>`
        ))}
                </select>
            </div>
            <div class="bi-col-1">
                <label for="" class="d-block">Contact No. <span class="text-danger">*</span></label>
                <input type="text" name="U_BG_CONTACTNO" id="U_BG_CONTACTNO-${countryCount}" class="border-radius-25">
            </div>
            <div class="bi-col-1">
                <label for="" class="d-block">Second Contact No.</label>
                <input type="text" name="U_BG_CONTACTNO2ND" id="U_BG_CONTACTNO2ND-${countryCount}" class="border-radius-25">
            </div>
        </div>
        <div class="row">
            <div class="bi-col-1">
                <label for="" class="d-block">Country <span class="text-danger">*</span></label>
                <select name="U_BG_COUNTRY" id="country-background-reg-${countryCount}" class="country-background-reg- border-radius-25" >
                    <option value=""></option>
                        ${countryValues.map((c) => (
            `<option value="${c}">${c}</option>`
        ))}
                </select>
            </div>
            <div class="bi-col-1">
                <label for="" class="d-block">Province <span class="text-danger">*</span></label>
                <select name="U_BG_PROVINCE" id="province-background-reg-${countryCount}" class="border-radius-25" >
                    <option value=""></option>
                </select>
            </div>
            <div class="bi-col-1">
                <label for="" class="d-block">Municipality <span class="text-danger">*</span></label>
                <select name="U_BG_CITY" id="city-background-reg-${countryCount}" class="border-radius-25">
                    <option value=""></option>
                </select>
            </div>
            <div class="bi-col-1">
                <label for="" class="d-block">Barangay <span class="text-danger">*</span></label>
                <select name="U_BG_BRGY" id="brgy-background-reg-${countryCount}" class="border-radius-25" >
                    <option value=""></option>
                </select>
            </div>
            <div class="bi-col-3">
                <label for="" class="d-block">House No. & Street <span class="text-danger">*</span></label>
                <input type="text" name="U_BG_STREET" id="U_BG_STREET-${countryCount}" class="border-radius-25" >
            </div>
            <div class="bi-col-1">
                <label for="" class="d-block">Zip Code <span class="text-danger">*</span></label>
                <input type="text" name="U_BG_ZIP" id="zip-background-reg-${countryCount}" class="border-radius-25" readonly>
            </div>
        </div>
    </div>`;

        $('.add-bg-group').append(newRowAdd);
        // countries = $(".country-background-reg-");
        // console.log(countries);
        
        // GETS THE ID OF THE DYNAMIC INPUTS

        let dbgInputsValidate = [];
        let dbgInputsValidateName = [];
        let dbgInputsValidateID = [];
    
        dbgInputsValidate = $(".add-bg-group :input");
        console.log(dbgInputsValidate);
        let temp_index = 0;
        let temp_i = 0;
        for (let i = 0; i < dbgInputsValidate.length; i++) {
            dbgInputsValidateName[i] = $(dbgInputsValidate[i]).attr("name");
            temp_i = temp_index;
            if (!bgInfoExcept.includes(dbgInputsValidateName[i])) {
                dbgInputsValidateID[temp_i] = $(dbgInputsValidate[i]).attr("id");
                temp_index++;
            } else {
                temp_index = temp_i;
            }
        }
        console.log(dbgInputsValidateName);
        for (let i = 0; i < dbgInputsValidateID.length; i++) {
            // checkIfFieldisEmpty($(`#${bgInputsValidateID[i]}`).attr('name'), $(`#${bgInputsValidateID[i]}`).val());
            $(document).on("change", `#${dbgInputsValidateID[i]}`, function () {
                // console.log("empty");
                bgcheckIfDynamicFieldisEmpty($(`#${dbgInputsValidateID[i]}`).attr('name'), $(`#${dbgInputsValidateID[i]}`).val());
            });
        }
        console.log(dbgInputsValidateID);



        let closeDiv = [];
        closeDiv = $(".closeBackground");
        // closeDiv
        let closeDivID = [];
        let bgDiv = [];
        bgDiv = $(".add-bg-group .backgroundGroup");
        // console.log(closeDiv);
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

        let setEmegencyInput = [];
        let getEmergencyChecked = [];
        setEmegencyInput = $("#backgroundDiv input[name='U_BG_EMERGENCY']");

        let getEmergencyID = [];
        let filteredEM = [];

        for (let i = 0; i < setEmegencyInput.length; i++) {
            getEmergencyID[i] = $(setEmegencyInput[i]).attr("id");
            $(document).on("change", `#${getEmergencyID[i]}`, function () {
                getEmergencyChecked[i] = $(setEmegencyInput[i]).prop("checked");
                filteredEM = getEmergencyID.filter(function (x) {
                    return x !== getEmergencyID[i]
                })
                for (let j = 0; j < filteredEM.length; j++) {
                    $(`#${filteredEM[j]}`).prop("checked", false);
                }
            });
        }


        // declare array variable that will store the inputs -KLA 01042023
        let countriesSelect = [];
        let provincesSelect = [];
        let citySelect = [];
        let brgySelect = [];
        let zipInput = [];

        // declare variable for storing of each id of all inputs - KLA 01042023
        let citySelectBGID = [];
        let countrySelectBGID = [];
        let provinceSelectBGID = [];
        let brgySelectBGID = [];
        let zipInputBGID = [];


        // find each additional fields added to add-bg-group by name
        countriesSelect = $(".add-bg-group select[name='U_BG_COUNTRY']");
        provincesSelect = $(".add-bg-group select[name='U_BG_PROVINCE']");
        citySelect = $(".add-bg-group select[name='U_BG_CITY']");
        brgySelect = $(".add-bg-group select[name='U_BG_BRGY']");
        zipInput = $(".add-bg-group input[name='U_BG_ZIP']");
        // console.log(zipInput);


        // FIND ALL INPUTS UNDER EACH COUNTRY ADDITION -KLA 01042023
        for (let i = 0; i < countriesSelect.length; i++) {
            countrySelectBGID[i] = $(countriesSelect[i]).attr("id");
            provinceSelectBGID[i] = $(provincesSelect[i]).attr("id");
            citySelectBGID[i] = $(citySelect[i]).attr("id");
            brgySelectBGID[i] = $(brgySelect[i]).attr("id");
            zipInputBGID[i] = $(zipInput[i]).attr("id");


            //ADD CHANGE EVENT ON ADDITIONAL BACKGROUND COUNTRY - KLA 01042023
            $(document).on("change", `#${countrySelectBGID[i]}`, function () {
                // console.log("asd");
                let childAddress = [
                    `${provinceSelectBGID[i]}`,
                    `${citySelectBGID[i]}`,
                    `${brgySelectBGID[i]}`,
                    `${zipInputBGID[i]}`,
                ];
                let checkIfEmpty = checkCountryVal($(this).val(), childAddress);

                if (checkIfEmpty == "valid") {
                    setProvinceField(`${provinceSelectBGID[i]}`, $(this).val());
                }
            });

            //ADD CHANGE EVENT ON ADDITIONAL BACKGROUND PROVINCE - KLA 01042023
            $(document).on("change", `#${provinceSelectBGID[i]}`, function () {
                // console.log("asd");
                let childAddress = [
                    `${citySelectBGID[i]}`,
                    `${brgySelectBGID[i]}`,
                    `${zipInputBGID[i]}`,
                ];
                let checkIfEmpty = checkValue($(this).val(), childAddress);

                if (checkIfEmpty == false) {
                    setMunicipalityField(`${citySelectBGID[i]}`, $(`#${countrySelectBGID[i]}`).val(), $(`#${provinceSelectBGID[i]}`).val());
                }
            });


            //ADD CHANGE EVENT ON ADDITIONAL BACKGROUND CITY - KLA 01042023
            $(document).on("change", `#${citySelectBGID[i]}`, function () {
                // console.log("asd");
                let childAddress = [
                    `${brgySelectBGID[i]}`,
                ];
                let checkIfEmpty = checkValue($(this).val(), childAddress);

                if (checkIfEmpty == false) {
                    setBarangayField(`${brgySelectBGID[i]}`, $(`#${countrySelectBGID[i]}`).val(), $(`#${provinceSelectBGID[i]}`).val(), $(`#${citySelectBGID[i]}`).val());
                }
            });

            //ADD CHANGE EVENT ON ADDITIONAL BACKGROUND BRGY  - KLA 01042023
            $(document).on("change", `#${brgySelectBGID[i]}`, function () {
                // console.log(zipInputBGID[i]);
                let childAddress = [
                    `${zipInputBGID[i]}`,
                ];
                let checkIfEmpty = checkValue($(this).val(), childAddress);

                if (checkIfEmpty == false) {
                    setZipCodeField(`${zipInputBGID[i]}`, $(`#${countrySelectBGID[i]}`).val(), $(`#${provinceSelectBGID[i]}`).val(), $(`#${citySelectBGID[i]}`).val(), $(`#${brgySelectBGID[i]}`).val());
                }
            });


        }

        // ENABLE 'ADD MORE' IF THE LATEST DIVGROUP IS ACTIVE


    } catch (error) {
        console.log(error);
    }

});


function bgInfoCheckIfEmpty() {

}

// function changeCountryBG(province) {
//     console.log("province");
// }

$(document).on("click", "#addpatient-bg-info", function () {
    let bgInputs = [];
    bgInputs = $("#backgroundDiv :input");
    // console.log(bgInputs);
    let bgData = {
        // U_BG_NAME: {},
        U_BG_LASTNAME: {},
        U_BG_FIRSTNAME: {},
        U_BG_MIDDLENAME: {},
        U_BG_EXTNAME: {},
        U_BG_RELATIONSHIP: {},
        U_BG_CONTACTNO: {},
        U_BG_CONTACTNO2ND: {},
        U_BG_COUNTRY: {},
        U_BG_PROVINCE: {},
        U_BG_CITY: {},
        U_BG_BRGY: {},
        U_BG_ZIP: {},
        U_BG_STREET: {},
        U_BG_ADDRESS: {},
        U_BG_EMERGENCY: {},
        id: {}
    };

    // ];
    let bgInputID = [];

    for (let i = 0; i < bgInputs.length; i++) {
        bgInputID[i] = $(bgInputs[i]).attr("id")
        console.log(bgInputID[i]);
        switch ($(bgInputs[i]).attr("name")) {
            case "U_BG_LASTNAME":
                bgData.U_BG_LASTNAME =
                {
                    ...bgData.U_BG_LASTNAME,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                };
                break;
            case "U_BG_FIRSTNAME":
                bgData.U_BG_FIRSTNAME =
                {
                    ...bgData.U_BG_FIRSTNAME,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                };
                break;
            case "U_BG_MIDDLENAME":
                bgData.U_BG_MIDDLENAME =
                {
                    ...bgData.U_BG_MIDDLENAME,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                };
                // bgData.U_BG_MIDDLENAME.push($(bgInputs[i]).val().toUpperCase());
                break;
            case "U_BG_EXTNAME":
                bgData.U_BG_EXTNAME =
                {
                    ...bgData.U_BG_EXTNAME,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                };
                // bgData.U_BG_EXTNAME.push($(bgInputs[i]).val().toUpperCase());
                break;
            case "U_BG_RELATIONSHIP":
                bgData.U_BG_RELATIONSHIP =
                {
                    ...bgData.U_BG_RELATIONSHIP,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                };
                // bgData.U_BG_RELATIONSHIP.push($(bgInputs[i]).val().toUpperCase());
                break;
            case "U_BG_CONTACTNO":
                bgData.U_BG_CONTACTNO =
                {
                    ...bgData.U_BG_CONTACTNO,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                };
                // bgData.U_BG_CONTACTNO.push($(bgInputs[i]).val().toUpperCase());
                break;
            case "U_BG_CONTACTNO2ND":
                bgData.U_BG_CONTACTNO2ND =
                {
                    ...bgData.U_BG_CONTACTNO2ND,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                };
                // bgData.U_BG_CONTACTNO2ND.push($(bgInputs[i]).val().toUpperCase());
                break;
            case "U_BG_COUNTRY":
                bgData.U_BG_COUNTRY =
                {
                    ...bgData.U_BG_COUNTRY,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                };
                // bgData.U_BG_COUNTRY.push($(bgInputs[i]).val().toUpperCase());
                break;
            case "U_BG_PROVINCE":
                bgData.U_BG_PROVINCE =
                {
                    ...bgData.U_BG_PROVINCE,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                };
                // bgData.U_BG_PROVINCE.push($(bgInputs[i]).val().toUpperCase());
                break;
            case "U_BG_CITY":
                bgData.U_BG_CITY =
                {
                    ...bgData.U_BG_CITY,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                };
                // bgData.U_BG_CITY.push($(bgInputs[i]).val().toUpperCase());
                break;
            case "U_BG_BRGY":
                bgData.U_BG_BRGY =
                {
                    ...bgData.U_BG_BRGY,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                };
                // bgData.U_BG_BRGY.push($(bgInputs[i]).val().toUpperCase());
                break;
            case "U_BG_ZIP":
                bgData.U_BG_ZIP =
                {
                    ...bgData.U_BG_ZIP,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                };
                // bgData.U_BG_ZIP.push($(bgInputs[i]).val().toUpperCase());
                break;
            case "U_BG_STREET":
                bgData.U_BG_STREET =
                {
                    ...bgData.U_BG_STREET,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                };
                // bgData.U_BG_STREET.push($(bgInputs[i]).val().toUpperCase());
                break;
            case "U_BG_ADDRESS":
                bgData.U_BG_ADDRESS =
                {
                    ...bgData.U_BG_ADDRESS,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                };
                // bgData.U_BG_ADDRESS.push($(bgInputs[i]).val().toUpperCase());
                break;
            case "U_BG_EMERGENCY":
                // bgData.U_BG_FIRSTNAME =
                // {
                //     ...bgData.U_BG_FIRSTNAME,
                //     [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase()
                // };

                bgInputs[i].checked ?
                    bgData.U_BG_EMERGENCY =
                    {
                        ...bgData.U_BG_EMERGENCY,
                        [$(bgInputs[i]).attr('id')]: 1
                    }
                    :
                    bgData.U_BG_EMERGENCY =
                    {
                        ...bgData.U_BG_EMERGENCY,
                        [$(bgInputs[i]).attr('id')]: 0
                    }
                // bgData.U_BG_EMERGENCY.push($(bgInputs[i]).val().toUpperCase());
                break;
            case "id_patient":
                value = null;
                bgData.id =
                {
                    ...bgData.id,
                    [$(bgInputs[i]).attr('id')]: $(bgInputs[i]).val().toUpperCase() == "" ? "" : $(bgInputs[i]).val().toUpperCase()
                };
                // bgData.U_BG_STREET.push($(bgInputs[i]).val().toUpperCase());
                break;
            default:
        }



        // bgData.U_BG_ADDRESS.push()
        // bgData[$(bgInputs[i]).attr("name")] = $(bgInputs[i]).val().toUpperCase();
        // console.log(bgData);

    }
    $(`.red-border`).removeClass("red-border");
    console.log(bgInputID);
    console.log(bgData);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                "content"
            ),
        },
    });

    // const { success, errors } = $.ajax({
    //     url: `/updateBGInfo`, contentType: 'application/json; charset=utf-8',
    //     dataType: "json",
    //     data: JSON.stringify({ 'bgData': bgData }), method: 'POST'
    // });
    $.ajax({
        type: "POST",
        url: "/updateBGInfo",
        contentType: 'application/json; charset=utf-8',
        dataType: "json",
        data: JSON.stringify({ 'bgData': bgData }),
        success: function (e) {
            if (e.success == true) {
             
            } else {
                toastr.error(`Please Fill Out Required Field!`);
                for (var key in e.errors) {
                    console.log(key);
                    $(`#${key}`).addClass("red-border");//make required field's border color red
                }
            }
        }
    });
    // if (errors) {

    // }
});
