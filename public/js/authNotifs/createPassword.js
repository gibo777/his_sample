$(document).on('submit','#registerPassword',async function(e){
    try{
        e.preventDefault();
        const data = {
            token:$('#createPassToken').val(),
            username:$('#createPassUsername').val(),
            email:$('#createPassEmail').val(),
            password:$('#password').val(),
            password_confirmation: $('#repPassword').val()
        }
        Swal.fire({
            icon:'info',
            title:`Processing Please Wait.`,
            showConfirmButton: false,
            allowOutsideClick: false,
        });
        const result = await $.ajax({url:'/createpassword',method:'POST',data:data});
        if(result){
            console.log(result);
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
                    title:JSON.stringify(result.message),
                })
            }
        }
    }catch(error){
        swal.close();
        Swal.fire({
            icon:'error',
            title:'Something went Wrong',
        })
    }
    
})