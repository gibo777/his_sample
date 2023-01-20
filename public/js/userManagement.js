$(document).on('click', '#registerUser', function(){
    $('#registerUserModal').modal('show');
});

async function userList(userID){
    try{
        $('#userInformationModal').modal('show')

    }catch(error){
        console.log(error);
    }
  
};