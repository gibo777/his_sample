// let userAuthoList;
// async function userAuthorizationList(userAuthorizationID) {

// 	try {
// 		$("#main").html(loading); 
// 		userAuthoList=$('#contentContainer')[0].innerHTML;
// 		const result = await $.ajax({url: `/setup/user-authorization`});
// 		if (result){
// 			var doc = new DOMParser().parseFromString(result, "text/html");
// 			$("#main").html(doc.getElementById("contentContainer"));
// 			window.livewire.rescan();
// 			history.pushState({path:`/setup/user-authorization`}, `Selected: `, `/setup/user-authorization`);
// 			jQuery.event.trigger('ipEvent', []);
// 		}
// 	}
    
// 	catch(error) {
// 		$("#main").html(errorScreen(error)); 
// 	}
// }

