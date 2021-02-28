<?php

use Illuminate\Support\Facades\Route;
//exprotcontroller
use App\Http\Controllers\Export\MachineExportController;
//ImprotController
use App\Http\Controllers\Import\MachineImportController;

//************************* Menu *************************************
use App\Http\Controllers\SettingMenu\MenuController;
use App\Http\Controllers\SettingMenu\MenuSubController;
//************************* Controller *******************************
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Machine\MachineController;
use App\Http\Controllers\Machine\PersonalController;
use App\Http\Controllers\Machine\MachineRepairController;
use App\Http\Controllers\Machine\MachineSparePartController;
use App\Http\Controllers\Machine\StockController;
use App\Http\Controllers\Machine\MachineUploadController;
use App\Http\Controllers\Machine\MachineManualController;
use App\Http\Controllers\Machine\SysCheckController;
use App\Http\Controllers\Machine\MachinePartCheckController;
use App\Http\Controllers\Machine\PaySpareController;

//************************* add tabel *********************************
use App\Http\Controllers\MachineaddTable\MachineTypeTableController;
use App\Http\Controllers\MachineaddTable\MachineSpareTableController;
use App\Http\Controllers\MachineaddTable\MachineRepairTableController;
use App\Http\Controllers\MachineaddTable\MachineStatusTableController;
//****************************** PDF **********************************
use App\Http\Controllers\PDF\MachineRepairPDFController;
use App\Http\Controllers\PDF\UploadPdfController;
//Model
use App\Models\Machine\Machnie;
use App\Models\SettingMenu\Mainmenu;
use App\Models\SettingMenu\Menusubitem;




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
    return view('auth/login');
});
Route::get('/machine/repair/pdf', 'App\Http\Controllers\PDF\TsetController@HtmlToPDF');



Route::get('/machine/repair/getRequest', function(){
  if(Request::ajax()){
    return 'getRequest has load';
  }
});
Route::get('/machine/repair/search',function(){
  if(Request::ajax()){
    return Response::json(Request::all());
  }});


Route::middleware(['auth:sanctum', 'verified']);

Route::get('/machine/dashboard/sumaryline',[DashboardController::class,'Sumaryline'])->name('dashboard.sumaryline');
Route::get('/machine/dashboard/dashboard',[DashboardController::class,'Dashboard']);
Route::get('/machine',[DashboardController::class,'Dashboard']);
Route::get('/machine/dashboard',[DashboardController::class,'Dashboard'])->name('dashboard.dashboard');
Route::get('/dashboard',[DashboardController::class,'Dashboard'])->name('dashboard');



Route::get('/user/logout/',[MenuController::class,'Logout'])->name('user.logout');
//serach
Route::get('/search', [MachineController::class,'search']);

//Exportandimport
Route::get('users/export', [MachineExportController::class,'export']);
Route::get('users/import/show', [MachineImportController::class,'show']);
Route::post('users/import', [MachineImportController::class,'store']);

//assets
Route::get('machine/assets/machinelist'     ,[MachineController::class,'All'])  ->name('machine.list');
  Route::get('machine/assets/machinelist/{LINE_CODE}'     ,[MachineController::class,'Allline'])  ->name('machine.listline');
  Route::get('machine/assets/machinetype/{TYPE_CODE}'     ,[MachineController::class,'Alltype'])  ->name('machine.listtype');
  Route::get('machine/assets/machine'     ,[MachineController::class,'Index'])  ->name('machine');
  Route::get('machine/assets/form'            ,[MachineController::class,'Create']) ->name('machine.form');
  Route::post('machine/assets/store'          ,[MachineController::class,'Store'])  ->name('machine.store');
  Route::get('machine/assets/edit/{UNID}'     ,[MachineController::class,'Edit'])   ->name('machine.edit');
  Route::get('machine/assets/edit:/{UPLOAD_UNID_REF}'     ,[MachineController::class,'Editback'])   ->name('machine.edit:');
  Route::post('machine/assets/update/{UNID}'  ,[MachineController::class,'Update']);
  Route::get('machine/assets/delete/{UNID}'   ,[MachineController::class,'Delete']) ->name('machine.delete');

//upload
Route::post('machine/assets/storeupload'      ,[MachineUploadController::class,'StoreUpload']) ->name('machine.storeupload');
  Route::get('machine/upload/edit/{UNID}'     ,[MachineUploadController::class,'Edit'])   ->name('manual.edit');
  Route::post('machine/upload/update/{UNID}'  ,[MachineUploadController::class,'Update']);
  Route::get('machine/assets/uploadpdf/{UNID}',[UploadPdfController::class,'Uploadpdf']);
  Route::get('machine/assets/showpdf/{UNID}'  ,[UploadPdfController::class,'Showpdf'])->name('show.pdf');
  Route::get('machine/upload/delete/{UNID}'   ,[MachineUploadController::class,'Delete']) ->name('upload.delete');
  Route::get('machine/upload/download/{UNID}'  ,[MachineUploadController::class,'Download']) ->name('upload.download');
  Route::get('machine/upload/view/{UNID}'     ,[MachineUploadController::class,'View']) ->name('upload.view');

//manual
Route::get('machine/manual/manuallist'      ,[MachineManualController::class,'Index'])  ->name('manual.list');
  Route::get('machine/manual/show/{UNID}'     ,[MachineManualController::class,'Show'])   ->name('manual.Show');
  Route::post('machine/manual/update/{UNID}'  ,[MachineManualController::class,'Update']);
  Route::get('machine/manual/delete/{UNID}'   ,[MachineManualController::class,'Delete']) ->name('manual.delete');

//syscheck
Route::get('machine/syscheck/syschecklist'    ,[SysCheckController::class,'Index'])  ->name('syscheck.list');
Route::get('machine/syscheck/syschecklist:/{LINE_CODE}'    ,[SysCheckController::class,'Indexline'])  ->name('syscheck.listline');
  Route::get('machine/syscheck/edit/{UNID}'     ,[SysCheckController::class,'Edit'])   ->name('syscheck.edit');
  Route::post('machine/syscheck/update/{UNID}'  ,[SysCheckController::class,'Update']);
  Route::get('machine/syscheck/delete/{UNID}'   ,[SysCheckController::class,'Delete']) ->name('syscheck.delete');
//partcheck
Route::get('machine/partcheck/partchecklist'   ,[MachinePartCheckController::class,'Index'])  ->name('partcheck.list');
  Route::get('machine/partcheck/add/{UNID}'    ,[MachinePartCheckController::class,'Editmain'])   ->name('partcheck.add');
  Route::get('machine/partcheck/edit/{UNID}'     ,[MachinePartCheckController::class,'Edit'])   ->name('partcheck.edit');
  Route::post('machine/partcheck/update/{UNID}'  ,[MachinePartCheckController::class,'Update']);
  Route::get('machine/partcheck/delete/{UNID}'   ,[MachinePartCheckController::class,'Delete']) ->name('partcheck.delete');
//personal
Route::get('machine/personal/personallist'   ,[PersonalController::class,'Index'])  ->name('personal.list');
  Route::get('machine/personal/form'            ,[PersonalController::class,'Create']) ->name('personal.form');
  Route::post('machine/personal/store'          ,[PersonalController::class,'Store'])  ->name('personal.store');
  Route::get('machine/personal/edit/{UNID}'            ,[PersonalController::class,'Edit'])   ->name('personal.edit');
  Route::post('machine/personal/update/{UNID}'  ,[PersonalController::class,'Update']);
  Route::get('machine/personal/delete/{UNID}'   ,[PersonalController::class,'Delete']) ->name('personal.delete');
//repair
Route::get('machine/repair/repairlist'         ,[MachineRepairController::class,'Index'])  ->name('repair.list');
  Route::get('machine/repair/form'            ,[MachineRepairController::class,'Create']) ->name('repair.form');
  Route::get('machine/repair/formdata'            ,[MachineRepairController::class,'Create']) ->name('repair.formdata');
  Route::post('machine/repair/store'          ,[MachineRepairController::class,'Store'])  ->name('repair.store');
  Route::get('machine/repair/edit'     ,[MachineRepairController::class,'Edit'])   ->name('repair.edit');
  Route::post('machine/repair/update/{UNID}'  ,[MachineRepairController::class,'Update']);
  Route::get('machine/repair/delete/{UNID}'   ,[MachineRepairController::class,'Delete']) ->name('repair.delete');
//sparepart
Route::get('machine/sparepart/sparepartlist'   ,[MachineSparePartController::class,'Index'])  ->name('sparepart.list');
  Route::get('machine/sparepart/form'            ,[MachineSparePartController::class,'Create']) ->name('sparepart.form');
  Route::post('machine/sparepart/store'          ,[MachineSparePartController::class,'Store'])  ->name('sparepart.store');
  Route::get('machine/sparepart/edit'            ,[MachineSparePartController::class,'Edit'])   ->name('sparepart.edit');
  Route::post('machine/sparepart/update/{UNID}'  ,[MachineSparePartController::class,'Update']);
  Route::get('machine/sparepart/delete/{UNID}'   ,[MachineSparePartController::class,'Delete']) ->name('sparepart.delete');
//stock
Route::get('machine/stock/stocklist'      ,[StockController::class,'Index'])  ->name('stock.list');
  Route::get('machine/stock/form'            ,[StockController::class,'Create']) ->name('stock.form');
  Route::post('machine/stock/store'          ,[StockController::class,'Store'])  ->name('stock.store');
  Route::get('machine/stock/edit'            ,[StockController::class,'Edit'])   ->name('stock.edit');
  Route::post('machine/stock/update/{UNID}'  ,[StockController::class,'Update']);
  Route::get('machine/stock/delete/{UNID}'   ,[StockController::class,'Delete']) ->name('stock.delete');
//pay
Route::get('machine/pay/paylist'      ,[PaySpareController::class,'Index'])  ->name('pay.list');
  Route::get('machine/pay/form'            ,[PaySpareController::class,'Create']) ->name('pay.form');
  Route::post('machine/pay/store'          ,[PaySpareController::class,'Store'])  ->name('pay.store');
  Route::get('machine/pay/edit'            ,[PaySpareController::class,'Edit'])   ->name('pay.edit');
  Route::post('machine/pay/update/{UNID}'  ,[PaySpareController::class,'Update']);
  Route::get('machine/pay/delete/{UNID}'   ,[PaySpareController::class,'Delete']) ->name('pay.delete');

  //***************************** tabledata ****************************************
  //typemachine
  Route::get('machine/typemachine/typemachinelist'      ,[MachineTypeTableController::class,'Index'])  ->name('typemachine.list');
    Route::post('machine/typemachine/store'            ,[MachineTypeTableController::class,'Store']) ->name('typemachine.store');
    Route::get('machine/typemachine/form'            ,[MachineTypeTableController::class,'Create']) ->name('typemachine.form');
    Route::get('machine/typemachine/edit/{UNID}'     ,[MachineTypeTableController::class,'Edit'])   ->name('typemachine.edit');
    Route::post('machine/typemachine/update/{UNID}'  ,[MachineTypeTableController::class,'Update']);
    Route::get('machine/typemachine/delete/{UNID}'   ,[MachineTypeTableController::class,'Delete']) ->name('typemachine.delete');
    //status
    Route::get('machine/machinestatus/machinestatuslist'      ,[MachineStatusTableController::class,'Index'])  ->name('machinestatus.list');
      Route::post('machine/machinestatus/store'            ,[MachineStatusTableController::class,'Store']) ->name('machinestatus.store');
      Route::get('machine/machinestatus/form'            ,[MachineStatusTableController::class,'Create']) ->name('machinestatus.form');
      Route::get('machine/machinestatus/edit/{UNID}'     ,[MachineStatusTableController::class,'Edit'])   ->name('machinestatus.edit');
      Route::post('machine/machinestatus/update/{UNID}'  ,[MachineStatusTableController::class,'Update']);
      Route::get('machine/machinestatus/delete/{UNID}'   ,[MachineStatusTableController::class,'Delete']) ->name('machinestatus.delete');
  //repair
  Route::get('machine/table/repairlist'        ,[MachineRepairTableController::class,'Index'])  ->name('tablerepair.list');
    Route::post('machine/table/store'          ,[MachineRepairTableController::class,'Store']) ->name('tablerepair.store');
    Route::get('machine/table/edit/{UNID}'     ,[MachineRepairTableController::class,'Edit'])   ->name('tablerepair.edit');
    Route::post('machine/table/update/{UNID}'  ,[MachineRepairTableController::class,'Update']);
    Route::get('machine/table/delete/{UNID}'   ,[MachineRepairTableController::class,'Delete']) ->name('tablerepair.delete');
  //sparepart
  Route::get('machine/table/sparepartlist'     ,[MachineSpareTableController::class,'Index'])  ->name('tablesparepart.list');
    Route::post('machine/table/store'          ,[MachineSpareTableController::class,'Store']) ->name('tablesparepart.store');
    Route::get('machine/table/edit/{UNID}'     ,[MachineSpareTableController::class,'Edit'])   ->name('tablesparepart.edit');
    Route::post('machine/table/update/{UNID}'  ,[MachineSpareTableController::class,'Update']);
    Route::get('machine/table/delete/{UNID}'   ,[MachineSpareTableController::class,'Delete']) ->name('tablesparepart.delete');
  //***************************** MENU ****************************************
//MenuController
Route::get('machine/setting/menu/home'              ,[MenuController::class,'Home'])   ->name('menu.home');
  Route::post('machine/setting/menu/add'              ,[MenuController::class,'AddMenu'])->name('menu.store');
  Route::get('machine/setting/menu/edit/{UNID}'       ,[MenuController::class,'Edit']);
  Route::post('machine/setting/menu/update/{UNID}'    ,[MenuController::class,'Update']);
  Route::get('machine/setting/menu/delete/{UNID}'     ,[MenuController::class,'Delete']);
//submenucontroller
Route::get('machine/setting/submenu/home/{UNID}'    ,[MenuSubController::class,'subhome'])->name('submenu.home');
  Route::post('machine/setting/submenu/add'           ,[MenuSubController::class,'AddMenu'])->name('submenu.store');
  Route::get('machine/setting/submenu/edit/{UNID}'    ,[MenuSubController::class,'Edit']);
  Route::post('machine/setting/submenu/update/{UNID}' ,[MenuSubController::class,'Update']);
  Route::get('machine/setting/submenu/delete{UNID}'   ,[MenuSubController::class,'Delete']);
