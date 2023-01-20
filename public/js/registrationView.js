let regList;
let patientID = "";
let adminViewPatientType = "";
async function viewRecord(patientId) {
	try {
		patientID = patientId;
		let role = $("#addPatient i").attr("id");
		// console.log(role);

		if ($("#restrictionViewing").val() == "F") {
			if ((role == 'Admin') || (role == 'Super Admin') || (role == 'Triage')) {
				$("#patientTypeModalExist").modal("show");
			} else {
				loadPatient(role);
			}
		} else {
			loadPatient("Viewing");
			// $("#patientInformationUpdateForm :input").css("pointer-events", "none");
		}



		// $("#main").html(loading);
		// regList = $('#contentContainer')[0].innerHTML;
		// const result = await $.ajax({ url: `/registration/information/${patientId}` });
		// if (result) {
		// 	var doc = new DOMParser().parseFromString(result, "text/html");
		// 	$("#main").html(doc.getElementById("contentContainer"));
		// 	window.livewire.rescan();
		// 	history.pushState({ path: `/registration/information/${patientId}` }, `Selected: ${patientId}`, `/registration/information/${patientId}`);
		// 	jQuery.event.trigger('registerEvent', []);
		// }
	}
	catch (error) {
		$("#main").html(errorScreen(error));
	}
}

$(document).on('click', '#addPatient', async function () {
	try {
		if ($('#addPatient').attr('rights') != 'F') {
			frontendCheckUserRights();
			return;
		}
		let role = $("#addPatient i").attr("id");
		// console.log(role);
		if ((role == 'Admin') || (role == 'Super Admin') || (role == 'Triage')) {
			$("#patientTypeModal").modal("show");
		} else {
			loadAddPage(role);

		}

	}
	catch (error) {
		$("#main").html(errorScreen(error));
	}
});

$(document).on('click', '#inpatient-type-reg', function () {
	loadAddPage("Inpatient")

})
$(document).on('click', '#outpatient-type-reg', function () {
	loadAddPage("Outpatient")

})


// Start Modal Patient Type KLA - 01032023
$(document).on('click', '#inpatient-type-update', function () {
	loadPatient("Inpatient")

})
$(document).on('click', '#outpatient-type-update', function () {
	loadPatient("Outpatient")

})
// end

// Start Load Patient Info -KLA -01032023
async function loadPatient(type) {
	$("#patientTypeModalExist").modal("hide");

	if ($("#restrictionViewing").val() != "F") {
		$("#patientInformationUpdateForm :input").css("pointer-events", "none");
		$("#patientInformationUpdateForm a").css("pointer-events", "none");
	}
	adminViewPatientType = type;
	try {
		$("#main").html(loading);
		regList = $('#contentContainer')[0].innerHTML;
		const result = await $.ajax({ url: `/registration/information/${patientID}?type=${type}` });
		if (result) {
			var doc = new DOMParser().parseFromString(result, "text/html");
			$("#main").html(doc.getElementById("contentContainer"));
			window.livewire.rescan();
			history.pushState({ path: `/registration/information/${patientID}` }, `Selected: ${patientID}`, `/registration/information/${patientID}`);
			jQuery.event.trigger('registerEvent', []);
		}



		// console.log($("#patientInformationUpdateForm :input"))

	} catch (error) {
		$("#main").html(errorScreen(error));
	}
}
// end

async function loadAddPage(type) {
	$("#patientTypeModal").modal("hide");
	try {
		console.log(type);
		$("#main").html(loading);
		const result = await $.ajax({ url: `registration/addnewpatient/${type}`, headers: { source: 'rest-api' } });
		if (result) {
			if (result == 'Unauthorized') {
				window.location.href = '/';
			} else {
				var doc = new DOMParser().parseFromString(result, "text/html");
				$("#contentContainer").html(doc.getElementById('contentContainer'));
				history.pushState({ path: `/registration/addnewpatient/${type}` }, `Selected: `, `registration/addnewpatient/${type}`);
				// console.log(document.getElementById("visit-type-reg"));
				$("#bday").change(function () {
					var e = document.getElementById("bday").value,
						t = new Date(e);
					if (t > new Date())
						showALertModal(
							"warning",
							"Entered Date is Greater than Current Date",
							secondMsg
						),
							(document.getElementById("bday").value = "");
					else {
						var a = Date.now() - t.getTime(),
							i = new Date(a).getUTCFullYear(),
							n = Math.abs(i - 1970);
						document.getElementById("age").value = n;
					}
				})
			}

		}
	} catch (error) {

	}
}

$(document).ready(function () {
	let path = window.location.pathname;


	if (path.includes("registration/information")) {
		if ($("#restrictionViewRecord").val() != "F") {
			// console.log("asd");
			console.log($("#restrictionViewRecord").val());
			$("#patientInformationUpdateForm :input").css("pointer-events", "none");
			$("#patientInformationUpdateForm a").css("pointer-events", "none");
		}
	}
});


$(document).on("keyup", "#reg-height-inches", function () {
	converterHIS($(this).val(), "centimeter", "reg-height-cm");
	bmiCalculator();

});
$(document).on("keyup", "#reg-height-cm", function () {
	converterHIS($(this).val(), "inches", "reg-height-inches");
	bmiCalculator();
});

$(document).on("keyup", "#reg-weight-kg", function () {
	converterHIS($(this).val(), "pounds", "reg-weight-lb");
	bmiCalculator();
	// bmiCalculator($("#reg-height-inches").val(), $(this).val());
});
$(document).on("keyup", "#reg-weight-lb", function () {
	converterHIS($(this).val(), "kilograms", "reg-weight-kg");

	bmiCalculator();
});

function bmiCalculator() {
	let bmi = parseFloat(($("#reg-weight-lb").val() / ($("#reg-height-inches").val() * $("#reg-height-inches").val())) * 703).toFixed(2);
	let bmiCategory = "";
	$("#reg-bmi").val(bmi);

	switch (true) {
		case ((bmi < 18.5) && (bmi > 0)):
			bmiCategory = "Underweight";
			break;
		case ((bmi >= 18.5) && (bmi <= 24.9)):
			bmiCategory = "Healthy Weight";
			break;
		case ((bmi >= 25.0) && (bmi <= 29.9)):
			bmiCategory = "Overweight";
			break;
		case (bmi >= 30.0):
			bmiCategory = "Obese";
			break;
		default:
			bmiCategory = "";

	}

	$("#reg-bmi-categ").val(bmiCategory);
}

function converterHIS(value, convertTo, idDestination) {
	let returnValue = "";
	switch (convertTo) {
		case "centimeter":
			returnValue = parseFloat(value / 0.39370).toFixed(2)
			$(`#${idDestination}`).val(returnValue);
			break;
		case "inches":
			returnValue = parseFloat(value * 0.39370).toFixed(2)
			$(`#${idDestination}`).val(returnValue);
			break;
		case "pounds":
			returnValue = parseFloat(value * 2.2046).toFixed(2)
			$(`#${idDestination}`).val(returnValue);
			break;
		case "kilograms":
			returnValue = parseFloat(value / 2.2046).toFixed(2)
			$(`#${idDestination}`).val(returnValue);
			break;
	}
	return;
}