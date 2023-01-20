
 let inTarget = '';
 let formData = {
     userEmail:"",
     userName:"",
     roles:""
 }
 let valid = false;
 let isMatch = false;
 let isFocused = false;

 const regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)]*$/;
//get id of focused field

 $(document).on('focus','.reg-fields',function (){
     inTarget = $(this)[0].id;
     isFocused = true;
 })

//  debounce function
 function debounce(cb, delay = 300) {
     let timeout
     return (...args) => {
         clearTimeout(timeout)
         timeout = setTimeout(() => {
         cb(...args)
         }, delay)
     }
 };
 //use debounce function
 const updateDebounce = debounce((email) => {
    if(email.match(regex)){
        $('#emailValid').attr('hidden','hidden');
        $('#emailValid').empty();
        isMatch = true;
    }
    else{
        if($('#emailValid').children().length == 0 && formData.userEmail){
            $('#emailValid').removeAttr('hidden');
            $('#emailValid').append(`
            <div class="col-md-4"></div>
            <div class="text-danger col-md-6">Email Format is Invalid</div>
        `)
        }
        isMatch = false;
    }
    console.log(isMatch);
     debounceEmail= email;
     service(debounceEmail);
 });

 //detect field keyup event or type event
$(document).on('keyup change',inTarget,async function(e){
  if (isFocused){
    try{
        formData = {
            ...formData,
            [inTarget]:$(`#${inTarget}`).val(),
        }
        if(inTarget == 'userEmail'){
            if(!formData.userEmail){
                $('#emailValid').attr('hidden','hidden');
                $('#emailValid').empty();
            }
            updateDebounce(formData.userEmail);
        }
        console.log(formData);
        checkRegisterValue();
    }   
    catch(error){
        console.log(error);
    }
  }
})
 
//remove focus on field upon alt+tab
 $(document).on('keydown',inTarget&&`#${inTarget}`,async function(e){
     if(e.altKey || e.tabKey){ 
        inTarget&&$("#"+inTarget).blur();
        inTarget='';
        isFocused = false;
     }
 })


 //checkdata from database
 async function service(email){
     try{
         const {isExisting} = await $.ajax({url:`/api/checkemail?email=${email}`});
         if(isExisting &&  $('#emailExists').children().length == 0){
             valid=false
             $('#emailExists').removeAttr('hidden');
             $('#emailExists').append(`
                    <div class="col-md-4"></div>
                    <div class="text-danger col-md-6">Email Already Exists</div>
            `);
         }
         if(!isExisting){
             valid = true;
             $('#emailExists').attr('hidden','hidden');
             $('#emailExists').empty();
            
         }
         checkRegisterValue();
     }
     catch(error){
         console.log(error);
     }
 }  

 //check if all requirements are met
 function checkRegisterValue(){
     if(formData.userName && formData.userEmail && formData.roles && valid && isMatch){
         $('#regButton').attr('disabled',false);
     }else{
         $('#regButton').attr('disabled',true);
     }
 }
