//Start Christopher Napoles 12/12/2022
let currentTarget = '';
let fieldData = {
    password:'',
    repPassword:'',
}
let isValid = false;
let isMatched = false;
let strengthChecker = [];
//Validation condition
const format = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))((?=.*[a-z])(?=.*[0-9]))((?=.*[A-Z])(?=.*[0-9])))(?=.{8,})(?=.*[\\W_])");

//Format Dictionary
const comparison = [
    {
        regex: new RegExp("^((?=.*[0-9]))"),
        idname: 'numeric',
        tagName: 'numTag'
    },
    {
        regex: new RegExp("^(?=.*[A-Z])"),
        idname: 'upper',
        tagName: 'upperTag'
    },
    {
        regex: new RegExp('^(?=.*[a-z])'),
        idname: 'lower',
        tagName: 'lowerTag'
    },
    {
        regex: new RegExp('(?=.{8,})'),
        idname: 'charLength',
        tagName: 'charTag'
    },
    {
        regex: new RegExp("(?=.*[\\W_])"),
        idname:'special',
        tagName:'specialTag'
    }
   
];

//Get Id of each Field
$(document).on('focus','.create-pass-fields',function (){
    currentTarget = $(this)[0].id;
})

//Validate Password Fields
$(document).on('keyup',currentTarget,function(evt){
    try{
        fieldData = {
            ...fieldData,
            [currentTarget]:$(`#${currentTarget}`).val(),
        }
     
        comparison.map((c)=>{
            if (fieldData.password.match(c.regex)){
                $(`#${c.idname}`).addClass('text-success');
                $(`#${c.idname}`).removeClass('text-danger');
                $(`#${c.tagName}`).html('<span class="bg-success rounded-circle text-white">✓</span>');
                if (strengthChecker.indexOf(c.idname)==-1){
                    strengthChecker.push(c.idname);
                }
                checkStrength();
            }
            else{
                $(`#${c.idname}`).addClass('text-danger');
                $(`#${c.idname}`).removeClass('text-success');
                $(`#${c.tagName}`).html('<span class="bg-danger rounded-circle text-white">✖</span>');
                const index = strengthChecker.indexOf(c.idname);
                if(index !=-1){
                    strengthChecker.splice(index,1);
                }
                checkStrength();
            }
            if(!fieldData.password){
                $(`#${c.idname}`).removeClass('text-success');
                $(`#${c.idname}`).removeClass('text-danger');
                $(`#${c.tagName}`).empty();
            }
        })
        if(fieldData.password.match(format)){
            isValid = true;
            $('#passwordContainer').addClass('shadow-border');
            $('#password').addClass('border-success');
            
        }
        else{
            isValid = false; 
            $('#passwordContainer').removeClass('shadow-border');
            $('#password').removeClass('border-success');
        }
    
        if((fieldData.password == fieldData.repPassword)){
            isMatched = true;
            $('#repPasswordContainer').addClass('shadow-border');
            $('#repPassword').addClass('border-success');
            
        }
        else{
            isMatched = false;
            $('#repPasswordContainer').removeClass('shadow-border');
            $('#repPassword').removeClass('border-success');
        }
        // if(fieldData.password){
        //     $('#passError').css('display','block');
        // }else{
        //     $('#passError').css('display','none');
        // }
        checkValues();
    }
    catch(error){
        console.log(error);
    }
})

//Check Values of each field
function checkValues () {
    if(isMatched){
        $('#notMatch').css('display','none');
        if(isValid){
            $('#createPassword').prop('disabled', false);
        }
    }
    else{
        if(fieldData.repPassword && fieldData.password){
            $('#notMatch').css('display','block');
            $('#notMatch').addClass('text-danger');
        }else{
            $('#notMatch').css('display','none');
        }
        $('#createPassword').prop('disabled', true);
    }
}

//Check the Password Strength
function checkStrength(){
    if (fieldData.password){
        if (strengthChecker.length >= 5){
            $('#strength').css('width','100%');
            $('#strength').html('Very Strong');
            $('#strength').removeClass('bg-danger');
            $('#strength').addClass('bg-success');
        } else if(strengthChecker.length >= 3 ){
            $('#strength').css('width','75%');
            $('#strength').html('Weak')
            $('#strength').removeClass('bg-success');
            $('#strength').addClass('bg-danger');
    
        }else if (strengthChecker.length > 1){
            $('#strength').css('width','50%');
            $('#strength').html('Weak');
            $('#strength').removeClass('bg-success');
            $('#strength').addClass('bg-danger');
        }else if(strengthChecker.length == 1){
            $('#strength').css('width','25%');
            $('#strength').html('Weak');
            $('#strength').removeClass('bg-success');
            $('#strength').addClass('bg-danger');
        }else{
            $('#strength').css('width','0%');
            $('#strength').html('Weak');
            $('#strength').removeClass('bg-success');
            $('#strength').addClass('bg-danger');
        }
        
    }else{
        $('#strength').css('width','0%');
        $('#strength').html('Weak')
    }
  
    return;
}
//End