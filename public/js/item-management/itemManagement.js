// For the Item Management Modal

$(document).on('click', '#addItems', function(){
    $('#itemManagementModal').modal('show');
    // HIDE
    $('#itemManagementModal').modal('hide');
});
$(document).on('click', '#registerItemBtn', function(){
    $('#itemConfirmationModal').modal('show');
    // HIDE
    $('#itemConfirmationModal').modal('hide');
    document.getElementById("headerNameOne").textContent="Confirm";
    document.getElementById("headerNameTwo").textContent="Item Registration";
});


// End
async function itemView(userID){
    try{
        $('#itemManagementInformationModal').modal('show');
        $(document).on('click', '#deactivateItemBtn', function(){
            $('#itemConfirmationModal').modal('show');
            // HIDE
            $('#itemConfirmationModal').modal('hide');
            document.getElementById("headerNameOne").textContent="Confirm";
            document.getElementById("headerNameTwo").textContent="Item Deactivation";
        });
        $(document).on('click', '#activateItemBtn', function(){
            $('#itemConfirmationModal').modal('show');
            // HIDE
            $('#itemConfirmationModal').modal('hide');
            document.getElementById("headerNameOne").textContent="Confirm";
            document.getElementById("headerNameTwo").textContent="Item Activation";
        });
        
    }catch(error){
        console.log(error);
    }
  
};

deactivateItemBtn