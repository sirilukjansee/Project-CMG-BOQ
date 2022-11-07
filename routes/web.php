<?php

use App\catagory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoqController;
use App\Http\Controllers\FormboqController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DesignerPMController;
use App\Http\Controllers\TaskNameController;
use App\Http\Controllers\TaskTypeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\VenderController;
use App\Http\Controllers\MasterTORController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CapexController;
use App\Http\Controllers\ConceptController;
use App\Http\Controllers\ImportVenderController;
use App\Http\Controllers\AucController;
use App\Http\Controllers\ReportAllController;
use App\Http\Controllers\ReportDesignerController;
use App\Http\Controllers\ReportYearController;
// use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/allBoq', function () {
//     return view('boq.allBoq');
// });
// Route::get('/loginBoq', function () {
//     return view('boq.loginBoq');
// });

// Route::get('/addminorBoq', function () {
//     return view('boq.formBoq.addminorBoq');
// });
// Route::get('/adminBoq', function () {
//     return view('boq.adminBoq');
// });
Route::get('/testSend', [ProjectController::class, 'sendFile'])->name('testSend');

Route::get('test-select', function () {
    return view('boq.master.test-select');
});

Route::middleware(['auth'])->group(function () {
    //master
    Route::get('/masterBoq', [MasterController::class, 'index'])->name('masterBoq');
    Route::get('/sub_masterBoq/{id}', [MasterController::class, 'index_sub'])->name('sub_masterBoq');

    //master task_name
    Route::get('/masterTaskName', [TaskNameController::class, 'index'])->name('masterTaskName');
    Route::post('/masterTaskName/add', [TaskNameController::class, 'store'])->name('add_masterTaskName');
    Route::get('/masterTaskName/edit/{id}', [TaskNameController::class, 'edit'])->name('/masterTaskName/edit/{id}');
    Route::post('/masterTaskName/update', [TaskNameController::class, 'update']);
    // Route::get('/masterTaskName/softdelete/{id}',[TaskNameController::class,'softdelete']);
    Route::get('/masterTaskName/changeStatus/{id}',[TaskNameController::class,'changeStatus']);
    Route::get('/masterTaskName/chk/{data}',[TaskNameController::class,'taskNameChk']);

    //master task_type
    Route::get('/masterTaskType', [TaskTypeController::class, 'index'])->name('masterTaskType');
    Route::post('/masterTaskType/add', [TaskTypeController::class, 'store'])->name('add_masterTaskType');
    Route::get('/masterTaskType/edit/{id}', [TaskTypeController::class, 'edit'])->name('/masterTaskType/edit/{id}');
    Route::post('/masterTaskType/update', [TaskTypeController::class, 'update']);
    // Route::get('/masterTaskType/softdelete/{id}',[TaskTypeController::class,'softdelete']);
    Route::get('/masterTaskType/changeStatus/{id}',[TaskTypeController::class,'changeStatus']);
    Route::get('/masterTaskType/chk/{data}',[TaskTypeController::class,'taskTypeChk']);

    //master design_pm
    Route::get('/masterDesignPM', [DesignerPMController::class, 'index'])->name('masterDesignPM');
    Route::post('/masterDesignPM/add', [DesignerPMController::class, 'store'])->name('add_masterDesignPM');
    Route::get('/masterDesignPM/edit/{id}', [DesignerPMController::class, 'edit'])->name('/masterDesignPM/edit/{id}');
    Route::post('/masterDesignPM/update', [DesignerPMController::class, 'update']);
    // Route::get('/masterDesignPM/softdelete/{id}',[DesignerPMController::class,'softdelete']);
    Route::get('/masterDesignPM/changeStatus/{id}',[DesignerPMController::class,'changeStatus']);
    Route::get('/masterDesignPM/chk/{data}',[DesignerPMController::class,'designChk']);

    //master brand
    Route::get('/masterBrand', [BrandController::class, 'index'])->name('masterBrand');
    Route::post('/masterBrand/add', [BrandController::class, 'store'])->name('add_masterBrand');
    Route::get('/masterBrand/edit/{id}', [BrandController::class, 'edit'])->name('/masterBrand/edit/{id}');
    Route::post('/masterBrand/update', [BrandController::class, 'update']);
    // Route::get('/masterBrand/softdelete/{id}',[BrandController::class,'softdelete']);
    Route::get('/masterBrand/changeStatus/{id}',[BrandController::class,'changeStatus']);
    Route::get('/masterBrand/chk/{data}',[BrandController::class,'brandChk']);

    //master Concept
    Route::get('/masterConcept', [ConceptController::class, 'index'])->name('masterConcept');
    Route::post('/masterConcept/add', [ConceptController::class, 'store']);
    Route::get('/masterConcept/edit/{id}', [ConceptController::class, 'edit'])->name('/masterConcept/edit/{id}');
    Route::post('/masterConcept/update', [ConceptController::class, 'update']);
    // // Route::get('/masterBrand/softdelete/{id}',[ConceptController::class,'softdelete']);
    Route::get('/masterConcept/changeStatus/{id}',[ConceptController::class,'changeStatus']);
    Route::get('/masterConcept/chk/{data}',[ConceptController::class,'ConceptChk']);

    //master location
    Route::get('/masterLocation', [LocationController::class, 'index'])->name('masterLocation');
    Route::post('/masterLocation/add', [LocationController::class, 'store'])->name('add_masterLocation');
    Route::get('/masterLocation/edit/{id}', [LocationController::class, 'edit'])->name('/masterLocation/edit/{id}');
    Route::post('/masterLocation/update', [LocationController::class, 'update']);
    // Route::get('/masterLocation/softdelete/{id}',[LocationController::class,'softdelete']);
    Route::get('/masterLocation/changeStatus/{id}',[LocationController::class,'changeStatus']);
    Route::get('/masterLocation/chk/{data}',[LocationController::class,'locationChk']);

    //master unit
    Route::get('/masterUnit', [UnitController::class, 'index'])->name('masterUnit');
    Route::post('/masterUnit/add', [UnitController::class, 'store'])->name('add_masterUnit');
    Route::get('/masterUnit/edit/{id}', [UnitController::class, 'edit'])->name('/masterUnit/edit/{id}');
    Route::post('/masterUnit/update', [UnitController::class, 'update']);
    // Route::get('/masterUnit/softdelete/{id}',[UnitController::class,'softdelete']);
    Route::get('/masterUnit/changeStatus/{id}',[UnitController::class,'changeStatus']);
    Route::get('/masterUnit/chk/{data}',[UnitController::class,'unitChk']);

    //master vender
    Route::get('/masterVender', [VenderController::class, 'index'])->name('masterVender');
    Route::post('/masterVender/add', [VenderController::class, 'store'])->name('add_masterVender');
    Route::get('/masterVender/edit/{id}', [VenderController::class, 'edit'])->name('/masterVender/edit/{id}');
    Route::post('/masterVender/update', [VenderController::class, 'update']);
    // Route::get('/masterVender/softdelete/{id}',[VenderController::class,'softdelete']);
    Route::get('/masterVender/changeStatus/{id}',[VenderController::class,'changeStatus']);
    Route::get('/masterVender/chk/{data}',[VenderController::class,'venderChk']);

    //master TOR
    Route::get('/masterTOR', [MasterTORController::class, 'index'])->name('masterTOR');
    Route::post('/masterTOR/add', [MasterTORController::class, 'store'])->name('masterTOR/add');
    Route::get('/masterTOR/edit/{id}', [MasterTORController::class, 'edit']);
    Route::post('/masterTOR/update', [MasterTORController::class, 'update']);
    // Route::get('/masterTOR/softdelete/{id}',[VenderController::class,'softdelete']);
    Route::get('/masterTOR/changeStatus/{id}',[MasterTORController::class,'changeStatus']);
    Route::get('/masterTOR/chk/{data}',[MasterTORController::class,'torChk']);

    Route::get('/masterTOR/detail/{id}', [MasterTORController::class, 'create_detail']);
    Route::post('/masterTOR/add_detail', [MasterTORController::class, 'store_detail'])->name('masterTOR/add_detail');
    Route::get('/masterTOR/edit_detail/{id}', [MasterTORController::class, 'edit_detail']);
    Route::post('/masterTOR/update_detail', [MasterTORController::class, 'update_detail']);
    // Route::get('/masterTOR/softdelete_detail/{id}',[VenderController::class,'softdelete_detail']);//////
    Route::get('/masterTOR/changeStatus_detail/{id}',[MasterTORController::class,'changeStatus_detail']);
    Route::get('/masterTOR/chk_detail/{data}',[MasterTORController::class,'torDetailChk']);


    //main
    Route::post('/masterBoq/add', [MasterController::class, 'store'])->name('add_masterBoq');
    Route::get('/master/edit/{id}', [MasterController::class, 'edit'])->name('/master/edit/{id}');
    Route::post('/masterBoq/update', [MasterController::class, 'update']);
    // Route::get('/master/softdelete/{id}',[MasterController::class,'softdelete']);
    Route::get('/masterBoq/changeStatus/{id}',[MasterController::class, 'changeStatus']);
    Route::get('/masterBoq/chk/{data}',[MasterController::class, 'masterBoqChk']);

    //sub
    Route::post('/sub_masterBoq/add_sub', [MasterController::class, 'store_sub'])->name('add_sub_masterBoq');
    Route::get('/sub_masterBoq/edit/{id}', [MasterController::class, 'edit_sub'])->name('/sub_masterBoq/edit/{id}');
    Route::post('/sub_masterBoq/update', [MasterController::class, 'update_sub']);
    // Route::get('/sub_masterBoq/softdelete/{id}',[MasterController::class,'softdelete_sub']);
    Route::get('/sub_masterBoq/changeStatus/{id}',[MasterController::class,'changeStatus_sub']);
    Route::get('/sub_masterBoq/chk/{data}',[MasterController::class, 'subMasterBoqChk']);

    //dashboard
    Route::get('/adminBoq', [ProjectController::class, 'adminView']);

    //project
    Route::get('/index', [ProjectController::class, 'index'])->name('index');
    Route::get('/addprojectBoq', [ProjectController::class, 'create'])->name('addprojectBoq');
    Route::post('/addprojectBoq/add', [ProjectController::class, 'store'])->name('/addprojectBoq/add');
    Route::get('/addprojectBoq/chk_io/{id}', [ProjectController::class, 'chk_id']);
    Route::get('/editprojectBoq/{id}', [ProjectController::class, 'edit']);
    Route::post('/projectBoq/update', [ProjectController::class, 'update']);
    //BOQ
    Route::get('/allBoq/{id}', [BoqController::class, 'index'])->name('allBoq');
    Route::post('/addBoq/add', [BoqController::class, 'store'])->name('add_Boq');
    Route::get('/editFormBoq/edit/{id}', [BoqController::class, 'edit'])->name('editformBoq');
    Route::post('/formBoq/update', [BoqController::class, 'update']);
    Route::post('/change_status_boq', [BoqController::class, 'change_status_boq'])->name('change_status_boq');
    Route::post('/addBoq1/add', [BoqController::class, 'store_aj'])->name('add_Boq1');

    Route::get('/addformboq-template/{templateid}/{id}', [BoqController::class, 'choose_temp']);

    //view
    Route::get('/viewBoq/{id}', [BoqController::class, 'view_boq']);
    Route::get('/viewBoq/{id}', [BoqController::class, 'export_boq']);


    Route::get('/createformBoq/{id}', [FormboqController::class, 'index'])->name('createformboq');
    Route::get('/addformBoq/select-catagory', [FormboqController::class, 'select_catagory']);

    Route::get('projects/export/{id}', [BoqController::class, 'export']);


    //manager_approve
    Route::get('/checkBoq', [ManagerController::class, 'index']);
    Route::post('/approve_store',[ManagerController::class, 'store']);

    // Users
    Route::get('users', [UsersController::class, 'index']);
    Route::post('/users/add', [UsersController::class, 'store'])->name('adduser');
    Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('/users/edit/{id}');
    Route::post('/users/update', [UsersController::class, 'update']);
    Route::get('/changeStatus_user/{id}', [UsersController::class, 'changeStatus'])->name('changeStatus_user');

    // Capex
    Route::get('capex/{id}', [CapexController::class, 'index']);
    Route::post('/capex/add', [CapexController::class, 'store'])->name('addcapex');
    // Route::post('/approve_store',[ManagerController::class, 'store']);

    //AUC
    Route::get('auc/{id}', [AucController::class, 'index']);
    Route::get('select-to-auc/{id}/{id_1}', [AucController::class, 'select_auc']);

    // Import File
    Route::post('/import-boqvender', [ImportVenderController::class, 'uploadBoqVender']);
    Route::post('/import-brand', [BrandController::class, 'uploadBrand']);
    Route::post('/import-location', [LocationController::class, 'uploadLocation']);
    Route::post('/import-category', [MasterController::class, 'uploadCategory']);
    Route::post('/import-category-sub', [MasterController::class, 'uploadCategory_sub']);
    Route::post('/import-designer', [DesignerPMController::class, 'uploadDesigner']);
    Route::post('/import-vender', [VenderController::class, 'uploadVender']);
    Route::post('/import-task-name', [TaskNameController::class, 'uploadTaskName']);
    Route::post('/import-task-type', [TaskTypeController::class, 'uploadTaskType']);
    Route::post('/import-unit', [UnitController::class, 'uploadUnit']);
    Route::post('/import-tor', [MasterTORController::class, 'uploadTor']);
    Route::post('/import-tor-detail', [MasterTORController::class, 'uploadTorDetail']);
    Route::post('/import-Concept', [ConceptController::class, 'uploadConcept']);

    // Export File
    Route::get('/export-vender/{id}', [ImportVenderController::class, 'export']);
    Route::get('/export-brand', [BrandController::class, 'export']);
    Route::get('/export-location', [LocationController::class, 'export']);
    Route::get('/export-category', [MasterController::class, 'export']);
    Route::get('/export-category_sub/{id}', [MasterController::class, 'export_sub']);
    Route::get('/export-designer', [DesignerPMController::class, 'export']);
    Route::get('/export-vender', [VenderController::class, 'export']);
    Route::get('/export-task-name', [TaskNameController::class, 'export']);
    Route::get('/export-task-type', [TaskTypeController::class, 'export']);
    Route::get('/export-unit', [UnitController::class, 'export']);
    Route::get('/export-tor', [MasterTORController::class, 'export']);
    Route::get('/export-Concept', [ConceptController::class, 'export']);
    Route::post('/export-auc', [AucController::class, 'export']);
    Route::get('/export-auc/{id}', [AucController::class, 'send_chhk']);
    Route::get('/capex/export/{id}', [CapexController::class, 'export']);

    // Report
    Route::get('reportAll', [ReportAllController::class, 'index']);
    Route::get('reportAll-detail/{id}', [ReportAllController::class, 'index_detail']);

    Route::get('report-designer', [ReportDesignerController::class, 'index']);
    Route::get('report-designer-detail/{id}/{month}', [ReportDesignerController::class, 'index_detail']);
    Route::post('report-designer-search', [ReportDesignerController::class, 'search']);

    Route::get('report-year', [ReportYearController::class, 'index']);
    Route::get('report-task-type-ref-brand', [ReportYearController::class, 'index_brand']);
    Route::get('report-task-type-ref-location', [ReportYearController::class, 'index_location']);
});

// Route::get('/addminorBoq', [ExcelController::class, 'index']);
// Route::get('/addminorBoq/export', [ExcelController::class, 'ExportExcel']);

Route::get('/clc', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
