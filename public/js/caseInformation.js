
async function caseInfoList(caseID,type){
    try{
        // SHOW
        //Start Christopher P. Napoles 12/28/2022
        // console.log(adminViewPatientType);
        console.log(caseID);
        resetCaseInfoFields();
        $('#vitalSignsTable').html('');
        $('#icdsTable').html('');
        $('#caseOrdersTable').html('');
        //Show Case Info Modal
        if($('#outpatientCaseInformationModal').modal('show')){
            const result = await $.ajax({url:`/getcasedetails?visitId=${caseID}&patientType=${type}`,method:'GET'});
            if (result){
                // console.log(result);
                const {vitalSigns,icds,patientCase,requestItems} = result;
                
                //Setup fields base on case details
                $('#caseInformationId').val(caseID);
                $('#caseInformationAdmit').val(patientCase.DATECREATED);
                $('#caseInformationArrived').val(patientCase.U_ARRIVEDBY);
                $('#caseInformationService').val(patientCase.U_DOCTORSERVICE);
                $('#caseInformationId2').val(caseID);
                $('#caseInformationComplaint').val(patientCase.NE_U_CHIEFCOMPLAINT);
                $('#caseInformationInitial').val(patientCase.U_REMARKS);
                $('#caseInformationDischarge').val(patientCase.U_ENDDATE && patientCase.U_ENDDATE+' '+patientCase.U_ENDTIME);
                $('#caseInformationArrived2').val(patientCase.U_ARRIVEDBY);
                $('#caseInformationDisposition').val(patientCase.DISPOSITION);
                $('#caseInformationFinal').val(patientCase.U_REMARKS2);
                $('#caseInformationRoom').val(patientCase.U_ROOMNO ? patientCase.U_ROOMNO : '');
                $('#caseInformationRoom2').val(patientCase.U_ROOMNO ? patientCase.U_ROOMNO : '');

                //Set Data on Vital Signs Table
                vitalSigns.map((v)=>(
                    $('#vitalSignsTable').append(`
                        <tr>
                            <td>${v.created_at}</td> 
                            <td>${v.temperature_c ? v.temperature_c : v.temperature_f}</td>
                            <td>${v.blood_pressure}</td> 
                            <td>${v.heart_rate}</td>
                            <td>${v.respiratory_rate}</td>
                            <td>${v.oxygen_saturation}</td> 
                        </tr>
                    `)
                ));

                //Set Data on ICDS Signs Table
                icds.map((i,index)=>(
                    $('#icdsTable').append(`
                        <tr>
                            <td>${index+1}</td>
                            <td>${i.u_icdcode}</td> 
                            <td>${i.u_icddesc}</td>
                            <td>${i.created_by}</td>
                            <td>${i.created_at}</td>
                        </tr>
                    `)
                ));

                //Set Data on Case Orders Table
                requestItems.map((r,index)=>(
                    $('#caseOrdersTable').append(`
                        <tr>
                            <td>${index+1}</td>
                            <td>${r.DATECREATED}</td> 
                            <td>${r.U_ITEMGROUP}</td>
                            <td>${r.U_ITEMCODE}</td>
                            <td>${r.U_ITEMGROUP=='MED'? `${r.U_ITEMDESC}, ${r.U_QUANTITY}`:r.U_ITEMDESC}</td>
                            <td>${r.STATUS}</td>
                            <td>${r.CREATEDBY}</td>
                            <td>${r.U_ITEMDESC}</td>
                        </tr>
                    `)
                ))
            }
        }else{
             // HIDE
             $('#outpatientCaseInformationModal').modal('hide');
        }
        //End 
        $(document).on('click', '#caseInfoDischargeBtn', function(){
            $('#caseInfoTopFirstInput').prop('hidden', true);
            $('#caseInfoTopSecondInput').prop('hidden', false);
            $('#caseInfoDischargeBtn').prop('hidden', true);
            $('#caseInfoAdmissionBtn').prop('hidden', false);
            $('#finalDiagnosisAndICDDiv').prop('hidden', false);
            $('#textareaAndCaseOrderDiv').prop('hidden', true);
            $('#caseInfoVitalSign').prop('hidden', true);
            $('#caseInfoDispensary').prop('hidden', true);
            $('#CasInfoMayGoHomeId').prop('hidden', false);
            
        })
        $(document).on('click', '#caseInfoAdmissionBtn', function(){
            $('#caseInfoTopFirstInput').prop('hidden', false);
            $('#caseInfoTopSecondInput').prop('hidden', true);
            $('#caseInfoDischargeBtn').prop('hidden', false);
            $('#caseInfoAdmissionBtn').prop('hidden', true);
            $('#finalDiagnosisAndICDDiv').prop('hidden', true);
            $('#textareaAndCaseOrderDiv').prop('hidden', false);
            $('#caseInfoVitalSign').prop('hidden', false);
            $('#caseInfoDispensary').prop('hidden', false);
            $('#CasInfoMayGoHomeId').prop('hidden', true);
        
        })
    }catch(error){
        console.log(error);
    }
  
};

//Reset Fields Upon Clicking other case -Christopher P. Napoles 01/03/2022
function resetCaseInfoFields(){
    $('#caseInformationId').val('');
    $('#caseInformationAdmit').val('');
    $('#caseInformationArrived').val('');
    $('#caseInformationService').val('');
    $('#caseInformationId2').val('');
    $('#caseInformationComplaint').val('');
    $('#caseInformationInitial').val('');
    $('#caseInformationDischarge').val('');
    $('#caseInformationArrived2').val('');
    $('#caseInformationDisposition').val('');
    $('#caseInformationFinal').val('');
    $('#caseInformationRoom').val('');
    $('#caseInformationRoom2').val('');
}

// $(document).on('click','#nav-case-info-tab',function(){
//     Livewire.emit('refresh')
// })

