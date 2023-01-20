<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Report\Logbook;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\SetupController;
use App\Http\Livewire\Report\Patientcase;
use App\Http\Controllers\CaseIdController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PatientController;
use App\Http\Livewire\Report\Admissionlist;
use App\Http\Livewire\Report\OutpatientCase;
use App\Http\Controllers\ReportLogbookController;
use App\Http\Livewire\Inpatient\InpatientNewCase;
use App\Http\Controllers\ItemManagementController;
use App\Http\Livewire\Tools\ThemeConfiguration\Theme;



use App\Http\Livewire\Outpatient\OutpatientNewCase;
use App\Http\Controllers\ReportPatientcaseController;
use App\Http\Controllers\ReportAdmissionlistController;
use App\Http\Controllers\ReportOutpatientcaseController;
use App\Http\Livewire\Dashboard\Includes\PatientPerMonth;
use App\Http\Livewire\PatientRegister\BackgroundInformation;
use App\Http\Livewire\PatientRegister\AddPatient\AddNewPatient;
use App\Http\Livewire\Setup\UserAuthorization\UserAuthorization;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[RootController::class,'rootRoute'])->name('root'); // Check root page if there is a logged user | Christopher P. Napoles | 12/12/2022


Auth::routes(['verify' => true]); //Check if user is verified | Christopher P. Napoles | 12/12/2022
// Route::get('/',function(){
// 	return view('auth.login');
// })->name('login');

//Navigation Routes
Route::get('/home', [HomeController::class, 'index'])->name('home'); //Dashboard Page | Christopher P. Napoles | 12/12/2022

Route::get('/outpatient/outpatientlist', [PatientController::class, 'outpatientList'])->middleware('checkAuth','checkNavs')->name('outpatientlist'); //List of Outpatient

Route::get('/outpatient/outpatientlist/information/{outpatientId}', [PatientController::class, 'outpatientInformation'])->middleware('checkAuth','checkNavs')->name('outpatient-information');

Route::get('/registration', [PatientController::class, 'registration'])->middleware('checkAuth','checkNavs')->name('registration');

Route::get('/registration/information/{patientId}', [PatientController::class, 'patientInformation'])->middleware('checkAuth','checkNavs')->name('patient-information');

Route::get('registration/addnewpatient/{type}', [PatientController::class, 'addNewPatient'])->middleware('checkAuth','checkNavs')->name('add-new-patient');

Route::get('/inpatient/inpatient-list',[PatientController::class,'inpatientList'])->middleware('checkAuth','checkNavs')->name('inpatient-list');

Route::get('/inpatient/inpatient-list/information/{inpatientId}',[PatientController::class,'inpatientInformation'])->middleware('checkAuth','checkNavs')->name('inpatient-information');

Route::get('/sidebar', [App\Http\Controllers\SideBar::class, 'sidebar'])->name('sidebar');


// Dashboard Routes
Route::get('/getPatientPerMonth', [PatientPerMonth::class, 'getPatientPerMonth']); //Get patient per month in a year Kier Aguilar 12/9/2022

Route::post('/savebginfo',[PatientController::class,'saveBackgroundInformation'])->name('save-background-information');
Route::get('/getprovinces',[AddressController::class,'getProvinces'])->name('get-provinces');

Route::get('/getmunicipalities',[AddressController::class,'getMunicipalities'])->name('get-municipalities');
Route::get('/getbarangays',[AddressController::class,'getBarangays'])->name('get-barangays');

Route::get('/getzipcode',[AddressController::class,'getZip'])->name('get-zipcode');

// Setup Routes
Route::get('/setup/user-management',[SetupController::class,'userManagement'])->middleware('checkAuth','checkNavs')->name('user-management');


Route::get('/setup/user-authorization',[SetupController::class,'userAuthorization'])->middleware('checkAuth')->name('user-authorization');

Route::get('/setup/group-authorization',[SetupController::class,'groupAuthorization'])->middleware('checkAuth')->name('group-authorization');

Route::get('/setup/procedure-management',[SetupController::class,'procedureManagement'])->middleware('checkAuth')->name('procedure-management');

Route::get('/setup/group-management',[SetupController::class,'groupManagement'])->middleware('checkAuth')->name('group-management');

// End of Setup Routes

// Tools Routes

Route::get('/tools/theme-configuration',[ToolController::class,'themeConfiguration'])->middleware('checkAuth','checkNavs')->name('theme');
Route::get('/tools/theme-configuration/{id}',[ToolController::class,'clickColor'])->middleware('checkAuth','checkNavs')->name('theme2');

// End of Tools Routes


// Register Patient Personal Information - KLA 12/16/2022
Route::post('/registerPatientInfo',[AddNewPatient::class,'setPatientInfo'])->middleware('checkRights');

Route::get('/getzipcode',[AddressController::class,'getZipCode'])->name('get-zipcode');

Route::post('/updatepatientinformation',[PatientController::class,'updateInformation'])->name('update-patient-info');

Route::get('/checkcasenumber',[CaseIdController::class,'checkId'])->name('check-case-id');

// Check if Patient Exist - KLA 12/20/2022
Route::get('/checkIfPatientExist',[AddNewPatient::class,'checkPatientIfExist']);

Route::post('/createorupdatecase',[PatientController::class,'newCase'])->middleware('checkAuth', 'checkRights')->name('new-case');
Route::get('/selectrequest',[PatientController::class,'requestItems'])->name('select-request');
Route::get('/getcasedetails',[PatientController::class,'getCaseDetails'])->name('get-cae-details');
Route::get('/report/logbook',[ReportLogbookController::class,'index'])->name('get-logbook');
// Route::get('/report/logbook',[ReportLogbookController::class,'index'])->name('get-logbook');


// LOGBOOK LIST REPORTS
Route::get('/report/logbook-printpdf',[ReportLogbookController::class,'printpdf'])->middleware('checkAuth','checkNavs')->name('printpdf');
Route::get('/report/logbook/pdf/{start}/{end}',[Logbook::class,'getDate'])->name('get-logbookpdf');
Route::get('/report/logbook/excel/{start}/{end}',[Logbook::class,'export'])->name('get-logbookexcel');

// INPATIENT LIST REPORTS
Route::get('/report/admissionlist',[ReportAdmissionlistController::class,'index'])->middleware('checkAuth','checkNavs')->name('get-admissionlist');

Route::get('/report/admissionlist/pdf/{start}/{end}/{dcotor}',[Admissionlist::class,'getDate'])->name('get-admissionlistpdf');
Route::get('/report/admissionlist/excel/{start}/{end}/{dcotor}',[Admissionlist::class,'export'])->name('get-admissionlistexcel');


// PATIENT CASE REPORTS
Route::get('/report/patientcase',[ReportPatientcaseController::class,'index'])->name('get-patientcase');

// OUTPATIENT CASE
Route::get('/report/outpatientcase',[ReportOutpatientcaseController::class,'index'])->middleware('checkAuth','checkNavs')->name('get-outpatientcase');
Route::get('/report/outpatientcase/pdf/{start}/{end}/{doctor}',[OutpatientCase::class,'getDate'])->name('get-outpatientpdf');
Route::get('/report/outpatientcase/excel/{start}/{end}/{doctor}',[OutpatientCase::class,'export'])->name('get-outpatientexcel');


Route::post('/updateBGInfo',[BackgroundInformation::class, 'saveBackgroundInfo']);


Route::post('/saveMrn',[BackgroundInformation::class, 'saveMrn']);

Route::get('/setup/item-management',[ItemManagementController::class,'itemList']);

//Get pages for user and group authorizations -CPN 01/18/2023
Route::get('/getauthpages',[UserAuthorization::class,'setParent'])->name('get-auth-pages');

//Save User And Group Authorization
Route::post('/setauthaccess',[UserAuthorization::class,'saveUserAuthorization'])->name('set-user-auth');

// SAVE THEME CONFIGURATION
Route::get('/saveTheme',[Theme::class,'getTheme']);
// SET THEME CONFIGURATION
Route::get('/setTheme',[Theme::class,'setTheme']);
