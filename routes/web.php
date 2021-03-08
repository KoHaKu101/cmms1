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
use App\Http\Controllers\MachineaddTable\MachineRepairTableController;
use App\Http\Controllers\MachineaddTable\MachineSpareTableController;
use App\Http\Controllers\MachineaddTable\MachineStatusTableController;
use App\Http\Controllers\MachineaddTable\MachineSysTemTableController;
use App\Http\Controllers\MachineaddTable\MachineSysTemSubTableController;
//************************* Search *********************************
use App\Http\Controllers\Search\RepairSearchController;

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
Route::get('/machine/repair/pdf', 'App\Http\Controllers\PDF\MachineRepairPDFController@HtmlToPDF');



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


Route::get('machine/repair/notificaiton' ,[DashboardController::class,'Notification']);
Route::get('machine/repair/notificaitoncount' ,[DashboardController::class,'NotificationCount'])  ->name('repair.notificaitoncount');
Route::get('/user/logout/',[MenuController::class,'Logout'])->name('user.logout');
//Exportandimport
Route::get('users/export', [MachineExportController::class,'export']);
Route::get('users/import/show', [MachineImportController::class,'show']);
Route::post('users/import', [MachineImportController::class,'store']);

//assets
Route::get('machine/assets/machinelist'     ,[MachineController::class,'All'])  ->name('machine.list');
  Route::get('machine/assets/machinelist/{LINE_CODE}'     ,[MachineController::class,'Allline'])  ->name('machine.listline');
  Route::get('machine/assets/machinetype/{TYPE_CODE}'     ,[MachineController::class,'Alltype'])  ->name('machine.listtype');
  Route::get('machine/assets/machine'     ,[MachineController::class,'Index'])  ->name('machine');
  Route::get('machine/assets/searchmachine'     ,[MachineController::class,'Indexserach'])  ->name('machine.search');
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
  Route::get('machine/repair/repairlistserach'         ,[MachineRepairController::class,'Indexserach'])  ->name('repair.listserach');
  Route::get('machine/repair/form/{MACHINE_CODE}'            ,[MachineRepairController::class,'Create']) ->name('repair.form');
  Route::get('machine/repair/repairsearch'            ,[MachineRepairController::class,'PrepareSearch'])->name('repair.repairsearch');
  Route::get('machine/repair/{EMP_NAME}', [MachineRepairController::class,'Emp'])->name('get.repair');
  Route::get('machine/repair/search' ,[MachineRepairController::class,'Search']) ;
  Route::post('machine/repair/store'          ,[MachineRepairController::class,'Store'])  ->name('repair.store');

  Route::get('machine/repair/edit/{UNID}'     ,[MachineRepairController::class,'Edit'])   ->name('repair.edit');
  Route::post('machine/repair/update/{UNID}'  ,[MachineRepairController::class,'Update']);
  Route::get('machine/repair/delete/{UNID}'   ,[MachineRepairController::class,'Delete']) ->name('repair.delete');
//sparepart
Route::get('machine/sparepart/sparepartlist'   ,[MachineSparePartController::class,'Index'])  ->name('sparepart.list');
  Route::get('machine/sparepart/form'            ,[MachineSparePartController::class,'Create']) ->name('sparepart.form');
  Route::post('machine/sparepart/store'          ,[MachineSparePartController::class,'Store'])  ->name('sparepart.store');
  Route::get('machine/sparepart/edit/'            ,[MachineSparePartController::class,'Edit'])   ->name('sparepart.edit');
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
  //machinetypetable
  Route::get('machine/machinetypetable/list'      ,[MachineTypeTableController::class,'Index'])  ->name('machinetypetable.list');
    Route::post('machine/machinetypetable/store'            ,[MachineTypeTableController::class,'Store']) ->name('machinetypetable.store');
    Route::get('machine/machinetypetable/form'            ,[MachineTypeTableController::class,'Create']) ->name('machinetypetable.form');
    Route::get('machine/machinetypetable/edit/{UNID}'     ,[MachineTypeTableController::class,'Edit'])   ->name('machinetypetable.edit');
    Route::post('machine/machinetypetable/update/{UNID}'  ,[MachineTypeTableController::class,'Update']);
    Route::get('machine/machinetypetable/delete/{UNID}'   ,[MachineTypeTableController::class,'Delete']) ->name('machinetypetable.delete');
  //repair
  Route::get('machine/machinerepairtable/list'        ,[MachineRepairTableController::class,'Index'])  ->name('machinerepairtable.list');
    Route::post('machine/machinerepairtable/store'          ,[MachineRepairTableController::class,'Store']) ->name('machinerepairtable.store');
    Route::get('machine/machinerepairtable/edit/{UNID}'     ,[MachineRepairTableController::class,'Edit'])   ->name('machinerepairtable.edit');
    Route::post('machine/machinerepairtable/update/{UNID}'  ,[MachineRepairTableController::class,'Update']);
    Route::get('machine/machinerepairtable/delete/{UNID}'   ,[MachineRepairTableController::class,'Delete']) ->name('machinerepairtable.delete');
  //sparepart
  Route::get('machine/machinespareparttable/list'     ,[MachineSpareTableController::class,'Index'])  ->name('machinespareparttable.list');
    Route::post('machine/machinespareparttable/store'          ,[MachineSpareTableController::class,'Store']) ->name('machinespareparttable.store');
    Route::get('machine/machinespareparttable/edit/{UNID}'     ,[MachineSpareTableController::class,'Edit'])   ->name('machinespareparttable.edit');
    Route::post('machine/machinespareparttable/update/{UNID}'  ,[MachineSpareTableController::class,'Update']);
    Route::get('machine/machinespareparttable/delete/{UNID}'   ,[MachineSpareTableController::class,'Delete']) ->name('machinespareparttable.delete');
  //status
  Route::get('machine/machinestatustable/list'      ,[MachineStatusTableController::class,'Index'])  ->name('machinestatustable.list');
    Route::post('machine/machinestatustable/store'            ,[MachineStatusTableController::class,'Store']) ->name('machinestatustable.store');
    Route::get('machine/machinestatustable/form'            ,[MachineStatusTableController::class,'Create']) ->name('machinestatustable.form');
    Route::get('machine/machinestatustable/edit/{UNID}'     ,[MachineStatusTableController::class,'Edit'])   ->name('machinestatustable.edit');
    Route::post('machine/machinestatustable/update/{UNID}'  ,[MachineStatusTableController::class,'Update']);
    Route::get('machine/machinestatustable/delete/{UNID}'   ,[MachineStatusTableController::class,'Delete']) ->name('machinestatustable.delete');
  //system
  Route::get('machine/machinesystemtable/list'     ,[MachineSysTemTableController::class,'Index'])  ->name('machinesystemtable.list');
    Route::post('machine/machinesystemtable/store'          ,[MachineSysTemTableController::class,'Store']) ->name('machinesystemtable.store');
    Route::get('machine/machinesystemtable/edit/{UNID}'     ,[MachineSysTemTableController::class,'Edit'])   ->name('machinesystemtable.edit');
    Route::post('machine/machinesystemtable/update/{UNID}'  ,[MachineSysTemTableController::class,'Update']);
    Route::get('machine/machinesystemtable/delete/{UNID}'   ,[MachineSysTemTableController::class,'Delete']) ->name('machinesystemtable.delete');
  //system
  Route::get('machine/machinesystemsubtable/list'     ,[MachineSysTemSubTableController::class,'Index'])  ->name('machinesystemsubtable.list');
    Route::post('machine/machinesystemsubtable/store'          ,[MachineSysTemSubTableController::class,'Store']) ->name('machinesystemsubtable.store');
    Route::get('machine/machinesystemsubtable/edit/{UNID}'     ,[MachineSysTemSubTableController::class,'Edit'])   ->name('machinesystemsubtable.edit');
    Route::post('machine/machinesystemsubtable/update/{UNID}'  ,[MachineSysTemSubTableController::class,'Update']);
    Route::get('machine/machinesystemsubtable/delete/{UNID}'   ,[MachineSysTemSubTableController::class,'Delete']) ->name('machinesystemsubtable.delete');

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
