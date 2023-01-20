// ADDED BY MDC 1/5/2022
var dtToday = new Date();

var month = dtToday.getMonth() + 1;
var day = dtToday.getDate();
var year = dtToday.getFullYear();
if (month < 10)
    month = '0' + month.toString();
if (day < 10)
    day = '0' + day.toString();

var maxDate = year + '-' + month + '-' + day;
$('#endDate1').attr('max', maxDate);
$('#startDate1').attr('max', maxDate);


$("#startDate1").click(function () {
    // calculatetotal();
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if (month < 10)
        month = '0' + month.toString();
    if (day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;

    $('#endDate1').attr('max', maxDate);
    $('#startDate1').attr('max', maxDate);
});

$("#endDate1").click(function () {
var dtToday = new Date();

var month = dtToday.getMonth() + 1;
var day = dtToday.getDate();
var year = dtToday.getFullYear();
if (month < 10)
    month = '0' + month.toString();
if (day < 10)
    day = '0' + day.toString();
var x = document.getElementById("startDate1").value;
var maxDate = year + '-' + month + '-' + day;
$('#endDate1').attr('min', x);
$('#endDate1').attr('max', maxDate);
$('#startDate1').attr('max', maxDate);
});
// calculatetotal();

// END DATE FUNCTION

// START FUNCTIONS OF LOGBOOK

//Additional validation for filtering MGC 01/16/2023

// $(document).on('change','#endDate1', function (){

//     // $('#endDate1').attr('disabled',false);
//   alert('test1');


// })




// START FUNCTIONS OF LOGBOOK

$(document).on('click', '#logbook_report_printbtn', function () {
    var $start = $('#startDate1').val();
    var $end = $('#endDate1').val();



    // $(".printlogbook").printThis();

    if ($start == '') {
        alert('please select date !!');
    } else {
        alert('May Tama ka!!')
        $(".printlogbook").printThis();
    }

});
$(document).on('click', '#logbook_report_pdfbtn', function () {
    $start = $('#startDate1').val();
    $end = $('#endDate1').val();


    window.location.href = "/report/logbook/pdf/" + $start + "/" + $end;


});
$(document).on('click', '#logbook_report_excelbtn', function () {
    $start = $('#startDate1').val();
    $end = $('#endDate1').val();


    window.location.href = "/report/logbook/excel/" + $start + "/" + $end;

});
// END FUNCTIONS OF LOGBOOK

//    START FUNCTIONS OF REPORTS INPATIENT CASE
$(document).on('click','#admission_report_printbtn',function () {
    $('.printadmission').printThis();

        })


$(document).on('click','#admission_report_pdfbtn',function () {
    $start = $('#startDate1').val();
    $end = $('#endDate1').val();
    $doctor = $('#doctor').val();
    if ($doctor == " ") {
        $doctor = "all";
        window.location.href = "/report/admissionlist/pdf/" + $start + "/" + $end + "/" + $doctor;
    }
    else {
        window.location.href = "/report/admissionlist/pdf/" + $start + "/" + $end + "/" + $doctor;
    }

});
$(document).on('click','#admission_report_excelbtn',function () {
    $start = $('#startDate1').val();
    $end = $('#endDate1').val();
    $doctor = $('#doctor').val();

    if ($doctor == " ") {
        $doctor = "all";
        window.location.href = "/report/admissionlist/excel/" + $start + "/" + $end + "/" + $doctor;
    }
    else {
        window.location.href = "/report/admissionlist/excel/" + $start + "/" + $end + "/" + $doctor;
    }

})

// END FUNCTIONS OF REPORTS INPATIENT CASE

// START FUNCTIONS OF REPORTS OUTPATIENT CASE

$(document).on('click','#outpatient_report_printbtn',function () {

    $('.printoutpatient').printThis();
});
$(document).on('click','#outpatient_report_pdfbtn',function () {
    $start = $('#startDate1').val();
    $end = $('#endDate1').val();
    $doctor = $('#doctor').val();
    if ($doctor == " ") {
        $doctor = "all";
        window.location.href = "/report/outpatientcase/pdf/" + $start + "/" + $end + "/" + $doctor;
    }
    else {
        window.location.href = "/report/outpatientcase/pdf/" + $start + "/" + $end + "/" + $doctor;
    }

});

$(document).on('click','#outpatient_report_excelbtn',function () {
    $start = $('#startDate1').val();
    $end = $('#endDate1').val();
    $doctor = $('#doctor').val();

    if ($doctor == " ") {
        $doctor = "all";
        window.location.href = "/report/outpatientcase/excel/" + $start + "/" + $end + "/" + $doctor;
    }
    else {
        window.location.href = "/report/outpatientcase/excel/" + $start + "/" + $end + "/" + $doctor;
    }

})
