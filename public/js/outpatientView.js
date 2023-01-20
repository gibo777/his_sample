let outList;
async function outpatientRecord(outpatientId) {



	try {
		$("#main").html(loading);
		outList = $('#contentContainer')[0].innerHTML;
		const result = await $.ajax({ url: `/outpatient/outpatientlist/information/${outpatientId}` });
		if (result) {
			var doc = new DOMParser().parseFromString(result, "text/html");
			$("#main").html(doc.getElementById("contentContainer"));
			window.livewire.rescan();
			history.pushState({ path: `/outpatient/outpatientlist/information/${outpatientId}` }, `Selected: ${outpatientId}`, `/outpatient/outpatientlist/information/${outpatientId}`);
			jQuery.event.trigger('opEvent', []);
			if ($("#outpatientViewPInfo").val() != "F") {
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

	if (path.includes("/outpatient/outpatientlist/information")) {
		if ($("#outpatientViewPInfo").val() != "F") {
			console.log($("#outpatientViewPInfo").val());
			$("#patientInformationUpdateForm :input").css("pointer-events", "none");
			$("#patientInformationUpdateForm a").css("pointer-events", "none");
		}
	}



});