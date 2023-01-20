$(document).ready(function() {
    let temp = "";
    $(document).on('click', '#dischargePageBtn', function() {
        $('#dischargePageBtn').prop('hidden',true);
        $('#newCaseFirstSaveBtn').prop('hidden',true);
        $('.admitCol').prop('hidden',true);
        $('#admitDiv').prop('hidden',true);
        $('#admissionPageBtn').prop('hidden',false);
        $('#newCaseSecondSaveBtn').prop('hidden',false);
        $('.dischargeCol').prop('hidden',false);
        $('#dischargeDiv').prop('hidden',false);
    });
    $(document).on('click', '#admissionPageBtn', function() {
        $('#dischargePageBtn').prop('hidden',false);
        $('#newCaseFirstSaveBtn').prop('hidden',false);
        $('.admitCol').prop('hidden',false);
        $('#admitDiv').prop('hidden',false);
        $('#admissionPageBtn').prop('hidden',true);
        $('#newCaseSecondSaveBtn').prop('hidden',true);
        $('.dischargeCol').prop('hidden',true);
        $('#dischargeDiv').prop('hidden',true);
    });

    // $(document).on('click', '#dischargePage', function() {
    //     $('#dischargePage').prop('hidden',true);
    //     $('#admitPage').prop('hidden',false);
        

    //     $('#discharge-div').prop('hidden',true);
    //     $('#admit-div').prop('hidden',false);

    //     $('#dischargeSave').prop('hidden',false);
    //     $('#admitSave').prop('hidden', true);
        
    // });

    // $(document).on('click', '#admitPage', function() {
    //     $('#admitPage').prop('hidden',true);
    //     $('#dischargePage').prop('hidden',false);

    //     $('#discharge-div').prop('hidden',false);
    //     $('#admit-div').prop('hidden',true);

    //     $('#dischargeSave').prop('hidden',true);
    //     $('#admitSave').prop('hidden',false);
        
    // });
});

//Start Christopher P. Napoles 12/22/2022
//Adding of New Cases
let patientType = '';
let documentId = '';
let patientCode = '';

//Setup the patient type if it is inpatient or outpatient
$(document).on('click','#nav-new-case-tab',function(){
   displayFetch();
})

$(document).on('click','#nav-add-new-case-tab',function(){
    displayFetch();
})

//fetch Available Case Id
async function checkCaseId (type) {
    try{
        if(!$('#caseId').val()){
            const {caseId,docId} = await $.ajax(`/checkcasenumber?type=${type}`)
            if(caseId){
                $('#caseId').val(caseId);
                $('#docId').val(docId);
            }
        }else{
            return;
        }
       
    }catch(error){
        console.log(error);
    }
   
}

//Save New Case Information
$(document).on('click','#newCaseFirstSaveBtn',async function(){
    try{
        $(".red-border").removeClass('red-border');
        const formInput = $("#newCaseForm :input");
        let inputObj='';
        for (let index = 0; index < formInput.length; ++index) {
            inputObj = {
                ...inputObj,
                [$(formInput[index]).attr('name')]: $(formInput[index]).val(),
               
            }
        }
        //subject for change
        inputObj = {
            ...inputObj,
            COMPANY:'HIS',
            BRANCH:'HO',
            U_PATIENTID:patientCode,
            U_PATIENTNAME:$('#patientFullName').text() ? $('#patientFullName').text() : $('#fullName').val(),
            U_LASTNAME:$('#patientLastName').val(),
            U_FIRSTNAME:$('#patientFirstName').val(),
            U_MIDDLENAME:$('#patientMiddleName').val() ? $('#patientMiddleName').val() : '-',
        }
        delete inputObj.undefined;
        delete inputObj[""];
        
        // console.log(inputObj);
        // console.log($('#newCaseForm').attr('rights'));
        const result = await $.ajax({ 
                method:'POST',
                url:`/createorupdatecase?type=${patientType}`, 
                headers: {
                    source:'rest-api',
                    rights:$('#newCaseForm').attr('rights')
                },
            data:{data:inputObj},
        })

        if(result){
            console.log(result);
            const {errors,success,hasAccess} = result;

            if(hasAccess == false){
                backendCheckUserRights();
                return;
            }
            if(result == 'Unauthorized'){
                window.location.href='/';
                return;
            }
            if(errors){
                for (var key in errors) {
                    console.log(errors[key]);
                    $(`input[name='${errors[key]}'], select[name='${errors[key]}'], textarea[name='${errors[key]}']`).addClass("red-border");//make required field's border color red
                }
                Swal.fire({
                    icon:'error',
                    title:`Error`,
                    text:'Please Double Check Input Fields'
                });
                return;
            }
            // console.log(result);
            checkCaseId(patientType);
            result.message &&
                Swal.fire({
                    icon:(result.message == 'created' || result.message == 'updated') ? 'success' : 'error',
                    title:`Case ${result.message}`
                });    
            result.message&&Livewire.emit('refresh');
            if(result.message == 'created'){
                $('#createCase').text('Active Case');
                $('#newCaseFirstSaveBtn').text('Update');
            }
            // $("#newCaseForm :input").val('');
        }
        console.log(patientType);
    }catch(error){
        Swal.fire({
            icon:'error',
            title:`Something Went Wrong`
        });
        console.log(error);
    }
        
})

$(document).on('keyup keydown change','#admitDate',function(){
    checkFields(this);
})
$(document).on('keyup keydown change','#arrivedBy',function(){
    checkFields(this);
})
$(document).on('keyup keydown change','#chiefComplaint',function(){
    checkFields(this);
})
$(document).on('keyup keydown change','#initialDiagnosis',function(){
    checkFields(this);
})
$(document).on('change','#assignedPersonnel',function(){
    checkFields(this);
})

//fetch data for active or new case and set patientType

function displayFetch(){
     // if(window.location.pathname.includes('/registration')){
    //     $("#newCaseForm :input").val('');
    // }
    patientCode = $('#patientCode').attr('code');
    if(window.location.pathname.includes('/inpatient')){
        patientType = 'Ip';
    }
    else{
        patientType = 'Op';
    }
    if (window.location.pathname.includes('/registration')){
        if($('#getViewRestriction').attr('content')){
            $('#getViewRestriction').attr('content') == 'Outpatient' ? patientType = 'Op' : patientType = 'Ip';
        }
    }
    console.log(patientType);
    checkCaseId(patientType);
    checkFields();
}

//check Fields
function checkFields(field){
    $(field).removeClass('red-border');
    if(
        $('#admitDate').val() &&
        $('#arrivedBy').val() &&
        $('#chiefComplaint').val() &&
        $('#initialDiagnosis').val()
    ){
        $('#newCaseFirstSaveBtn').prop('disabled',false);
    }else{
        $('#newCaseFirstSaveBtn').prop('disabled',true);
    }
}

//End