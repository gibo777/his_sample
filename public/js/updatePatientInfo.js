
import checkFieldEmail from "./utilities/emailValidator.js";

//START Christopher P. Napoles 12/19/2022
let patientInfo = {};
let outpatientInfo = {};
let inpatientInfo = {};
let patientCode = '';

//Set Default Value on Load
$(document).ready(function () {
    const ip = window.location.pathname.includes('inpatient/inpatient-list/information');
    const op = window.location.pathname.includes('outpatient/outpatientlist/information');
    const reg = window.location.pathname.includes('/registration/information');
    patientCode = $('#patientCode').attr('code');
    if (ip || op || reg) {
        $('#patientCountry').val() && setProvinceField('patientProvince', $('#patientCountry').val());
        $('#patientProvince').val() && setMunicipalityField('patientMunicipality', $('#patientCountry').val(), $('#patientProvince').val());
        $('#patientMunicipality').val() && setBarangayField('patientBarangay', $('#patientCountry').val(), $('#patientProvince').val(), $('#patientMunicipality').val());
        $('#patientBarangay').val() && setZipCodeField('patientZip', $('#patientCountry').val(), $('#patientProvince').val(), $('#patientMunicipality').val(), $('#patientBarangay').val());
    }
})

//Set Default Value on Click of Patient Information
$(document).bind('opEvent', function () {
    pageChange();

});

//Set Default Value on Click of inpatient Information
$(document).bind('ipEvent', function () {
    pageChange();

});

//Set Default Value on Click of Registerd Patient Information
$(document).bind('registerEvent', function () {
    pageChange();
});

//Set Patient Province on Field change
$(document).on('change', '#patientCountry', function () {
    $('#patientProvince').html('<option value="">-Select Province-</option>');
    $('#patientMunicipality').html('<option value="">-Select Municipality-</option>');
    $('#patientBarangay').html('<option value="">-Select Barangay-</option>');
    $('#patientStreet').val('');
    $('#patientZip').val('');
    setProvinceField('patientProvince', $('#patientCountry').val());
})

//Set Patient Municipality on Field change
$(document).on('change', '#patientProvince', function () {
    $('#patientMunicipality').html('<option value="">-Select Municipality-</option>');
    $('#patientBarangay').html('<option value="">-Select Barangay-</option>');
    $('#patientStreet').val('');
    $('#patientZip').val('');
    setMunicipalityField('patientMunicipality', $('#patientCountry').val(), $('#patientProvince').val());
});

//Set Patient Barangay on Field change
$(document).on('change', '#patientMunicipality', function () {
    $('#patientBarangay').html('<option value="">-Select Barangay-</option>');
    $('#patientStreet').val('');
    $('#patientZip').val('');
    setBarangayField('patientBarangay', $('#patientCountry').val(), $('#patientProvince').val(), $('#patientMunicipality').val());
})

//Set Patient Zip code on Field change
$(document).on('change', '#patientBarangay', function () {
    $('#patientStreet').val('');
    $('#patientZip').val('');
    setZipCodeField('patientZip', $('#patientCountry').val(), $('#patientProvince').val(), $('#patientMunicipality').val(), $('#patientBarangay').val());
})

$(document).on('change', '#patientBirthdate', function () {
    const date = moment($('#patientBirthdate').val()).format('DD-MM-YYYY');
    const age = moment().diff(moment(date, "DD-MM-YYYY"), 'years');
    console.log(age)
    $('#patientAge').val(age);
    // $('#patientBirthdate').val(moment(date,"DD/MM/YYYY"))
})

// $(document).on('keyup keydown','#patientEmailAddress',function(){
//     const isValid = checkFieldEmail($(this).val());
//     console.log(isValid);
// })

//Set Patient Information
$(document).on('click', '#patientInformationUpdateButton', async function (e) {
    e.preventDefault();
    try {
        $('.red-border').removeClass('red-border');
        var formInput;
        let inputObj = {
            contact_type: [],
            contact_no: [],
            contact_notes: [],
            contact_id: [],
            email_type: [],
            email: [],
            email_notes: [],
            email_id: [],
        };
        formInput = $("#patientInformationUpdateForm :input")
        console.log(formInput);


        for (let index = 0; index < formInput.length; ++index) {

            if (formInput[index].name != 'U_AGE' && formInput[index].name != 'CODE') {
                if ($(formInput[index]).attr('type') != 'checkbox') {
                    switch ($(formInput[index]).attr('name')) {
                        case "contact_no":
                            inputObj.contact_no.push($(formInput[index]).val().toUpperCase());
                            break;
                        case "contact_notes":
                            inputObj.contact_notes.push($(formInput[index]).val().toUpperCase());
                            break;
                        case "contact_id":
                            inputObj.contact_id.push($(formInput[index]).val().toUpperCase());
                            break;
                        case "email":
                            inputObj.email.push($(formInput[index]).val());
                            break;
                        case "email-notes":
                            inputObj.email_notes.push($(formInput[index]).val().toUpperCase());
                            break;
                        case "email_id":
                            inputObj.email_id.push($(formInput[index]).val().toUpperCase());
                            break;
                        case "contact_type":
                            inputObj.contact_type.push($(formInput[index]).val().toUpperCase());
                            break;
                        case "email-type":
                            inputObj.email_type.push($(formInput[index]).val().toUpperCase());
                            break;
                        default:
                            inputObj = {
                                ...inputObj,
                                [$(formInput[index]).attr('name')]: $(formInput[index]).val()
                            }
                    }

                    // inputObj = {
                    //     ...inputObj,
                    //     [$(formInput[index]).attr('name')]: $(formInput[index]).val()
                    // }
                } else {
                    formInput[index].checked ?
                        inputObj = {
                            ...inputObj,
                            [$(formInput[index]).attr('name')]: 1
                        }
                        :
                        inputObj = {
                            ...inputObj,
                            [$(formInput[index]).attr('name')]: 0
                        }

                }
            }

        }

        inputObj.U_BIRTHDATE = moment(inputObj.U_BIRTHDATE).format('MM/DD/YYYY');
        inputObj = {
            ...inputObj,
            NAME: `${inputObj.U_LASTNAME} ${inputObj.U_FIRSTNAME} ${inputObj.U_MIDDLENAME ? inputObj.U_MIDDLENAME : ''} ${inputObj.U_EXTNAME ? inputObj.U_EXTNAME : ''}`
        }
        console.log(inputObj);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        })
        const { success, errors } = await $.ajax({ url: `/registerPatientInfo?code=${patientCode}`, data: inputObj, method: 'POST' });
        if (errors) {
            console.log(errors);
            for (var key in errors) {
                $(`input[name='${key}'], select[name='${key}']`).addClass("red-border");//make required field's border color red
            }
        }
        if (success) {
            console.log(success)
            toastr.success(`Patient's Record Updated Successfully`);
        }
    } catch (error) {
        console.log(error)
    }
})

//setup fields for everytime user change pages of patient Information
function pageChange() {
    patientCode = $('#patientCode').attr('code')
    $('#patientCountry').val() && setProvinceField('patientProvince', $('#patientCountry').val());
    $('#patientProvince').val() && setMunicipalityField('patientMunicipality', $('#patientCountry').val(), $('#patientProvince').val());
    $('#patientMunicipality').val() && setBarangayField('patientBarangay', $('#patientCountry').val(), $('#patientProvince').val(), $('#patientMunicipality').val());
    $('#patientBarangay').val() && setZipCodeField('patientZip', $('#patientCountry').val(), $('#patientProvince').val(), $('#patientMunicipality').val(), $('#patientBarangay').val());
}
//End


