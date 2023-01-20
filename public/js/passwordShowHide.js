// $(document).ready(function(){
//     const togglePassword = document.querySelector('#togglePassword');
//     const password = document.querySelector('#password');

//     togglePassword.addEventListener('click', function (e) {
//         // toggle the type attribute
//         const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
//         password.setAttribute('type', type);
//         // toggle the eye slash icon
//         this.classList.toggle('fa-eye-slash');
//     });
// });
$(document).ready(function(){
    $("#eye_view").on('click', function(e) {

        var x = $("#password");
        var show_eye = $("#show_eye");
        var hide_eye = $("#hide_eye");
        if (x.prop('type') === "password") {
            x.prop('type','text');
            show_eye.addClass("d-none");
            hide_eye.removeClass("d-none");
        } else {
            x.prop('type','password');
            show_eye.removeClass("d-none");
            hide_eye.addClass("d-none");
        }
    // return false;
    });
});
// });
$(document).ready(function(){
    $("#eye_view_2").on('click', function(e) {

        var x = $("#repPassword");
        var show_eye = $("#show_eye_2");
        var hide_eye = $("#hide_eye_2");
        if (x.prop('type') === "password") {
            x.prop('type','text');
            show_eye.addClass("d-none");
            hide_eye.removeClass("d-none");
        } else {
            x.prop('type','password');
            show_eye.removeClass("d-none");
            hide_eye.addClass("d-none");
        }
    // return false;
    });
});