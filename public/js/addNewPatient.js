
let prev = '';
let val = '';
let image_data_url = '';
Webcam.set({
    width: 445,
    height: 320,
    dest_width: 640,
    dest_height: 480,
    image_format: 'jpeg',
    jpeg_quality: 90
});
let patientData = {
    U_LASTNAME: "",
    U_FIRSTNAME: "",
    U_BIRTHDATE: "",
}
// let mrn = "";

$(document).on('click', '#cameraButton', function () {
    Webcam.attach('#my_camera');
});

$(document).on('click', '#uploadButton', function () {
    $('#file').trigger('click');
});
$(document).on('change', '#file', function (e) {
    const target = e.target || e.srcElement;
    const files = $('#file')[0].files;

    if (target.files.length > 0) {
        if (files[0].size <= 2097152) {
            $('#imageLimit').addClass('invisible');
            prev = target.files[0];
            const image = URL.createObjectURL(target.files[0]);
            val = files;
            $("#img").attr('src', image);
            if (files) {
                image_data_url = '';
                $('.image-tag').val('');
            }
        } else {
            $('#file').val('');
            $("#img").attr('src', '../../img/profiles/profile-2.jpg');
            $('#imageLimit').removeClass('invisible');
        }

    } else {
        $('#file')[0].files = val && val;
    }
})
$(document).on('click', '#capture', function () {
    Webcam.snap(function (data_uri) {
        $(".image-tag").val(data_uri);
        $("#img").attr('src', data_uri);
        $('#results').empty();
        $('#results').append('<img src="' + data_uri + '"style="width:436px; height:320px;" />');
        image_data_url = data_uri;
    });
    $('#file').val('');
    $('.image-tag').val(image_data_url);
    $('#imageLimit').addClass('invisible');
})


$(document).on('click', '#closeButton', function () {
    $('#results').empty();
    Webcam.reset();
});

$(document).on('submit', '#imageForm', function (e) {
    e.preventDefault();
    $('#file').val() && console.log($('#file').val());
    $('.image-tag').val() && console.log($('.image-tag').val());
});



$(document).ready(function ($) {
    $(document).on('submit', '#pi-form', function (event) {
        event.preventDefault();
        $('#nav-patient-info-tab').removeClass("active");
        $('#nav-patient-info-tab').addClass("disabled");
        $('#nav-patient-info').removeClass("show").removeClass("active");

        $('#nav-background-info-tab').removeClass("disabled");
        $('#nav-background-info-tab').addClass("active");
        $('#nav-background-info').addClass("show").addClass("active");
    });

    $(document).on('click', '#bi-prev', function (event) {
        event.preventDefault();
        $('#nav-background-info-tab').addClass("disabled");
        $('#nav-background-info-tab').removeClass("active");
        $('#nav-background-info').removeClass("show").removeClass("active");

        $('#nav-patient-info-tab').removeClass("disabled");
        $('#nav-patient-info-tab').addClass("active");
        $('#nav-patient-info').addClass("show").addClass("active");
    });

    $(document).on('click', '#bi-next', function (event) {
        event.preventDefault();

        $('#nav-background-info-tab').removeClass("active");
        $('#nav-background-info-tab').addClass("disabled");
        $('#nav-background-info').removeClass("show").removeClass("active");

        $('#nav-medical-info-tab').removeClass("disabled");
        $('#nav-medical-info-tab').addClass("active");
        $('#nav-medical-info').addClass("show").addClass("active");
    });

    $(document).on('click', '#mi-prev', function (event) {
        event.preventDefault();
        $('#nav-medical-info-tab').addClass("disabled");
        $('#nav-medical-info-tab').removeClass("active");
        $('#nav-medical-info').removeClass("show").removeClass("active");

        $('#nav-background-info-tab').removeClass("disabled");
        $('#nav-background-info-tab').addClass("active");
        $('#nav-background-info').addClass("active").addClass("show");
    });

    $(document).on('click', '#mi-next', function (event) {
        event.preventDefault();
        $('#nav-medical-info-tab').removeClass("active");
        $('#nav-medical-info-tab').addClass("disabled");
        $('#nav-medical-info').removeClass("show").removeClass("active");

        $('#nav-case-info-tab').removeClass("disabled");
        $('#nav-case-info-tab').addClass("active");
        $('#nav-case-info').addClass("show").addClass("active");
    });

    $(document).on('click', '#ci-prev', function (event) {
        event.preventDefault();
        $('#nav-case-info-tab').addClass("disabled");
        $('#nav-case-info-tab').removeClass("active");
        $('#nav-case-info').removeClass("show").removeClass("active");

        $('#nav-medical-info-tab').removeClass("disabled");
        $('#nav-medical-info-tab').addClass("active");
        $('#nav-medical-info').addClass("active").addClass("show");
    });



});




let addPatientPath = '';
let patientFormData = {
    lastName: '',
    firstName: '',
    middleName: '',
};
let currentFormTarget = '';
let currentUserRights = '';
$(document).on('click', '#addPatient', function () {
    try {
        patientFormData.lastName = '';
        patientFormData.firstName = '';
        patientFormData.middleName = '';
        addPatientPath = history.state.path;
        process();
    } catch (error) {
        console.log(error);
    }

});
$(document).ready(function () {
    addPatientPath = window.location.pathname;
    process();
});

function process() {
    try {
        if (addPatientPath.includes('/registration')) {
            $(document).on('focus', '.patient-form-field', function () {
                currentFormTarget = $(this)[0].id;
            });
            $(document).on('keyup', currentFormTarget, function () {
                patientFormData = {
                    ...patientFormData,
                    [currentFormTarget]: $(`#${currentFormTarget}`).val(),
                }
                $('#fullName').val(`${patientFormData.lastName} ${patientFormData.firstName}`);
            });


        }


    } catch (error) {
        console.log(error);
    }

}


// START Register Patient KLA - 12/16/2022
// START Register Patient KLA - 12/16/2022

$(document).on("click", "#addpatient-register", function () {


    try {

        currentUserRights = $('#userRights').attr('rights');
        console.log(currentUserRights);
        //header title switching

        var formInput, inputs, formSelect, contactSelect = [];
        let selectObj = {};
        let inputObj = {};



        // set object for patient's contacts
        let selectObjContact = {
            contact_type: [],
            contact_no: [],
            contact_notes: [],
            contact_id: []
        };

        // set object for patient's emails
        let selectObjemail = {
            email_type: [],
            email: [],
            email_notes: [],
            email_id: []
        };



        // Find all  `input` elements
        formInput = $("#patient-info-register-patient :input[type='text'], :input[type='date'],:input[type='number']")

        // Find all selects elements
        formSelect = $("#patient-info-register-patient select")
        console.log(formSelect);
        // contactSelect = $("#contactDiv select[name=contact_type]");
        // console.log(contactSelect);

        contact_no = [];
        contact_notes = [];
        contact_id = [];

        email = [];
        email_notes = [];
        email_id = [];

        // make all input names as array index and assign a value
        for (let index = 0; index < formInput.length; index++) {
            switch ($(formInput[index]).attr('name')) {
                case "contact_no":
                    contact_no.push($(formInput[index]).val().toUpperCase());
                    break;
                case "contact_notes":
                    contact_notes.push($(formInput[index]).val().toUpperCase());
                    break;
                case "contact_id":
                    contact_id.push($(formInput[index]).val().toUpperCase());
                    break;
                case "email":
                    email.push($(formInput[index]).val());
                    break;
                case "email-notes":
                    email_notes.push($(formInput[index]).val().toUpperCase());
                    break;
                case "email_id":
                    email_id.push($(formInput[index]).val().toUpperCase());
                    break;
                default:
                    inputObj[$(formInput[index]).attr('name')] = $(formInput[index]).val().toUpperCase();
            }
            // if ($(formInput[index]).attr('name') == "contact_no") {
            //     contact_no.push($(formInput[index]).val().toUpperCase());
            // } else if ($(formInput[index]).attr('name') == "contact_notes") {
            //     contact_notes.push($(formInput[index]).val().toUpperCase());
            // } else if ($(formInput[index]).attr('name') == "contact_id") {
            //     contact_id.push($(formInput[index]).val().toUpperCase());
            // } else {
            //     inputObj[$(formInput[index]).attr('name')] = $(formInput[index]).val().toUpperCase();
            // }

        }
        // make all select names as array index and assign a value
        contact_type = [];
        email_type = [];
        for (let index = 0; index < formSelect.length; index++) {

            switch ($(formSelect[index]).attr('name')) {
                case "contact_type":
                    contact_type.push($(formSelect[index]).val().toUpperCase());
                    break;
                case "email-type":
                    email_type.push($(formSelect[index]).val().toUpperCase());
                    break;
                default:
                    selectObj[$(formSelect[index]).attr('name')] = $(formSelect[index]).val().toUpperCase();
            }
            // if ($(formSelect[index]).attr('name') == "contact_type") {
            //     contact_type.push($(formSelect[index]).val().toUpperCase());
            // }
            // else {
            //     selectObj[$(formSelect[index]).attr('name')] = $(formSelect[index]).val().toUpperCase();
            // }

        }



        // console.log(selectObj1 + selectObj);
        selectObjContact.contact_type = contact_type;
        selectObjContact.contact_no = contact_no;
        selectObjContact.contact_notes = contact_notes;
        selectObjContact.contact_id = contact_id;


        selectObjemail.email_type = email_type;
        selectObjemail.email = email;
        selectObjemail.email_notes = email_notes;
        selectObjemail.email_id = email_id;



        // console.log(selectObjemail);

        // merge inputs and select into a single object to be used in ajax request
        let registerPatientData = Object.assign(selectObj, inputObj, selectObjContact, selectObjemail);
        console.log(registerPatientData);
        let role = $('#addpatient-register').attr('user');
        for (var key in registerPatientData) {
            $(`input[name='${key}'], select[name='${key}']`).removeClass("red-border");
        }

        registerPatientData = {
            ...registerPatientData,
            'U_ADDRESS': `${registerPatientData.U_COUNTRY} | ${registerPatientData.U_PROVINCE} | ${registerPatientData.U_BARANGAY} | ${registerPatientData.U_STREET}`,
            // 'NAME': `${registerPatientData.U_COUNTRY} | ${registerPatientData.U_PROVINCE} | ${registerPatientData.U_BARANGAY} | ${registerPatientData.U_STREET}`
        }
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
                rights: currentUserRights,
            },
        }),
            $.ajax({
                type: "POST",
                url: "/registerPatientInfo",
                contentType: 'application/json; charset=utf-8',
                dataType: "json",
                data: JSON.stringify({ 'registerPatientData': registerPatientData }),
                success: function (e) {
                    // toastr.error(e.msg);
                    // console.log(e);
                    if (e?.hasAccess == false) {
                        backendCheckUserRights();
                        return;
                    }
                    if (e.success == true) {
                        // toastr.success(e.msg);
                        console.log('hello');

                        if ((role != "Admin") && (role != "Super Admin") && (role != "Triage")) {
                            $('#nav-add-new-case-tab').prop('disabled', false);
                            createVisit(registerPatientData, e.mrn)
                        } else {
                            loadPageOnChosenOption(e.mrn, 'isNew');
                        }
                    } else {
                        toastr.error(`Please Fill Out Required Field!`);
                        // console.log(e.errors);
                        for (var key in e.errors) {
                            $(`input[name='${key}'], select[name='${key}']`).addClass("red-border");//make required field's border color red
                        }
                    }
                },
            });
    }
    catch (error) {
        // $("#main").html(errorScreen(error));
        console.log(error);
    }
});

function createVisit(patientData, mrn) {
    console.log(mrn);
    $("#createNewVisitDecide").modal("show");
    let visitType = "";
    $(document).on("click", "#create-visit-reg", function () {
        // visitType = "Inpatient";
        console.log('hello');
        $(document).off('click', "#create-visit-reg");
        $(document).off('click', "#no-visit-reg");
        $(document).off('click', ".redirect-on-close");
        $("#createNewVisitDecide").modal("hide");
        loadPageOnChosenOption(mrn, 'isNew')


    });
    $(document).on("click", "#no-visit-reg", function () {
        // visitType = "Outpatient";
        console.log('hello1');
        $(document).off('click', "#create-visit-reg");
        $(document).off('click', "#no-visit-reg");
        $(document).off('click', ".redirect-on-close");
        $("#createNewVisitDecide").modal("hide");
        loadPageOnChosenOption(mrn, '')


    });
    $(document).on("click", ".redirect-on-close", function () {
        console.log('hello2');
        console.log($(this).attr("name"))
        $(document).off('click', "#create-visit-reg");
        $(document).off('click', "#no-visit-reg");
        $(document).off('click', ".redirect-on-close");
        $(`#${$(this).attr("name")}`).modal("hide");
        loadPageOnChosenOption(mrn, '')


    });


}

// END Register Patient KLA - 12/16/2022


async function createVisitAjax(visitType, patientData, mrn) {

    // $.ajaxSetup({
    //     headers: {
    //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
    //             "content"
    //         ),
    //     },
    // })
    // $.ajax({
    //     type: "POST",
    //     url: "/createVisit",
    //     contentType: 'application/json; charset=utf-8',
    //     dataType: "json",
    //     data: JSON.stringify({ 'registerPatientData': registerPatientData }),
    //     success: function (e) {

    //     }
    // });
};





// START Check if Patient Exist 12/20/2022
$(document).on('change', '#lastName', function () {
    checkIfPatientExist('last-name', $(this).val());
});
$(document).on('change', '#firstName', function () {
    checkIfPatientExist('first-name', $(this).val());
});
$(document).on('blur', '#bday', function () {
    checkIfPatientExist('birthday', $(this).val());

    var e = document.getElementById("bday").value,
        t = new Date(e);
    if (t > new Date())
        showALertModal(
            "warning",
            "Entered Date is Greater than Current Date",
            "secondMsg"
        ),
            (document.getElementById("bday").value = "");
    else {
        var a = Date.now() - t.getTime(),
            i = new Date(a).getUTCFullYear(),
            n = Math.abs(i - 1970);
        document.getElementById("age").value = n;
    }

});




async function checkIfPatientExist(identifier, value) {
    // let lName = "";
    // patientData={

    // }


    patientData.U_LASTNAME = $("#lastName").val();

    patientData.U_FIRSTNAME = $("#firstName").val();


    patientData.U_BIRTHDATE = $("#bday").val();



    // console.log(patientData);

    if (patientData.U_LASTNAME != "" && patientData.U_FIRSTNAME != "" && patientData.U_BIRTHDATE != "") {
        // console.log(patientData);
        // const result = 
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        })
        // console.log(patientData);
        // let checkData = Object.a
        const result = await $.ajax({
            url: `/checkIfPatientExist`, contentType: 'application/json; charset=utf-8',
            dataType: "json", data: patientData, method: 'GET'
        });

        if (result) {
            console.log(result.patientData);
            if (result.patientData != "") {
                let index = 0;
                changePatientView(index, result.patientData);

                checkIndex(index, result.patientData.length);


                $("#arrow-left-exist").click(function () {
                    if (index != 0) {
                        index--;
                        $("#arrow-right-exist").css("display", "block");
                    }
                    checkIndex(index, result.patientData.length);
                    changePatientView(index, result.patientData)
                    // console.log(index);
                })
                $("#arrow-right-exist").click(function () {
                    if ((index + 1) < result.patientData.length) {
                        ++index;
                        $("#arrow-left-exist").css("display", "block");
                    }
                    checkIndex(index, result.patientData.length);
                    changePatientView(index, result.patientData)
                    // console.log(index);
                })
                $("#verifyPatientExist").modal("show");

                $("#open-exist").click(function () {
                    window.location.href = `/registration/information/${result.patientData[index]['CODE']}`
                });
                $("#override-exist").click(function () {


                    for (var key in patientData) {
                        patientData[key] = ""
                    }
                    $(`.CODE-exist`).html('');
                    $(`.NAME-exist`).html('');
                    $(`.U_BIRTHDATE-exist`).html('');
                    $("#verifyPatientExist").modal("hide");
                });
            }



        }
    }

    return;

}



function changePatientView(index, patientData) {

    // $(`.CODE-exist`).html('');
    for (var key in patientData[index]) {
        // console.log(key);
        // console.log(`${patientData[index][key]}`);

        $(`.${key}-exist`).html(`${patientData[index][key]}`);
    }
}
function checkIndex(index, patientData) {
    if (index == 0) {
        $("#arrow-left-exist").css("display", "none");
    }
    if ((index + 1) >= patientData) {
        $("#arrow-right-exist").css("display", "none");;
    }
    return;
}
// END Check if Patient Exist 12/20/2022

function checkValue(value, childID) {
    // let returnValue = "";
    for (let i = 0; i < childID.length; i++) {
        $(`#${childID[i]}`).empty("");
        $(`#${childID[i]}`).val("");
        $(`#${childID[i]}`).append(`<option value=""></option>`);
    }

    if (value == "") {

        return true;
    }
    else {

        return false;
    }


}

function checkCountryVal(value, childID) {
    let returnValue = "";

    for (let i = 0; i < childID.length; i++) {
        $(`#${childID[i]}`).empty("");
        $(`#${childID[i]}`).val("");
        $(`#${childID[i]}`).append(`<option value=""></option>`);
    }
    switch (value) {
        case "":
            // $(`#${childID[0]}`).attr("disabled", true);
            returnValue = "empty";
            break;
        case "PHILIPPINES":
            // $(`#${childID[0]}`).attr("disabled", false);
            returnValue = "valid";
            break;
        default:
            for (let i = 0; i < childID.length; i++) {
                $(`#${childID[i]}`).empty("");
                $(`#${childID[i]}`).val("--");
                // $(`#${childID[0]}`).attr("disabled", true);
                $(`#${childID[i]}`).append(`<option value="--">--</option>`);
            }
            returnValue = "invalid";
    }
    return returnValue;
}


// START Dependent Address KLA - 12/19/2022
$(document).on('change', '#country-patient-reg', function () {
    // console.log($(this).val());
    let childAddress = [
        "province-patient-reg",
        "city-patient-reg",
        "brgy-patient-reg",
        "zip-patient-reg"
    ];

    let checkIfEmpty = checkCountryVal($(this).val(), childAddress);

    if (checkIfEmpty == "valid") {
        setProvinceField('province-patient-reg', $(this).val());
    }
});

$(document).on('change', '#province-patient-reg', function () {
    // console.log($(this).val());

    let childAddress = [
        "city-patient-reg",
        "brgy-patient-reg",
        "zip-patient-reg"
    ];

    let checkIfEmpty = checkValue($(this).val(), childAddress);
    if (checkIfEmpty == false) {
        setMunicipalityField('city-patient-reg', $("#country-patient-reg").val(), $(this).val());
    }

});
$(document).on('change', '#city-patient-reg', function () {
    // console.log($(this).val());

    let childAddress = [
        "brgy-patient-reg",
        "zip-patient-reg"
    ];
    let checkIfEmpty = checkValue($(this).val(), childAddress);
    if (checkIfEmpty == false) {
        setBarangayField('brgy-patient-reg', $("#country-patient-reg").val(), $("#province-patient-reg").val(), $(this).val());
    }
});
$(document).on('change', '#brgy-patient-reg', function () {
    // console.log($(this).val());
    let childAddress = [
        "zip-patient-reg"
    ];
    let checkIfEmpty = checkValue($(this).val(), childAddress);
    if (checkIfEmpty == false) {
        setZipCodeField('zip-patient-reg', $("#country-patient-reg").val(), $("#province-patient-reg").val(), $("#city-patient-reg").val(), $(this).val());
    }

});
// END Dependent Address KLA - 12/19/2022



// START Dependent Background Address KLA - 01/03/2023
$(document).on('change', '#country-background-reg-0', function () {
    // console.log($(this).val());

    let childAddress = [
        "province-background-reg-0",
        "city-background-reg-0",
        "brgy-background-reg-0",
        "zip-background-reg-0"
    ];

    let checkIfEmpty = checkCountryVal($(this).val(), childAddress);

    if (checkIfEmpty == "valid") {
        setProvinceField('province-background-reg-0', $(this).val());
    }

});

$(document).on('change', '#province-background-reg-0', function () {
    // console.log($(this).val());
    let childAddress = [
        "city-background-reg-0",
        "brgy-background-reg-0",
        "zip-background-reg-0"
    ];

    let checkIfEmpty = checkValue($(this).val(), childAddress);
    if (checkIfEmpty == false) {
        setMunicipalityField('city-background-reg-0', $("#country-background-reg-0").val(), $(this).val());
    }

});
$(document).on('change', '#city-background-reg-0', function () {
    // console.log($(this).val());
    let childAddress = [
        "brgy-background-reg-0",
        "zip-background-reg-0"
    ];
    let checkIfEmpty = checkValue($(this).val(), childAddress);
    if (checkIfEmpty == false) {
        setBarangayField('brgy-background-reg-0', $("#country-background-reg-0").val(), $("#province-background-reg-0").val(), $(this).val());
    }

});
$(document).on('change', '#brgy-background-reg-0', function () {
    // console.log($(this).val());

    let childAddress = [
        "zip-background-reg-0"
    ];
    let checkIfEmpty = checkValue($(this).val(), childAddress);
    if (checkIfEmpty == false) {
        setZipCodeField('zip-background-reg-0', $("#country-background-reg-0").val(), $("#province-background-reg-0").val(), $("#city-background-reg-0").val(), $(this).val());
    }

});
// END Dependent Background Address KLA - 01/03/2023

// Sweet alert Start --KLA - 12/14/2022
function showALertModal(e, t, a) {
    Swal.fire({ icon: e, title: t, text: a });
}
//END

$(document).on("change", "#height-in", function () {
    convertionInchestoCentimeter();
    calculationBMI();
});

$(document).on("change", "#weight-kg", function () {
    convertionKilogramstoPounds();
    calculateBMI();
});
$(document).on("change", "#height-cm", function () {
    convertionCentimeterstoInches();
    calculationBMI();
});
$(document).on("change", "#weight-lb", function () {
    convertionPoundstoKilogram();
    calculateBMI();
});


//calculation of cm and kg to BMI
function calculateBMI() {
    var centimeter = $('#height-cm').val();
    var kg = $('#weight-kg').val();
    var convertedbmi = parseFloat((kg / centimeter / centimeter) * 10000).toFixed(2);

    $('#bmi').val(convertedbmi);

}
//convertion of Centimeter to Inches
function convertionCentimeterstoInches() {
    var centimeter = $('#height-cm').val();

    if (centimeter >= 272) {
        var convertedInches = parseFloat(272 / 2.54).toFixed(2);
    }
    if (centimeter <= 272) {
        var convertedInches = parseFloat(centimeter / 2.54).toFixed(2);
    }
    if (centimeter <= 55) {
        var convertedInches = parseFloat(55 / 2.54).toFixed(2);
    }
    $('#height-in').val(convertedInches, 'inches');

}

//convertion of Inches to Centimeter
function convertionInchestoCentimeter() {
    var inch = $('#height-in').val();

    if (inch >= 107.09) {
        var convertedcm = parseFloat(107.09 * 2.54).toFixed(2);
    }
    if (inch <= 107.09) {
        var convertedcm = parseFloat(inch * 2.54).toFixed(2);
    }
    if (inch <= 21.65) {
        var convertedcm = parseFloat(21.65 * 2.54).toFixed(2);
    }
    $('#height-cm').val(convertedcm);
}

//convertion of kilogram to pounds
function convertionKilogramstoPounds() {
    var kg = $('#weight-kg').val();
    var convertedlb = parseFloat(kg * 2.2046226218).toFixed(2);

    $('#weight-lb').val(convertedlb);

}

//convertion of pounds to kilogram
function convertionPoundstoKilogram() {
    var lb = $('#weight-lb').val();
    var convertedkg = parseFloat(lb / 2.2046226218).toFixed(2);

    $('#weight-kg').val(convertedkg);
}
//calcultion of inches and pounds in BMI
function calculationBMI() {
    var lb = $('#weight-lb').val();
    var inch = $('#height-in').val();
    var calculationbmi = parseFloat((lb * 703) / (inch * inch)).toFixed(2);

    $('#bmi').val(calculationbmi);



}



async function loadPageOnChosenOption(patientID, category) {
    console.log(patientID);


    try {
        $("#main").html(loading);

        const result = await $.ajax({ url: `/registration/information/${patientID}?${category}` });
        if (result) {
            var doc = new DOMParser().parseFromString(result, "text/html");
            $("#main").html(doc.getElementById("contentContainer"));
            window.livewire.rescan();
            history.pushState({ path: `/registration/information/${patientID}` }, `Selected: ${patientID}`, `/registration/information/${patientID}`);
            if (category) {
                $('#nav-new-case-tab').trigger('click');
            }
        }
    } catch (error) {
        $("#main").html(errorScreen(error));
    }
}
