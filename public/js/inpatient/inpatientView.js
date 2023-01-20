let inList;
async function inpatientRecord(inpatientId) {
	if ($("#inpatientViewPInfo").val() == "F") {
		$("#patientInformationUpdateForm :input").css("pointer-events", "none");
		$("#patientInformationUpdateForm a").css("pointer-events", "none");
	}
	try {
		$("#main").html(loading);
		inList = $('#contentContainer')[0].innerHTML;
		const result = await $.ajax({ url: `/inpatient/inpatient-list/information/${inpatientId}` });
		if (result) {
			var doc = new DOMParser().parseFromString(result, "text/html");
			$("#main").html(doc.getElementById("contentContainer"));
			window.livewire.rescan();
			history.pushState({ path: `/inpatient/inpatient-list/information/${inpatientId}` }, `Selected: ${inpatientId}`, `/inpatient/inpatient-list/information/${inpatientId}`);
			jQuery.event.trigger('ipEvent', []);

			if ($("#inpatientViewPInfo").val() != "F") {
				$("#patientInformationUpdateForm :input").css("pointer-events", "none");
				$("#patientInformationUpdateForm a").css("pointer-events", "none");
			}
		}
	}

	catch (error) {
		$("#main").html(errorScreen(error));
	}
}

$(document).ready(function () {
	let path = window.location.pathname;
	if (path.includes("/inpatient/inpatient-list/information")) {
		if ($("#inpatientViewPInfo").val() != ("F") && null) {
			console.log($("#inpatientViewPInfo").val());
			$("#patientInformationUpdateForm :input").css("pointer-events", "none");
			$("#patientInformationUpdateForm a").css("pointer-events", "none");
		}
	}
});