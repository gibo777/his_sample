// var selectRequest = '#selectRequest';
// var procedure = '#procedure';
// var medicine = '#medicine';
// var supplies = '#supplies';
// var reports = '#reports';
// $(document).on('click', function () {
//     if(selectRequest, 'click'){
//         $('#selectRequestModal').modal('show');
//         // HIDE
//         $('#selectRequestModal').modal('hide');
//     }
//     else if (procedure, 'click'){
//         $('#procedureModal').modal('show');
//         // HIDE
//         $('#procedureModal').modal('hide');
//     }
//     else if (procedure, 'click'){
//         $('#medicineModal').modal('show');
//         // HIDE
//         $('#medicineModal').modal('hide');
//     }
//     else if (procedure, 'click'){
//         $('#suppliesModal').modal('show');
//         // HIDE
//         $('#suppliesModal').modal('hide');
//     }
//     else if (procedure, 'click'){
//         $('#reportModal').modal('show');
//         // HIDE
//         $('#reportModal').modal('hide');
//     }
// });


//start Christopher P. Napoles 12/27/22
var container = [];
let chosenRequest = {
    CODE:'',
    U_GROUP:'',
    NAME:'',
};
let index=-1;
$(document).on('click', '#selectRequest', function(){
    $('#selectRequestModal').modal('show');
    // HIDE
    $('#selectRequestModal').modal('hide');
});
$(document).on('click', '#vitalSign', function(){
    $('#vitalSignModal').modal('show');
    // HIDE
    $('#vitalSigntModal').modal('hide');
});


//fetch Data for the procedure list
$(document).on('click', '#procedure', async function(){
    try{
        resetAll();
        if($('#procedureModal').modal('show')){
            const itemList = await getRequestList('PRC','PRC');
            if(itemList){
                $('#prcTable').html('');
                itemList.map((p)=>{
                   return ($('#prcTable').append( 
                    `<tr class="listData">
                        <td class="dataCode">${p.CODE}</td>
                        <td class="dataGroup">${p.U_GROUP}</td>
                        <td class="dataName">${p.NAME}</td>
                     </tr>
                     `
                   ))
                })

                //filter or search procedure list
                $(document).on('keyup keydown','#searchRequestList',async function(){
                    resetChosenRequest();
                    $('#prcTable').html('Loading...');
                    await useDebounce($('#searchRequestList').val(),'PRC','PRC');   
                })

            }
        }else{
            // HIDE
            $('#procedureModal').modal('hide');
        }
        
    }catch(error){
        console.log(error);
    }
});

//fetch data for medicine list
$(document).on('click', '#medicine', async function(){
    try{
        resetAll();
        if($('#medicineModal').modal('show')){
            const itemList = await getRequestList('MED','MEDSUP');
            if(itemList){
                $('#mdcnTable').html('');
                itemList.map((p)=>{
                   return ($('#mdcnTable').append( 
                    `<tr class="listData">
                        <td class="dataCode">${p.CODE}</td>
                        <td class="dataGroup">${p.U_GROUP}</td>
                        <td class="dataName">${p.NAME}</td>
                     </tr>
                     `
                   ))
                })
            }
            //filter or search medicince list
            $(document).on('keyup keydown','#searchMedicineList',async function(){
                resetChosenRequest();
                $('#mdcnTable').html('Loading');
                await useDebounce($('#searchMedicineList').val(),'MED','MEDSUP');
            })
        }else{
            // HIDE
            $('#medicineModal').modal('hide');
        }
        
    }catch(error){
        console.log(error);
    }
});


$(document).on('click', '#package', function(){
    $('#packagesModal').modal('show');
    // HIDE
    $('#packagesModal').modal('hide');
});

$(document).on('click', '#supplies', function(){
    $('#suppliesModal').modal('show');
    // HIDE
    $('#suppliesModal').modal('hide');
});

// For the ICD Modal
$(document).on('click', '#icd', function(){
    $('#icdModal').modal('show');
    // HIDE
    $('#icdModal').modal('hide');
});

// For RVS Modal
$(document).on('click', '#rvs', function(){
    $('#rvsModal').modal('show');
    // HIDE
    $('#rvsModal').modal('hide');
});

// For the Room Bed Assign Modal
$(document).on('click', '#roomAssign', function(){
    $('#roomAssignModal').modal('show');
    // HIDE
    $('#roomAssignModal').modal('hide');
});

// For the Procedure Management Modal
$(document).on('click', '#procedureManagement', function(){
    $('#procedureManagementModal').modal('show');
    // HIDE
    $('#procedureManagementModal').modal('hide');
});


// For the Confirmation Modal
$(document).on('click', '#packageConfirmationBtn', function(){
    $('#packageConfirmModal').modal('show');
    // HIDE
    $('#packageConfirmModal').modal('hide');
    document.getElementById("moduleName").textContent="Package";
});

$(document).on('click', '#medicineConfirmationBtn', function(){
    $('#packageConfirmModal').modal('show');
    // HIDE
    $('#packageConfirmModal').modal('hide');
    document.getElementById("moduleName").textContent="Medicine";
});

$(document).on('click', '#procedureConfirmationBtn', function(){
    $('#packageConfirmModal').modal('show');
    // HIDE
    $('#packageConfirmModal').modal('hide');
    document.getElementById("moduleName").textContent="Procedure";
});

$(document).on('click', '#suppliesConfirmationBtn', function(){
    $('#packageConfirmModal').modal('show');
    // HIDE
    $('#packageConfirmModal').modal('hide');
    document.getElementById("moduleName").textContent="Supplies";
});

// End

// For the User Management Modal

$(document).on('click', '#userInformationSaveBtn', function(){
    $('#userManagementConfirmationModal').modal('show');
    // HIDE
    $('#userManagementConfirmationModal').modal('hide');
    document.getElementById("headerNameOne").textContent="Save";
    document.getElementById("headerNameTwo").textContent="Changes";
});

$(document).on('click', '#registerUserBtn', function(){
    $('#userManagementConfirmationModal').modal('show');
    // HIDE
    $('#userManagementConfirmationModal').modal('hide');
    document.getElementById("headerNameOne").textContent="Confirm";
    document.getElementById("headerNameTwo").textContent="User Registration";
});

$(document).on('click', '#userInformationDeactivateBtn', function(){
    $('#userDeactivateModal').modal('show');
    // HIDE
    $('#userDeactivateModal').modal('hide');
    document.getElementById("deactHeaderNameOne").textContent="Deactivate";
    document.getElementById("deactHeaderNameTwo").textContent="User";
});

// End

// For the Procedure Management Modal

$(document).on('click', '#deactivateProcedureBtn', function(){
    $('#procedureConfirmationModal').modal('show');
    // HIDE
    $('#procedureConfirmationModal').modal('hide');
    document.getElementById("headerNameOne").textContent="Confirm";
    document.getElementById("headerNameTwo").textContent="Procedure Deactivation";
});

$(document).on('click', '#activateProcedureBtn', function(){
    $('#procedureConfirmationModal').modal('show');
    // HIDE
    $('#procedureConfirmationModal').modal('hide');
    document.getElementById("headerNameOne").textContent="Confirm";
    document.getElementById("headerNameTwo").textContent="Procedure Activation";
});

// End





//Request Modal Events

//Choose an item on the items table
$(document).on('click','.listData',function(){
    try{
        $('.listData').removeClass('selected');
        $(this).addClass('selected');
        if($(this).hasClass('selected')){
            chosenRequest.CODE = $('.dataCode',this).text();
            chosenRequest.U_GROUP = $('.dataGroup',this).text();
            chosenRequest.NAME = $('.dataName',this).text();
        }
    }catch(error){
        console.log(error);
    }

})

//Add Item to Pending Request Items
$(document).on('click','.addToRequest',function(){
    try{
        const pendingTable = $(this).attr('for');
        const disp= {
            CODE:chosenRequest.CODE,
            U_GROUP: chosenRequest.U_GROUP,
            NAME:chosenRequest.NAME
        }
        if(disp.CODE){
            container.push(disp);
        }
        $(`#${pendingTable}`).html('');
        container.map((c) => (
            $(`#${pendingTable}`).append(`
                <tr class="pendingList text-wrap">
                    <td class="pendingCode">${c.CODE}</td>
                    <td class="pendingGroup">${c.U_GROUP}</td>
                    <td clas="pendingName text-break">${c.NAME}</td>
                </tr>
            `)
        ))
        resetChosenRequest();
    }catch(error){
        console.log(error);
    }
});

//Choose an item on the pending list
$(document).on('click','.pendingList',function(){
    try{
        index = container.map((c)=>(c.CODE)).indexOf($('.pendingCode',this).text());
        console.log(index);
    }catch(error){
        console.log(error);
    }
})


//Remove an item on the pending item list
$(document).on('click','.removeRequest',function(){
    try{
        if(index >=0){
            const pendingTable = $(this).attr('for');
            container.splice(index,1);
            console.log(container);
            $(`#${pendingTable}`).html('');
            container.map((c) => (
                $(`#${pendingTable}`).append(`
                    <tr class="pendingList text-wrap">
                        <td class="pendingCode">${c.CODE}</td>
                        <td class="pendingGroup">${c.U_GROUP}</td>
                        <td clas="pendingName text-break">${c.NAME}</td>
                    </tr>
                `)
            ))
            index = -1;
            $('#searchPendingMedicine').val('');
            $('#searchPendingProc').val('');
        }
 
    }catch(error){
        console.log(error);
    }
})

//Watch search pending medicine input
$(document).on('keyup keydown', '#searchPendingMedicine',function(){
    searchPending($('#searchPendingMedicine').val(),'MED');
    index=-1;
})

//Watch search pending procedure input
$(document).on('keyup keydown', '#searchPendingProc',function(){
    searchPending($('#searchPendingProc').val(),'PRC');
    index=-1;
})


//Request Modal Functionalities
async function getRequestList(type1,type2,search){
    try{
        const {requestList} = await $.ajax({
            url:`/selectrequest?type1=${type1}&type2=${type2}&search=${search ? search : ''}`,
            method:'GET'
        });
        return requestList ? requestList : '';
    }catch(error){
        console.log(error);
    }
   
}

//Reset Variables
function resetAll(){
    container = [];
    chosenRequest.CODE='';
    chosenRequest.U_GROUP='';
    chosenRequest.NAME='';
    $('#searchRequestList').val('');
    $('#searchMedicinceList').val('');
    $('#pendingPrc').html('');
    $('#pendingMedicine').html('');
    $('#prcTable').html('');
    $('#mdcnTable').html('');
}

//Reset Request Object
function resetChosenRequest(){
    chosenRequest.CODE='';
    chosenRequest.U_GROUP='';
    chosenRequest.NAME='';
}

//use debounce for searching an item
const useDebounce = debounce(async (search,type1,type2) => {
    const searched = await getRequestList(type1,type2,search);
    if(searched){
        fillTable(type1,searched);
    }
    
})  

//Set Debounce Delay
function debounce(cb, delay = 500) {
    let timeout
    return (...args) => {
        clearTimeout(timeout)
        timeout = setTimeout(() => {
        cb(...args)
        }, delay)
    }
};

//Append or Show searched data on specific request table
function fillTable(type,searchedResult){
    let table = '';

    switch (type){
        case 'MED':table = 'mdcnTable' ;break;
        case 'PRC':table = 'prcTable' ;break;
    }

    if(searchedResult){
        $(`#${table}`).html('');
        if( searchedResult.length > 0){
            searchedResult.map((p)=>{
                return ($(`#${table}`).append( 
                    `<tr class="listData text-wrap">
                        <td class="dataCode">${p.CODE}</td>
                        <td class="dataGroup">${p.U_GROUP}</td>
                        <td class="dataName text-wrap text-break">${p.NAME}</td>
                    </tr>
                    `
                ))
            })
        }else{
            $(`#${table}`).append( 
                `<tr class="">
                    <td colspan="3" class="text-center">No Result Found</td>
                </tr>
                `
            )
        }
       
        
    }

}


//Filter Pending Request items
function searchPending(search,type){
    let table = '';
    switch(type){
        case 'PRC': 
            table = 'pendingPrc';
        break;
        case 'MED': 
            table = 'pendingMedicine';
        break;
    }
    $(`#${table}`).html('');
        container.map((p)=>{
            const upperedCode = p.CODE.toUpperCase();
            const upperedGroup = p.U_GROUP.toUpperCase();
            const upperedName = p.NAME.toUpperCase();
            const fields = upperedCode+' '+upperedGroup+' '+upperedName;
            if(fields.includes(search.toUpperCase()))
            {   return ($(`#${table}`).append( 
                    `<tr class="pendingList text-wrap">
                        <td class="pendingCode">${p.CODE}</td>
                        <td class="pendingGroup">${p.U_GROUP}</td>
                        <td class="pendingName text-break">${p.NAME}</td>
                    </tr>
                    `
                ))
            }
         })
}
//End