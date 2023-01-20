// ON PAGE LOAD CHECK RADIOBUTTON
// $(function () {
//     var $themeradio = $('input:radio[name=themeMode]');
//     if ($themeradio.is(':checked') === false) {

//         $themeradio.filter('[value=1]').prop('checked', true);

//         $('input:radio[value=1]').attr('checked', 'checked');
//         $('input[name="themeMode"]:checked').val();
//         themeClickColor( $('input[name="themeMode"]:checked').val());
//     }
// });

function themeClickColor(themeMode) {

    var $themeId = themeMode;

    if ($themeId == 1) {
        document.documentElement.style.setProperty('--header-color', '#4E73DF');
        document.documentElement.style.setProperty('--sidebar-color', '#4E73DF');
        document.documentElement.style.setProperty('--sidebar-active-color', '#0736c4');
        document.documentElement.style.setProperty('--sidebar-submenu-color', '#2d5ade');
        document.documentElement.style.setProperty('--dark-color', '#0736c4');
        document.documentElement.style.setProperty('--light-scroll-color', '#7998f6');
        document.documentElement.style.setProperty('--background-scroll-color', '#bfcdf7');
        document.documentElement.style.setProperty('--home-background-color', '#EAEAEA');
        document.documentElement.style.setProperty('--dark-scroll-color', '#2d5dec');
        document.documentElement.style.setProperty('--text-color-white', 'white');
        document.documentElement.style.setProperty('--text-color-black', 'black');
        document.documentElement.style.setProperty('--border-color', '#CED4DA');
        document.documentElement.style.setProperty('--container-background-color', '#ffffff');
        document.documentElement.style.setProperty('--company-color', '#1768f3');
        document.documentElement.style.setProperty('--nav-border-color', '#c5c5c5');
        document.documentElement.style.setProperty('--nav-tab-color', '#d6d6d6');
        document.documentElement.style.setProperty('--table-text-color', '#000000');
        document.documentElement.style.setProperty('--table-background', '#ffffff');
        document.documentElement.style.setProperty('--table-border-color', '#ffffff');
        document.documentElement.style.setProperty('--table-light-background', '#f7f7f7');
        document.documentElement.style.setProperty('--table-striped-color', '#f1f1f1');
        document.documentElement.style.setProperty('--tbody-hover', '#e5e7edf0');
        document.documentElement.style.setProperty('--pagination-bg', '#ffffff');
        document.documentElement.style.setProperty('--pagination-color-text', '#000000');
        document.documentElement.style.setProperty('--pagination-active-color-text', '#ffffff');
        document.documentElement.style.setProperty('--pagination-active-color', '#1768f3');
        document.documentElement.style.setProperty('--pagination-default', '#dcdcdc');
        document.documentElement.style.setProperty('--input-bg', '#f8fafc');
        document.documentElement.style.setProperty('--gray-color', '#6D757A');
        document.documentElement.style.setProperty('--box-shadow-color', '#4E73DF');
        document.documentElement.style.setProperty('--active-color', 'rgba(255, 255, 255, 0.7)');
        document.documentElement.style.setProperty('--background-color', '#fff');
        document.documentElement.style.setProperty('--border-bg-color', '#4E73DF');
        document.documentElement.style.setProperty('--footer-bg-color', '#4E73DF');
        $('#styleofcolor').css('background-color','#4E73DF')
        $('#displayofnamecolor').val('Default Theme');
    }
    else {
        document.documentElement.style.setProperty('--header-color', '#000000');
        document.documentElement.style.setProperty('--sidebar-color', '#000000');
        document.documentElement.style.setProperty('--sidebar-submenu-color', '#2F2F2F');
        document.documentElement.style.setProperty('--home-background-color', '#2F2F2F');
        document.documentElement.style.setProperty('--text-color-black', '#ffffff');
        document.documentElement.style.setProperty('--dark-color', '');
        document.documentElement.style.setProperty('--sidebar-active-color', '');
        document.documentElement.style.setProperty('--table-background', '');
        document.documentElement.style.setProperty('--table-light-background', '');
        document.documentElement.style.setProperty('--background-scroll-color', '');
        document.documentElement.style.setProperty('--light-scroll-color', '');
        $('#styleofcolor').css('background-color','#000000')
        $('#displayofnamecolor').val('Dark Theme');
    }
}

const magOne = [
    "1", "2", "3", "11", "12", "13", "21", "22", "23", "31", "32", "33", "41", "42", "43", "51", "52", "53", "61", "62", "63", "71", "72", "73", "81", "82", "83", "91", "92", "93", "101", "102", "103", "111", "112", "113", "121", "122", "123", "131", "132", "133", "181", "182", "183"
];
magOne.toString();
const magTwo = [
    "141", "142", "143", "144", "145", "146", "147", "148"
];
const magThree = [
    "151", "152", "153", "154", "155", "156", "157"
];
const magFour = [
    "161", "162", "163", "164", "165"
];
const magFive = [
    "171", "172", "173", "174", "175"
];
const magSix = [
"10","20","30","40","50","60","70","80","90","100","110","120","130"
,"140","150","160","170","180","190",

"9","19","29","39","49","59","69","79","89","99","109","119","129"
,"139","149","159","169","179","189"

,"8","18","28","38","48","58","68","78","88","98","108","118"
,"128","138","158","168","178","188",

"7","17","27","37","47","57","67","77","87","97","107","117"
,"127","137","167","177","187",

"6","16","26","36","46","56","66","76","86","96","106","116"
,"126","136","166","176","186",

"5","15","25","35","45","55","65","75","85","95","105","115"
,"125","135","175","185",

"4","14","24","34","44","54","64","74","84","94","104","114"
,"124","134","184",



];

var headerColor = "";
var sidebarColor = "";
var sidebarActiveColor = "";
var sidebarSubmenuColor = "";
var darkColor = "";
var lightScrollColor = "";
var backgroundScrollColor = "";
var homeBackgroundColor = "";
var darkScrollColor = "";
var buttonColor = "";
var buttonHoverColor = "";
var textColorWhite = "";
var textColorBlack = "";
var borderColor = "";
var containerBackgroundColor = "";
var companyColor = "";
var navBorderColor = "";
var navTabColor = "";
var tableTextColor = "";
var tableBackground = "";
var tableBorderColor = "";
var tableLightBackground = "";
var tableStripedColor = "";
var tbodyHover = "";
var paginationBg = "";
var paginationColorText = "";
var paginationActiveColorText = "";
var paginationActiveColor = "";
var paginationDefault = "";
var inputBg = "";
var grayColor = "";
var boxShadowColor = "";
var activeColor = "";
var backgroundColor = "";
var borderBgColor = "";
var footerBgColor = "";




async function selectColor(color, level) {
    console.log(color);
    console.log(level);
    let intLevel = parseInt(level);
    var colorLevels = [];
    var colorHexs = [];

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const result = await $.ajax({ url: `/tools/theme-configuration/${color}`, method: 'get' });
    // result && console.log(result);
    if (result) {

        result.colorHex.map((e) => {
            colorHexs.push(e.hexcode);
            colorLevels.push(e.color_level);
        })

        switch (level) {

            case "10":
                alert('h1');
// CHANGE
changeColor('--header-color',colorHexs[0]);
changeColor('--sidebar-color', colorHexs[0]);
changeColor('--sidebar-active-color',colorHexs[2]);
changeColor('--sidebar-submenu-color', colorHexs[1]);
changeColor('--dark-color',colorHexs[1]);
changeColor('--light-scroll-color',colorHexs[8]);
changeColor('--background-scroll-color',colorHexs[7]);
changeColor('--home-background-color', colorHexs[3]);
changeColor('--dark-scroll-color', colorHexs[9]);

changeColor('--border-color',);
changeColor('--container-background-color',);
changeColor('--company-color',colorHexs[0]);
changeColor('--nav-border-color',);
changeColor('--nav-tab-color',);
changeColor('--table-text-color',);
changeColor('--table-background', colorHexs[2]);
changeColor('--table-border-color',);
changeColor('--table-light-background',colorHexs[3]);
changeColor('--table-striped-color',);
changeColor('--tbody-hover',);
changeColor('--pagination-bg',);
changeColor('--pagination-color-text',);
changeColor('--pagination-active-color-text',);
changeColor('--pagination-active-color',);
changeColor('--pagination-default',);
changeColor('--input-bg',);
changeColor('--gray-color',);
changeColor('--box-shadow-color',);
changeColor('--active-color',);
changeColor('--background-color',);
changeColor('--border-bg-color',);
changeColor('--footer-bg-color',colorHexs[0]);

// END CHANGE


                setMainColor(0, 2, 1, 9, 8);
                break;
            case "9":
                alert('h2');
                // CHANGE
changeColor('--header-color',colorHexs[0]);
changeColor('--sidebar-color', colorHexs[0]);
changeColor('--sidebar-active-color',colorHexs[2]);
changeColor('--sidebar-submenu-color', colorHexs[1]);
changeColor('--dark-color',colorHexs[1]);
changeColor('--light-scroll-color',colorHexs[8]);
changeColor('--background-scroll-color',colorHexs[7]);
changeColor('--home-background-color', colorHexs[3]);
changeColor('--dark-scroll-color', colorHexs[9]);
changeColor('--container-background-color',);
changeColor('--company-color',colorHexs[0]);
changeColor('--nav-border-color',);
changeColor('--nav-tab-color',);
changeColor('--table-text-color',);
changeColor('--table-background', colorHexs[2]);
changeColor('--table-border-color',);
changeColor('--table-light-background',colorHexs[3]);
changeColor('--table-striped-color',);
changeColor('--tbody-hover',);
changeColor('--pagination-bg',);
changeColor('--pagination-color-text',);
changeColor('--pagination-active-color-text',);
changeColor('--pagination-active-color',);
changeColor('--pagination-default',);
changeColor('--input-bg',);
changeColor('--gray-color',);
changeColor('--box-shadow-color',);
changeColor('--active-color',);
changeColor('--background-color',);
changeColor('--border-bg-color',);
changeColor('--footer-bg-color',colorHexs[0]);

// END CHANGE

                setMainColor(1, 3, 2, 8, 7);
                break;
            case "8":
                alert('h3');
// CHANGE
// header near company image
changeColor('--header-color', colorHexs[2]);
// sidebar color
changeColor('--sidebar-color', colorHexs[2]);
// active on sidebar
changeColor('--sidebar-active-color', colorHexs[4]);
// submenu on sidebar
changeColor('--sidebar-submenu-color', colorHexs[3]);
// hover on sidebar
changeColor('--dark-color', colorHexs[3]);
//
changeColor('--light-scroll-color', colorHexs[7]);
// background of scrollbar color
changeColor('--background-scroll-color', colorHexs[6]);
//background of home color
changeColor('--home-background-color', colorHexs[1]);
//Scrollbar color
changeColor('--dark-scroll-color', colorHexs[8]);

changeColor('--border-color', colorHexs[9]);
changeColor('--container-background-color', colorHexs[0]);
// left arrow/naming
changeColor('--company-color',colorHexs[9]);
changeColor('--nav-border-color', colorHexs[0]);
changeColor('--nav-tab-color', colorHexs[0]);
changeColor('--table-text-color', colorHexs[0]);
changeColor('--table-background', colorHexs[2]);
changeColor('--table-border-color', colorHexs[3]);
changeColor('--table-light-background', colorHexs[3]);
changeColor('--table-striped-color', colorHexs[1]);
changeColor('--tbody-hover', colorHexs[0]);
// PAGINATION
changeColor('--pagination-bg', colorHexs[3]);
changeColor('--pagination-color-text', colorHexs[9]);
changeColor('--pagination-active-color-text', colorHexs[0]);
changeColor('--pagination-active-color', colorHexs[9]);
changeColor('--pagination-default', colorHexs[2]);
// END PAGINATION

// changeColor('--input-bg', colorHexs[9]);

changeColor('--gray-color', colorHexs[0]);
changeColor('--box-shadow-color', colorHexs[0]);
changeColor('--active-color', colorHexs[0]);
// BACKGROUND OF MODULE CONTENT
changeColor('--background-color', colorHexs[3]);
changeColor('--border-bg-color', colorHexs[0]);
changeColor('--footer-bg-color',colorHexs[9]);
                setMainColor(2, 4, 3, 7, 6);
                break;
            case "7":
                alert('h4');
// CHANGE
// header near company image
changeColor('--header-color', colorHexs[3]);
// sidebar color
changeColor('--sidebar-color', colorHexs[3]);
// active on sidebar
changeColor('--sidebar-active-color', colorHexs[5]);
// submenu on sidebar
changeColor('--sidebar-submenu-color', colorHexs[4]);
// hover on sidebar
changeColor('--dark-color', colorHexs[4]);
//
changeColor('--light-scroll-color', colorHexs[6]);
// background of scrollbar color
changeColor('--background-scroll-color', colorHexs[5]);
//background of home color
changeColor('--home-background-color', colorHexs[1]);
//Scrollbar color
changeColor('--dark-scroll-color', colorHexs[8]);

changeColor('--border-color', colorHexs[9]);
changeColor('--container-background-color', colorHexs[0]);
// left arrow/naming
changeColor('--company-color',colorHexs[9]);
changeColor('--nav-border-color', colorHexs[0]);
changeColor('--nav-tab-color', colorHexs[0]);
changeColor('--table-text-color', colorHexs[0]);
changeColor('--table-background', colorHexs[3]);
changeColor('--table-border-color', colorHexs[3]);
changeColor('--table-light-background', colorHexs[3]);
changeColor('--table-striped-color', colorHexs[1]);
changeColor('--tbody-hover', colorHexs[0]);
// PAGINATION
changeColor('--pagination-bg', colorHexs[3]);
changeColor('--pagination-color-text', colorHexs[9]);
changeColor('--pagination-active-color-text', colorHexs[0]);
changeColor('--pagination-active-color', colorHexs[9]);
changeColor('--pagination-default', colorHexs[2]);
// END PAGINATION

// changeColor('--input-bg', colorHexs[9]);

changeColor('--gray-color', colorHexs[0]);
changeColor('--box-shadow-color', colorHexs[0]);
changeColor('--active-color', colorHexs[0]);
// BACKGROUND OF MODULE CONTENT
changeColor('--background-color', colorHexs[3]);
changeColor('--border-bg-color', colorHexs[0]);
changeColor('--footer-bg-color',colorHexs[9]);
                setMainColor(3, 5, 4, 6, 5);
                break;
            case "6":
                alert('h5');
// CHANGE
// header near company image
changeColor('--header-color', colorHexs[4]);
// sidebar color
changeColor('--sidebar-color', colorHexs[4]);
// active on sidebar
changeColor('--sidebar-active-color', colorHexs[2]);
// submenu on sidebar
changeColor('--sidebar-submenu-color', colorHexs[3]);
// hover on sidebar
changeColor('--dark-color', colorHexs[3]);
//
changeColor('--light-scroll-color', colorHexs[2]);
// background of scrollbar color
changeColor('--background-scroll-color', colorHexs[1]);
//background of home color
changeColor('--home-background-color', colorHexs[2]);
//Scrollbar color
changeColor('--dark-scroll-color', colorHexs[8]);

changeColor('--border-color', colorHexs[9]);
changeColor('--container-background-color', colorHexs[0]);
// left arrow/naming
changeColor('--company-color',colorHexs[9]);
changeColor('--nav-border-color', colorHexs[0]);
changeColor('--nav-tab-color', colorHexs[0]);
changeColor('--table-text-color', colorHexs[0]);
changeColor('--table-background', colorHexs[3]);
changeColor('--table-border-color', colorHexs[3]);
changeColor('--table-light-background', colorHexs[3]);
changeColor('--table-striped-color', colorHexs[1]);
changeColor('--tbody-hover', colorHexs[0]);
// PAGINATION
changeColor('--pagination-bg', colorHexs[3]);
changeColor('--pagination-color-text', colorHexs[9]);
changeColor('--pagination-active-color-text', colorHexs[0]);
changeColor('--pagination-active-color', colorHexs[9]);
changeColor('--pagination-default', colorHexs[2]);
// END PAGINATION

// changeColor('--input-bg', colorHexs[9]);

changeColor('--gray-color', colorHexs[0]);
changeColor('--box-shadow-color', colorHexs[0]);
changeColor('--active-color', colorHexs[0]);
// BACKGROUND OF MODULE CONTENT
changeColor('--background-color', colorHexs[3]);
changeColor('--border-bg-color', colorHexs[0]);
changeColor('--footer-bg-color',colorHexs[9]);
                setMainColor(4, 2, 3, 2, 2);
                break;
            case "5":
                alert('h6');
// CHANGE
// header near company image
changeColor('--header-color', colorHexs[5]);
// sidebar color
changeColor('--sidebar-color', colorHexs[5]);
// active on sidebar
changeColor('--sidebar-active-color', colorHexs[3]);
// submenu on sidebar
changeColor('--sidebar-submenu-color', colorHexs[4]);
// hover on sidebar
changeColor('--dark-color', colorHexs[4]);
//
changeColor('--light-scroll-color', colorHexs[3]);
// background of scrollbar color
changeColor('--background-scroll-color', colorHexs[2]);
//background of home color
changeColor('--home-background-color', colorHexs[2]);
//Scrollbar color
changeColor('--dark-scroll-color', colorHexs[8]);

changeColor('--border-color', colorHexs[9]);
changeColor('--container-background-color', colorHexs[0]);
// left arrow/naming
changeColor('--company-color',colorHexs[9]);
changeColor('--nav-border-color', colorHexs[0]);
changeColor('--nav-tab-color', colorHexs[0]);
changeColor('--table-text-color', colorHexs[0]);
changeColor('--table-background', colorHexs[3]);
changeColor('--table-border-color', colorHexs[3]);
changeColor('--table-light-background', colorHexs[3]);
changeColor('--table-striped-color', colorHexs[1]);
changeColor('--tbody-hover', colorHexs[0]);
// PAGINATION
changeColor('--pagination-bg', colorHexs[3]);
changeColor('--pagination-color-text', colorHexs[9]);
changeColor('--pagination-active-color-text', colorHexs[0]);
changeColor('--pagination-active-color', colorHexs[9]);
changeColor('--pagination-default', colorHexs[2]);
// END PAGINATION

// changeColor('--input-bg', colorHexs[9]);

changeColor('--gray-color', colorHexs[0]);
changeColor('--box-shadow-color', colorHexs[0]);
changeColor('--active-color', colorHexs[0]);
// BACKGROUND OF MODULE CONTENT
changeColor('--background-color', colorHexs[3]);
changeColor('--border-bg-color', colorHexs[0]);
changeColor('--footer-bg-color',colorHexs[9]);

                break;
            case "4":
                alert('h7');
// CHANGE
// header near company image
changeColor('--header-color', colorHexs[6]);
// sidebar color
changeColor('--sidebar-color', colorHexs[6]);
// active on sidebar
changeColor('--sidebar-active-color', colorHexs[4]);
// submenu on sidebar
changeColor('--sidebar-submenu-color', colorHexs[5]);
// hover on sidebar
changeColor('--dark-color', colorHexs[5]);
//
changeColor('--light-scroll-color', colorHexs[2]);
// background of scrollbar color
changeColor('--background-scroll-color', colorHexs[1]);
//background of home color
changeColor('--home-background-color', colorHexs[2]);
//Scrollbar color
changeColor('--dark-scroll-color', colorHexs[8]);

changeColor('--border-color', colorHexs[9]);
changeColor('--container-background-color', colorHexs[0]);
// left arrow/naming
changeColor('--company-color',colorHexs[9]);
changeColor('--nav-border-color', colorHexs[0]);
changeColor('--nav-tab-color', colorHexs[0]);
changeColor('--table-text-color', colorHexs[0]);
changeColor('--table-background', colorHexs[3]);
changeColor('--table-border-color', colorHexs[3]);
changeColor('--table-light-background', colorHexs[3]);
changeColor('--table-striped-color', colorHexs[1]);
changeColor('--tbody-hover', colorHexs[0]);
// PAGINATION
changeColor('--pagination-bg', colorHexs[3]);
changeColor('--pagination-color-text', colorHexs[9]);
changeColor('--pagination-active-color-text', colorHexs[0]);
changeColor('--pagination-active-color', colorHexs[9]);
changeColor('--pagination-default', colorHexs[2]);
// END PAGINATION

// changeColor('--input-bg', colorHexs[9]);

changeColor('--gray-color', colorHexs[0]);
changeColor('--box-shadow-color', colorHexs[0]);
changeColor('--active-color', colorHexs[0]);
// BACKGROUND OF MODULE CONTENT
changeColor('--background-color', colorHexs[3]);
changeColor('--border-bg-color', colorHexs[0]);
changeColor('--footer-bg-color',colorHexs[9]);

                break;
            case "3":
                alert('h8');
// CHANGE
// header near company image
changeColor('--header-color', colorHexs[7]);
// sidebar color
changeColor('--sidebar-color', colorHexs[7]);
// active on sidebar
changeColor('--sidebar-active-color', colorHexs[5]);
// submenu on sidebar
changeColor('--sidebar-submenu-color', colorHexs[6]);
// hover on sidebar
changeColor('--dark-color', colorHexs[6]);
//
changeColor('--light-scroll-color', colorHexs[2]);
// background of scrollbar color
changeColor('--background-scroll-color', colorHexs[1]);
//background of home color
changeColor('--home-background-color', colorHexs[3]);
//Scrollbar color
changeColor('--dark-scroll-color', colorHexs[8]);

changeColor('--border-color', colorHexs[9]);
changeColor('--container-background-color', colorHexs[0]);
// left arrow/naming
changeColor('--company-color',colorHexs[9]);
changeColor('--nav-border-color', colorHexs[0]);
changeColor('--nav-tab-color', colorHexs[0]);
changeColor('--table-text-color', colorHexs[0]);
changeColor('--table-background', colorHexs[3]);
changeColor('--table-border-color', colorHexs[3]);
changeColor('--table-light-background', colorHexs[3]);
changeColor('--table-striped-color', colorHexs[1]);
changeColor('--tbody-hover', colorHexs[0]);
// PAGINATION
changeColor('--pagination-bg', colorHexs[3]);
changeColor('--pagination-color-text', colorHexs[9]);
changeColor('--pagination-active-color-text', colorHexs[0]);
changeColor('--pagination-active-color', colorHexs[9]);
changeColor('--pagination-default', colorHexs[2]);
// END PAGINATION

// changeColor('--input-bg', colorHexs[9]);

changeColor('--gray-color', colorHexs[0]);
changeColor('--box-shadow-color', colorHexs[0]);
changeColor('--active-color', colorHexs[0]);
// BACKGROUND OF MODULE CONTENT
changeColor('--background-color', colorHexs[3]);
changeColor('--border-bg-color', colorHexs[0]);
changeColor('--footer-bg-color',colorHexs[9]);

                break;
            case "2":
                // alert('h9');
                // CHANGE
// header near company image
changeColor('--header-color', colorHexs[8]);
// sidebar color
changeColor('--sidebar-color', colorHexs[8]);
// active on sidebar
changeColor('--sidebar-active-color', colorHexs[6]);
// submenu on sidebar
changeColor('--sidebar-submenu-color', colorHexs[7]);
// hover on sidebar
changeColor('--dark-color', colorHexs[7]);
//
changeColor('--light-scroll-color', colorHexs[3]);
// background of scrollbar color
changeColor('--background-scroll-color', colorHexs[1]);
//background of home color
changeColor('--home-background-color', colorHexs[3]);
//Scrollbar color
changeColor('--dark-scroll-color', colorHexs[8]);

changeColor('--border-color', colorHexs[9]);
changeColor('--container-background-color', colorHexs[0]);
// left arrow/naming
changeColor('--company-color',colorHexs[9]);
changeColor('--nav-border-color', colorHexs[0]);
changeColor('--nav-tab-color', colorHexs[0]);
changeColor('--table-text-color', colorHexs[0]);
changeColor('--table-background', colorHexs[3]);
changeColor('--table-border-color', colorHexs[3]);
changeColor('--table-light-background', colorHexs[3]);
changeColor('--table-striped-color', colorHexs[1]);
changeColor('--tbody-hover', colorHexs[0]);
// PAGINATION
changeColor('--pagination-bg', colorHexs[3]);
changeColor('--pagination-color-text', colorHexs[9]);
changeColor('--pagination-active-color-text', colorHexs[0]);
changeColor('--pagination-active-color', colorHexs[9]);
changeColor('--pagination-default', colorHexs[2]);
// END PAGINATION

// changeColor('--input-bg', colorHexs[9]);

changeColor('--gray-color', colorHexs[0]);
changeColor('--box-shadow-color', colorHexs[0]);
changeColor('--active-color', colorHexs[0]);
// BACKGROUND OF MODULE CONTENT
changeColor('--background-color', colorHexs[3]);
changeColor('--border-bg-color', colorHexs[0]);
changeColor('--footer-bg-color',colorHexs[9]);
                break;
            case "1":
                alert('h10');

// CHANGE
// header near company image
changeColor('--header-color',colorHexs[9]);
// sidebar color
changeColor('--sidebar-color', colorHexs[9]);
// active on sidebar
changeColor('--sidebar-active-color',colorHexs[7]);
// submenu on sidebar
changeColor('--sidebar-submenu-color', colorHexs[6]);
// hover on sidebar
changeColor('--dark-color',colorHexs[9]);
//
changeColor('--light-scroll-color',colorHexs[3]);
// background of scrollbar color
changeColor('--background-scroll-color',colorHexs[2]);
//background of home color
changeColor('--home-background-color', colorHexs[2]);
//Scrollbar color
changeColor('--dark-scroll-color', colorHexs[8]);

changeColor('--border-color', colorHexs[9]);
changeColor('--container-background-color', colorHexs[0]);
// left arrow/naming
changeColor('--company-color',colorHexs[9]);
changeColor('--nav-border-color', colorHexs[0]);
changeColor('--nav-tab-color', colorHexs[0]);
changeColor('--table-text-color', colorHexs[0]);
changeColor('--table-background', colorHexs[3]);
changeColor('--table-border-color', colorHexs[3]);
changeColor('--table-light-background',colorHexs[0]);
changeColor('--table-striped-color', colorHexs[1]);
changeColor('--tbody-hover', colorHexs[0]);
// PAGINATION
changeColor('--pagination-bg', colorHexs[3]);
changeColor('--pagination-color-text', colorHexs[9]);
changeColor('--pagination-active-color-text', colorHexs[0]);
changeColor('--pagination-active-color', colorHexs[9]);
changeColor('--pagination-default', colorHexs[2]);
// END PAGINATION

// changeColor('--input-bg', colorHexs[9]);

changeColor('--gray-color', colorHexs[0]);
changeColor('--box-shadow-color', colorHexs[0]);
changeColor('--active-color', colorHexs[0]);
// BACKGROUND OF MODULE CONTENT
changeColor('--background-color', colorHexs[3]);
changeColor('--border-bg-color', colorHexs[0]);
changeColor('--footer-bg-color',colorHexs[9]);

// END CHANGE
                break;
            default:
        }
        if (magOne.includes(color)) {

            if (intLevel > 7) {
console.log('hello');
                textColor("black");
            }


        }
        else if (magTwo.includes(color)) {
            if ((intLevel <= 10) && (intLevel > 2)) {
                console.log('hello1');
                // console.log("asd");
                textColor("black");
                tableBgColor(colorHexs, 2, 6);

            }


        }
        else if (magThree.includes(color)) {
            if ((intLevel <= 10) && (intLevel > 3)) {
                console.log('hello2');
                textColor("black");
                tableBgColor(colorHexs, 2, 5);
            }

        }
        else if (magFour.includes(color)) {
            if ((intLevel <= 10) && (intLevel > 5)) {
                console.log('hello3');
                textColor("black");
            }

        }

        else if (magFive.includes(color)) {
            if ((intLevel <= 10) && (intLevel > 6)) {
                console.log('hello4');
                textColor("black");
            }

        }
        else if (magSix.includes(color)){
            if(intLevel <10){
                console.log('hello5');
                textColor("white");
            }
        }
    }
    // console.log(colorLevels);
    // console.log(magOne);
    // console.log(magOne.includes(color));
    // const response = new Response ();
    // $('#colortable tr').each(function(){
    //     var colorid = $(this).find("td").eq(2).html();

    // })
$('#styleofcolor').css('background-color',document.documentElement.style.getPropertyValue('--header-color'))
$('#displayofnamecolor').val(document.documentElement.style.getPropertyValue('--header-color'));
}
function tableBgColor(colorHexs, one, two) {
    document.documentElement.style.setProperty('--table-background', colorHexs[one]);
    document.documentElement.style.setProperty('--table-light-background', colorHexs[two]);
    return;
}
function textColor(color) {
    document.documentElement.style.setProperty('--text-color-white', color);
    return;
}

function setDefault(colorHexs, one, two, three, four, five, six) {
    document.documentElement.style.setProperty('--header-color', colorHexs[one]);
    document.documentElement.style.setProperty('--sidebar-color', colorHexs[one]);
    document.documentElement.style.setProperty('--sidebar-submenu-color', colorHexs[two]);
    document.documentElement.style.setProperty('--home-background-color', colorHexs[two]);
    document.documentElement.style.setProperty('--dark-color', colorHexs[two]);
    document.documentElement.style.setProperty('--sidebar-active-color', colorHexs[three]);
    document.documentElement.style.setProperty('--table-background', colorHexs[three]);
    document.documentElement.style.setProperty('--table-light-background', colorHexs[four]);
    document.documentElement.style.setProperty('--background-scroll-color', colorHexs[five]);
    document.documentElement.style.setProperty('--light-scroll-color', colorHexs[six]);
    return;
}
function changeColor(cssAttr, value) {
    // console.log(cssAttr);
    document.documentElement.style.setProperty(`${cssAttr}`, value);
    return;
}

function setMainColor(val1, val2, val3, val4, val5) {
    headerColor = val1;
    sidebarColor = val1;
    sidebarActiveColor = val2;
    sidebarSubmenuColor = val3;
    darkColor = val3;
    lightScrollColor = val4;
    backgroundScrollColor = val5;
    homeBackgroundColor = val3;
    return;
}



function apply(){
    var color1 =  document.documentElement.style.getPropertyValue('--header-color');
    var color2 =  document.documentElement.style.getPropertyValue('--sidebar-color');
    var color3 =  document.documentElement.style.getPropertyValue('--sidebar-active-color');
    var color4 =  document.documentElement.style.getPropertyValue('--sidebar-submenu-color');
    var color5=  document.documentElement.style.getPropertyValue('--dark-color');
    var color6 =  document.documentElement.style.getPropertyValue('--light-scroll-color');
    var color7 =  document.documentElement.style.getPropertyValue('--background-scroll-color');
    var color8 =  document.documentElement.style.getPropertyValue('--home-background-color');
    var color9 =  document.documentElement.style.getPropertyValue('--dark-scroll-color');
    var color10 =  document.documentElement.style.getPropertyValue('--container-background-color');
    var color11 =  document.documentElement.style.getPropertyValue('--company-color');
    var color12 =  document.documentElement.style.getPropertyValue('--nav-border-color');
    var color13 =  document.documentElement.style.getPropertyValue('--nav-tab-color');
    var color14 =  document.documentElement.style.getPropertyValue('--table-text-color');
    var color15 =  document.documentElement.style.getPropertyValue('--table-background');
    var color16 =  document.documentElement.style.getPropertyValue('--table-border-color');
    var color17 =  document.documentElement.style.getPropertyValue('--table-light-background');
    var color18 =  document.documentElement.style.getPropertyValue('--table-striped-color');
    var color19 =  document.documentElement.style.getPropertyValue('--pagination-bg');
    var color20 =  document.documentElement.style.getPropertyValue('--pagination-color-text');
    var color21 =  document.documentElement.style.getPropertyValue('--pagination-active-color-text');
    var color22 =  document.documentElement.style.getPropertyValue('--pagination-active-color');
    var color23 =  document.documentElement.style.getPropertyValue('--pagination-default');
    var color24 =  document.documentElement.style.getPropertyValue('--gray-color');
    var color25 =  document.documentElement.style.getPropertyValue('--box-shadow-color');
    var color26 =  document.documentElement.style.getPropertyValue('--active-color');
    var color27 =  document.documentElement.style.getPropertyValue('--background-color');
    var color28 =  document.documentElement.style.getPropertyValue('--border-bg-color');
    var color29 =  document.documentElement.style.getPropertyValue('--footer-bg-color');

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    }),
        $.ajax({
            url: "/saveTheme",
            method: "GET",
            data:{
                headercolor:color1,
                sidebarcolor:color2,
                sidebara:color3,
                sidebarsub:color4,
                darkcolor:color5,
                lightscroll:color6,
                bgscroll:color7,
                hbg:color8,
                darkscrollcolor:color9,
                containerbg:color10,
                companycolor:color11,
                navborder:color12,
                navtab:color13,
                tabletext:color14,
                tablebg:color15,
                tableborder:color16,
                tablelight:color17,
                tablestriped:color18,
                paginationbg:color19,
                paginationtext:color20,
                paginationatext:color21,
                paginationa:color22,
                paginationdef:color23,
                graycolor:color24,
                boxshadowcolor:color25,
                activecolor:color26,
                backgroundcolor:color27,
                borderbgcolor:color28,
                footercolor:color29
            },
            success: function (response) {
                alert('DB saved');
            },
        });

}
