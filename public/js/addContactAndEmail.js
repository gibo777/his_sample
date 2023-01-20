// $(document).ready(function() {

// });

// $(document).ready(function(){
//     var values = Array.from(document.getElementById("contactType").options).map(e => e.value);
//     document.getElementById("contactList").innerHTML = values;
// });



$(document).on('click', '.addContact', function (e) {
    try {
        var contactValues = [];
        let values = [];
        let contacts = [];
        values = $("#contactType0 option");

        for (let i = 0; i < values.length; i++) {
            if (!(contactValues.includes($(values[i]).val()))) {
                contactValues[i] = $(values[i]).val();
            }
        }
        console.log(contactValues);
        var contactCount = $('.contactList').length;
        // console.log(contactCount);
        if (contactValues[0] == "") {
            delete contactValues[0];
        }
        newRowAdd = `<div class="contactList">
            <div class="row" id="contactRow${contactCount}">
                <div class="col-size-1 ">
                    <label for="">Contact Type <span class="text-danger">*</span></label>
                    <select name="contact_type" id="contactType${contactCount}" class="border-radius-25 p-input-size-1 d-block contactType">
                        <option value="">--Select Type--</option>
                        ${contactValues.map((c) => (
            `<option value="${c}">${c}</option>`
        ))}
                    </select>
                </div>
                <div class="col-size-1 ">
                    <label for="">Contact Number <span class="text-danger">*</span> </label>
                    <input type="text" id="contactNumber${contactCount}" name="contact_no"
                        class="border-radius-25 p-input-size-1 d-block" value="" placeholder="">
                </div>
                <div class="col-size-1 ">
                    <label for="">Note </label>
                    <input type="text" id="contactNote${contactCount}" name="contact_notes"
                        class="border-radius-25 p-input-size-1 d-block" value="" placeholder="">
                </div>
                <div class="col-size-1" hidden>
                    <label for="">Note </label>
                    <input type="text" name="contact_id"
                        class="border-radius-25 p-input-size-1 d-block" value="" placeholder="">
                </div>
                <div class="col align-self-end ">
                    <a type="button" class="addContact" id=""><i class="fa-regular fa-square-plus fs-3"></i></a>
                </div>
            </div>
        </div>`;

        $('#contactDiv').append(newRowAdd);
        contacts = $(".contactType");
        console.log(contacts.length);


        addContact = $('.addContact');
        // console.log(addContact);
        for (var i = 0; i < addContact.length; i++) {
            if (i != (addContact.length - 1)) {
                // addContact.setAttribute("hidden", "addContact")
                // console.log(addContact[i]);
                $(addContact[i]).prop('hidden', true);
            }
        }
        // console.log(addContact);
        // if(`#contactRow${contactCount}` != contactCount){
        //     document.getElementsByClassName('addContact').setAttribute("hidden", "addContact")
        // }


        // console.log(`#contactRow${contactCount}`);
        // console.log(contactCount);

    } catch (error) {
        console.log(error);
    }

});


$(document).on('click', '.addEmail', function (e) {
    try {

        var contactValues = [];
        let values = [];
        let contacts = [];
        values = $("#emailType option");

        for (let i = 0; i < values.length; i++) {
            if (!(contactValues.includes($(values[i]).val()))) {
                contactValues[i] = $(values[i]).val();
            }
        }
        console.log(contactValues);
        var contactCount = $('.contactList').length;
        // console.log(contactCount);
        if (contactValues[0] == "") {
            delete contactValues[0];
        }
        // var values = $("#emailType option").map(function () {
        //     return this.value;
        // }).get();
        // delete values[0];
        // console.log(values);
        var emailCount = $('.emailList').length;

        newRowAdd = `<div class="emailList">
        <div class="row" id="emailRow${emailCount}">
            <div class="col-size-1">
                <label for="emailType_1">Email Type <span class="text-danger">*</span></label>
                <select id="emailType${emailCount}" name="email-type"
                    class="border-radius-25 p-input-size-1 d-block">
                        <option value="">--Select Type--</option>
                        ${contactValues.map((c) => (
            `<option value="${c}">${c}</option>`
        ))}
                    </select>
            </div>
            <div class="col-size-1 ">
                <label for="">Email Address <span class="text-danger">*</span></label>
                <input type="text" id="emailAddress${emailCount}" name="email"
                    class="border-radius-25 p-input-size-1 d-block" value=""
                    placeholder="">
            </div>
            <div class="col-size-1 ">
                <label for="">Note </label>
                <input type="text" id="emailNote${emailCount}" name="email-notes"
                    class="border-radius-25 p-input-size-1 d-block" value=""
                    placeholder="">
            </div>
            <div class="col-size-1" hidden>
                <input type="text" name="email_id"
                    class="border-radius-25 p-input-size-1 d-block" value="" placeholder="">
            </div>
            <div class="col align-self-end">
                    <a type="button" class="addEmail" id=""><i class="fa-regular fa-square-plus fs-3"></i></a>
            </div>
        </div>
    </div>`;

        $('#emailDiv').append(newRowAdd);
        var addEmail = [];
        addEmail = $('.addEmail');
        // console.log(addContact);
        for (var i = 0; i < addEmail.length; i++) {
            if (i != (addEmail.length - 1)) {
                // addContact.setAttribute("hidden", "addContact")
                // console.log(addContact[i]);
                $(addEmail[i]).prop('hidden', true);
            }
        }
        // console.log(addContact);
        // if(`#contactRow${contactCount}` != contactCount){
        //     document.getElementsByClassName('addContact').setAttribute("hidden", "addContact")
        // }

        console.log(`#emailRow${emailCount}`);
        console.log(emailCount);

    } catch (error) {
        console.log(error);
    }

});