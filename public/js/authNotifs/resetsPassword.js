$(document).on('submit','#resetPasswordForm',async function(e){
    try{
        e.preventDefault();

        const data = {
            email:$('#resetPasswordEmail').attr('content'),
            password:$('#password').val(),
            password_confirmation:$('#repPassword').val(),
            token:$('#requestToken').val(),
        }
        Swal.fire({
            icon:'info',
            title:`Processing...`,
            showConfirmButton: false,
            allowOutsideClick: false,
        });
        const result = await $.ajax({url:'/password/reset',method:'POST',data:data});
        if (result){
            if(result.success){
                swal.close();
                Swal.fire({
                    icon:'success',
                    title:result.message,
                }).then(()=>{
                    window.location.href = '/';
                });
            }else{
                swal.close();
                Swal.fire({
                    icon:'error',
                    title:result.message ? result.message
                     : JSON.stringify(result.errors),
                });
            }
           
        }
    }catch(error){
        swal.close();
        Swal.fire({
            icon:'error',
            title:'Something Went Wrong'
        });
        console.log(error);
    }
})