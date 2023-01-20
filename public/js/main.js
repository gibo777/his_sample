
// Start Christopher P. Napoles 12/12.2022
//loading screens
const loading = `<div id="contentContainer">
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="loading-row row justify-content-center">
				<div class="col text-center">
					<span style="font-size:1.5rem;">Loading...</span>
					<br/>
					<div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
						<span class="visually-hidden"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>`;

//error display
function errorScreen(error) {
    return `<div id="contentContainer">
    <div class="page-wrapper">
        Server Error: ${error ? error.responseText : ''}
    </div>
    </div>`
}
//End
const initialPath = window.location.pathname;
let prevPath = '';
let parent = '';
let child = '';
let storeParent;
let storeSubMenu;


// sidebar scripts arrows
$(document).on('click', '.arrow', function (e) {
    try {
        const list = $('li');
        let index = '';
        let arrowParent = e.target.parentElement.parentElement;
        if (arrowParent.classList.contains('showMenu')) {
            arrowParent.classList.remove("showMenu");

        } else {
            arrowParent.classList.add("showMenu");
        }
        for (let i = 0; i < list.length; i++) {
            if (list[i] != arrowParent) {
                list[i].classList.remove('showMenu')
            }
        }
    } catch (error) {
        console.log(error);
    }

})

// Start Christopher P. Napoles 12/12.2022
// sidebar scripts names
$(document).on('click', '.sidebar-name', function (e) {
    try {
        const list = $('li');
        let arrowParent = e.target.parentElement.parentElement.parentElement;
        $(this)[0].classList.contains('sidebar-href') && storeSubMenu?.classList.remove('activeColor');
        if (arrowParent.classList.contains('showMenu')) {
            arrowParent.classList.remove("showMenu");

        } else {
            arrowParent.classList.add("showMenu");
        }
        for (let i = 0; i < list.length; i++) {
            if (list[i] != arrowParent) {
                list[i].classList.remove('showMenu')
            }
        }
    } catch (error) {
        console.log(error);
    }

})
//End

//change sidebar base on page size
$(function () {


    // ADDED BY MDC 1/5/2022 END
    /* console.log("width: "+ document.body.clientWidth); */
    resizeScreen();
    $(window).resize(function () {
        resizeScreen();
    });

    $('#burger-menu').click(function () {
        if ($('#burger-menu').hasClass("fa-caret-left")) {
            $('#burger-menu').removeClass("fa-caret-left");
            $('#burger-menu').addClass("fa-caret-right");
        }
        else {
            $('#burger-menu').removeClass("fa-caret-right");
            $('#burger-menu').addClass("fa-caret-left");
        }
        // $('.nav-links').removeClass('scrollable');

        if (document.body.clientWidth > 490) {
            $('.sidebar').toggleClass('close');
        } else {
            $('.sidebar').toggleClass('small-screen');
        }
    });

    function resizeScreen() {
        if (document.body.clientWidth < 490) {
            $('.sidebar').addClass('close');
        } else {
            $('.sidebar').removeClass('close');
        }
    }
});

// Start Christopher P. Napoles 12/12.2022
//set head title and sidebar colors upon loading
$(document).ready(function () {
    if ($('.sidebar-href').length != 0) {
        setTitle();
    }
    setActiveOnLoad();

});
//End

// Start Christopher P. Napoles 12/12.2022
//set sidebar menu active colors
$(document).on('click', '.sidebar-name.sidebar-href', function () {
    try {

        $('li').removeClass('showMenu');
        $('.activeColor').removeClass('activeColor');
        $(this).parent().addClass('activeColor');
        storeParent = '';
        storeParent = $(this)[0];
    } catch (error) {
        console.log(error);
    }
})
//set sidebar sub-menu active colors
$(document).on('click', '.side-li .sidebar-href', function () {
    try {
        $('.activeColor').removeClass('activeColor');
        $(this).addClass('activeColor');
        $(this).parent().parent().parent().addClass('activeColor');
    } catch (error) {
        console.log(error);
    }
});
//End

// Start Christopher P. Napoles 12/12.2022
//sidebar redirects and navigations
$(document).on('click', '.sidebar-href', async function (e) {
    try {
        //header title switching
        const index = $('.sidebar-href').index($(this));
        var element = $('.sidebar-href')[index];
        const path = $(this).attr('path');
        prevPath = window.location.pathname;

        $("#main").html(loading);
        const result = await $.ajax({ url: `${path}`, headers: { source: 'rest-api' } });
        if (result) {
            if (result == 'Unauthorized') {
                window.location.href = '/';

            } else {
                let doc = new DOMParser().parseFromString(result, "text/html");
                let getParent = '';
                $("#main").html(doc.getElementById("contentContainer"));

                window.livewire.rescan();
                history.pushState({ path }, `Selected: ${path}`, `${path}`);
                while (element.parentElement) {
                    element = element.parentElement;
                    if (element.hasAttribute('name')) {
                        getParent = element;
                        break;
                    }
                }
                parent = getParent.getAttribute('name');
                child = $(this).text();
                const title = ((parent == child) ? `${parent}` : `${parent}/ ${child}`);
                $('#headTitle').html(title);
                if (title.includes('Dashboard')) {
                    renderChart();
                }
            }

        }
    }
    catch (error) {
        $("#main").html(errorScreen(error));
    }
});
//End

// Start Christopher P. Napoles 12/12.2022
//Browser back and previous buttons functionality
$(window).on('popstate', async function (e) {
    try {
        const prev = e.target.history.state?.path;
        // console.log(prev);
        // console.log(initialPath);
        $("#main").html(loading);
        const result = await $.ajax({ url: `${prev ? prev : initialPath}`, headers: { source: 'rest-api' } });
        if (result) {
            if (result == 'Unauthorized') {
                window.location.href = '/';
            } else {
                var doc = new DOMParser().parseFromString(result, "text/html");
                $("#main").html(doc.getElementById("contentContainer"));
                window.livewire.rescan();
                setTitle();
                setActiveOnLoad();
                if ($('#headTitle').html().includes('Dashboard')) {
                    renderChart();
                }
            }
        }
    }
    catch (error) {
        console.log(error);
    }
})
//End

// Start Christopher P. Napoles 12/12.2022
//set Head Title
function setTitle() {
    try {
        let path = window.location.pathname;
        let sidebarNames = $('.sidebar-href');
        let getParent = '';
        let index = '';
        if (path == '/') {
            index = 0;
        }
        for (let i = 0; i < sidebarNames.length; i++) {

            if (path.includes(sidebarNames[i].getAttribute('path'))) {
                if(sidebarNames[i].getAttribute('path')!=''){
                    index = i;
                }
            }
        }
        var element = sidebarNames[index];
        while (element.parentElement) {
            element = element.parentElement;
            if (element.hasAttribute('name')) {
                getParent = element;
                break;
            }
        }
        parent = getParent.getAttribute('name');
        child = sidebarNames[index].innerText;
        const title = ((parent == child) ? `${parent}` : `${parent}/ ${child}`);
        $('#headTitle').html(title);
    } catch (error) {
        console.log(error);
    }

}
//End

//set Active sidebar on load
// Start Christopher P. Napoles 12/12.2022
function setActiveOnLoad() {
    try {
        $('.sidebar-href').removeClass('activeColor');
        let path = window.location.pathname;
        let sidebarNames = $('.sidebar-href');
        let getParent = '';
        let index = '';
        if (storeParent) {
            storeParent.classList.remove('activeColor');
            storeParent.classList.remove('showMenu');
            storeParent = '';
        }
        if (storeSubMenu) {
            storeSubMenu.classList.remove('activeColor');
            storeSubMenu = '';
        }
        if (path == '/') {
            index = 0;
        }
        for (let i = 0; i < sidebarNames.length; i++) {
            if (path.includes(sidebarNames[i].getAttribute('path'))) {
                if(sidebarNames[i].getAttribute('path')!=''){
                    index = i;
                }
                if (!sidebarNames[index]?.classList.contains('sidebar-name')) {
                    storeSubMenu = sidebarNames[index];
                    sidebarNames[index]?.classList.add('activeColor');
                }
            }
        }
        var element = sidebarNames[index];
        while (element?.parentElement) {
            element = element.parentElement;
            if (element.hasAttribute('name')) {
                $('li').removeClass('activeColor');
                $('li').removeClass('showMenu');
                storeParent = element;
                element.classList.add('activeColor');
                !element.classList.contains('sidebar-href') && element.classList.add('showMenu');
            }

        }
    } catch (error) {
        console.log(error)
    }

}
//End


$(document).on('click', '#btnBack', function () {
    history.back();
    // window.location.assign('../../registration');
});

$(document).on("click", ".close-modal", function () {
    console.log($(this).attr("name"))

    $(`#${$(this).attr("name")}`).modal("hide");
});



//
// $(document).on('click', '#dashboard', function () {
//     renderChart();
// });


//fire a sweet alert if a user has no access rights after middleware checking
function backendCheckUserRights(){
    Swal.fire({
        icon:'error',
        title: 'You dont have the rights on this process',
    })
}

//fire a sweet alert if a user has no access rights coming from the frontend
function frontendCheckUserRights(){
    Swal.fire({
        icon:'error',
        title: 'You dont have the rights on this process',
    })
}
function changeColor(cssAttr, value) {
    // console.log(cssAttr);
    document.documentElement.style.setProperty(`${cssAttr}`, value);
    return;
}
function setTheme(){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    }),
        $.ajax({
            url: "/setTheme",
            method: "GET",
            data:{ },
            success: function (response) {
console.log(response.data1[0]);

// CHANGE
// header near company image
changeColor('--header-color', response.data1[0]['header-color']);
// sidebar color
changeColor('--sidebar-color', response.data1[0]['sidebar-color']);
// active on sidebar
changeColor('--sidebar-active-color', response.data1[0]['sidebar-active-color']);
// submenu on sidebar
changeColor('--sidebar-submenu-color', response.data1[0]['sidebar-submenu-color']);
// hover on sidebar
changeColor('--dark-color', response.data1[0]['dark-color']);
//
changeColor('--light-scroll-color', response.data1[0]['light-scroll-color']);
// background of scrollbar color
changeColor('--background-scroll-color', response.data1[0]['background-scroll-color']);
//background of home color
changeColor('--home-background-color',response.data1[0]['home-background-color']);
//Scrollbar color
changeColor('--dark-scroll-color',response.data1[0]['dark-scroll-color']);

changeColor('--border-color', response.data1[0]['border-color']);
changeColor('--container-background-color',response.data1[0]['container-background-color']);
// left arrow/naming
changeColor('--company-color',response.data1[0]['company-color']);
changeColor('--nav-border-color',response.data1[0]['nav-border-color']);
changeColor('--nav-tab-color', response.data1[0]['nav-tab-color']);
changeColor('--table-text-color', response.data1[0]['table-text-color']);
changeColor('--table-background',response.data1[0]['table-background']);
changeColor('--table-border-color',response.data1[0]['table-border-color']);
changeColor('--table-light-background',response.data1[0]['table-light-background']);
changeColor('--table-striped-color',response.data1[0]['table-striped-color']);
changeColor('--tbody-hover', response.data1[0]['tbody-hover']);
// PAGINATION
changeColor('--pagination-bg', response.data1[0]['pagination-bg']);
changeColor('--pagination-color-text', response.data1[0]['pagination-color-text']);
changeColor('--pagination-active-color-text', response.data1[0]['pagination-active-color-text']);
changeColor('--pagination-active-color', response.data1[0]['pagination-active-color']);
changeColor('--pagination-default', response.data1[0]['pagination-default']);
// END PAGINATION

// changeColor('--input-bg', colorHexs[9]);

changeColor('--gray-color', response.data1[0]['gray-color']);
changeColor('--box-shadow-color', response.data1[0]['box-shadow-color']);
changeColor('--active-color', response.data1[0]['active-color']);
// BACKGROUND OF MODULE CONTENT
changeColor('--background-color', response.data1[0]['background-color']);
changeColor('--border-bg-color',response.data1[0]['border-bg-color']);
changeColor('--footer-bg-color',response.data1[0]['footer-bg-color']);
            },
        });
}
// SETTING THEME
$(function() {
    setTheme();
});
