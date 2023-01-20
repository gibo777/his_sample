
$(document).ready(function(){
    let inTarget = '';
    let formData = {
        email:'',
    }
    let valid = false;
    let isMatch = false;
    const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    $(document).on('focus','.log-fields',function (){
        inTarget = $(this)[0].id;
        console.log(inTarget)
    })

    $(document).on('keyup','#email',async function(){
        try{
            formData = {
                ...formData,
                [inTarget]:inTarget && $(`#${inTarget}`).val(),
            }
        }
        catch(error){
            console.log(error);
        }
    })
    if (formData.email.match(regex)){
        
    }
})
