
let parent = '';
let visibilityChecker = [];

$(document).on('click','#userGroupAuthTabs',async function(){
    parent = $(this).text();
    $('.authTabs').removeClass('active');
    $(this).addClass('active');
    // $('.visibility').prop('disabled',true);
    // $(this).prop('disabled',false);

   
    (parent && $('#userGroupAuthName').val()) && await setTable();
});

$(document).on('click','.visibility',function(e){

    if($(this).attr('isparent') =='true'){
        if(e.target.checked == false){
            $('.visibility').prop('checked',false);
        }else{
            $('.visibility').prop('checked',true);
        }
        return;
    }
    if(e.target.checked){
        $('.visibility')[0].checked = true;
        visibilityChecker = [];
    }else{
        visibilityChecker = [];
        for(let i =1; i < $('.visibility').length ; i++){
            if($('.visibility')[i].checked == true){
                visibilityChecker.push(true);
            }
        }
        if(!visibilityChecker.includes(true)){
            $('.visibility')[0].checked=false;
        }  
    }
});

$(document).on('change','.access',function(){
    // console.log($(this).val());
    if ($(this).attr('isparent') == 'true'){
        // console.log($(this).val());
        if($(this).val() == 'R'){
            $('.access').html(`
                <option value="R">Read Access</option>
                <option value="F">Full Access</option>
            `)
        }else{
            $('.access').html(`
                <option value="F">Full Access</option>
                <option value="R">Read Access</option>
            `)
        }
        return;        
    }
    
    if($(this).val() == 'R'){
        $('.access')[0].value = 'R';
    }
});

$(document).on('change','#userGroupAuthName',async function(){

    ($('#userGroupAuthName').val() && parent)? 
        await setTable()
    : 
        $('#userGroupAuthTable').html('');
})

$(document).on('click','#saveUserGroupAuth',async function(){
    try{
        let data = [];
        let authPermission = {};
        for (let i = 0 ; i < $('.visibility').length ; i++){
            data.push(authPermission ={
                ...authPermission,
                USERID:$('#userGroupAuthName').val(),
                ITEMID:$('.access')[i].getAttribute('itemid'),
                MENUCMD:$('.access')[i].getAttribute('menucmd'),
                AUTHTYPE:$('.access')[i].value,
                VISIBLE:$('.visibility')[i].checked ? 1 : 0,
                NE_ADDONID:$('#userGroupAuthMenuId').val(),
                MENUTYPE:$('.access')[i].getAttribute('menutype'),
                MENUID:$('.access')[i].getAttribute('menuid'),
                MENUNAME:$('.menuName')[i].innerText,
            });
        }
        // console.log(data);
        const result = await $.ajax({url:'/setauthaccess',method:'POST',data:{data}})
        if(result){
            console.log(result);
            const {success} = result;
            if(success){
                Swal.fire({
                    icon:'success',
                    title:'Authorization Completed',
                })
            }
        }
    
   
    }catch(error){
        console.log(error);
    }
   
})

async function setTable(){
    try{
        $('#userGroupAuthTable').html(`
        <tr>
            <td colspan="3">${loading}</td>
        </tr>
        `);
        let visibilityContainer = [];
        let accessContainer = [];
        const result = $('#userGroupAuthName').val() ? await $.ajax({url:`/getauthpages?parent=${parent}&userId=${$('#userGroupAuthName').val()}`,method:'GET'}) : '';
        if(result){
            const {success,pages,accesses} = result;
            pages.map((p,index)=>{
                accesses.map((a)=>{
                    if(p.itemid == a.ITEMID && a.VISIBLE == 1){
                        visibilityContainer.push(index);
                    }
                    if(p.itemid == a.ITEMID && a.AUTHTYPE== 'R'){
                        accessContainer.push(index);
                    }
                })
            })
            // console.log(accesses);
            // console.log(pages);
            // console.log(visibilityContainer);
            if(success){
                $('#userGroupAuthTable').html(``);
                pages.map((p)=>(
                    $('#userGroupAuthTable').append(
                        `
                            <tr>
                                <td class="text-start">
                                ${
                                    p.parent ?` <b class="menuName">${p.pi_menu}</b>` : `<span class="menuName">&nbsp;&nbsp;${p.pi_menu}</span>`
                                }
                                </td>
                                <td>
                                    <select name="" id="" class="border-radius-25 access" isparent="${p.parent ? true : false}" itemid="${p.itemid}" menucmd="${p.menucmd}" menutype="${p.menutype}" menuid="${p.menuid}">
                                        <option value="F">Full Access</option>
                                        <option value="R">Read Access</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="checkbox" name="" id="" class="visibility" isparent="${p.parent ? true : false}">&nbsp;
                                    <label for="">Visible</label>&nbsp;
                                </td>
                            </tr>
                    
                        `
                    )
                ))
                for(let i = 0 ; i<visibilityContainer.length; i++){
                    $('.visibility')[visibilityContainer[i]].setAttribute('checked');
                }
                for(let i = 0 ; i<accessContainer.length; i++){
                    $('.access')[accessContainer[i]].value = 'R';
                    // $('.access')[accessContainer[i]].append('<option value="R">Read Access</option>');
                    // console.log($('.access')[accessContainer[i]])
                }
            }else{
                
                $('#userGroupAuthTable').html('');
            }
            
        }else{
            $('#userGroupAuthTable').html('');
        }
    }catch(error){
        console.log(error);
    }
}