$(document).on('submit','#sendPasswordResetEmailLink',function(e){
    resetPasswordRequest(e);
        
});

$(document).on('submit','#sendResetLink',function(e){
    resetPasswordRequest(e);
        
});

const resetPasswordRequest = async (e) => {
    try{
        e.preventDefault(e);
        const email = $('#emailToBeReset').val() ? $('#emailToBeReset').val() : $('#sendResetEmail').val();
        const data = {email:email}
        Swal.fire({
            icon:'info',
            title:`Processing...`,
            showConfirmButton: false,
            allowOutsideClick: false,
        });
        
        const result = await $.ajax({url:'/password/email', method:'POST',data:data});

        if(result){
            swal.close();
            const status = result.message == 'Email Has Been Sent' ? true : false;
            Swal.fire({
                icon:status?'success':'error',
                title:result.message,
            });
            console.log(result)
        }
    }catch(error){
        console.log(error);
    }
}