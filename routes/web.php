<?php

use Illuminate\Support\Facades\Route;
//exprotcontroller
use App\Http\Controllers\Export\MachineExportController;
//ImprotController
use App\Http\Controllers\Import\MachineImportController;
//Controller
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\SettingMenu\MenuController;
use App\Http\Controllers\SettingMenu\MenuSubController;
use App\Http\Controllers\Machine\MachineController;
use App\Http\Controllers\Machine\PersonalController;
use App\Http\Controllers\Machine\RepairController;
use App\Http\Controllers\Machine\SparePartController;
use App\Http\Controllers\Machine\StockController;
use App\Http\Controllers\Machine\UploadController;
use App\Http\Controllers\Machine\ManualController;
use App\Http\Controllers\Machine\SysCheckController;
use App\Http\Controllers\Machine\PartCheckController;
use App\Http\Controllers\Machine\MachineTypeController;

use App\Http\Controllers\PDF\TsetController;
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
Route::get('machine/assets/machinelist0'     ,[MachineController::class,'All'])  ->name('machine.listall');
Route::get('machine/assets/machineline/{LINE_CODE}'     ,[MachineController::class,'Allline'])  ->name('machine.listallline');
Route::get('machine/assets/machinelist'     ,[MachineController::class,'Index'])  ->name('machine.list');
Route::get('machine/assets/form'            ,[MachineController::class,'Create']) ->name('machine.form');
Route::post('machine/assets/store'          ,[MachineController::class,'Store'])  ->name('machine.store');
Route::post('machine/assets/storehelp'      ,[MachineController::class,'StoreUpload']) ->name('machine.storeupload');
Route::get('machine/assets/edit/{UNID}'     ,[MachineController::class,'Edit'])   ->name('machine.edit');
Route::post('machine/assets/update/{UNID}'  ,[MachineController::class,'Update']);
Route::get('machine/assets/delete/{UNID}'   ,[MachineController::class,'Delete']) ->name('machine.delete');
Route::get('machine/assets/uploadpdf/{UNID}',[UploadPdfController::class,'Uploadpdf']);

//upload
Route::post('machine/upload/update/{UNID}'  ,[UploadController::class,'Update']);
Route::get('machine/upload/delete/{UNID}'   ,[UploadController::class,'Delete']) ->name('upload.delete');
Route::get('machine/upload/download/{UNID}'  ,[UploadController::class,'Download']) ->name('upload.download');
Route::get('machine/upload/view/{UNID}'     ,[UploadController::class,'View']) ->name('upload.view');

//manual
Route::get('machine/manual/manuallist'      ,[ManualController::class,'Index'])  ->name('manual.list');
Route::get('machine/manual/edit/{UNID}'     ,[ManualController::class,'Edit'])   ->name('manual.edit');
Route::post('machine/manual/update/{UNID}'  ,[ManualController::class,'Update']);
Route::get('machine/manual/delete/{UNID}'   ,[ManualController::class,'Delete']) ->name('manual.delete');

//syscheck
Route::get('machine/syscheck/syschecklist'    ,[SysCheckController::class,'Index'])  ->name('syscheck.list');
Route::get('machine/syscheck/edit/{UNID}'     ,[SysCheckController::class,'Edit'])   ->name('syscheck.edit');
Route::post('machine/syscheck/update/{UNID}'  ,[SysCheckController::class,'Update']);
Route::get('machine/syscheck/delete/{UNID}'   ,[SysCheckController::class,'Delete']) ->name('syscheck.delete');

//partcheck
Route::get('machine/partcheck/partchecklist'   ,[PartCheckController::class,'Index'])  ->name('partcheck.list');
Route::get('machine/partcheck/edit/{UNID}'     ,[PartCheckController::class,'Edit'])   ->name('partcheck.edit');
Route::post('machine/partcheck/update/{UNID}'  ,[PartCheckController::class,'Update']);
Route::get('machine/partcheck/delete/{UNID}'   ,[PartCheckController::class,'Delete']) ->name('partcheck.delete');

//personal
Route::get('machine/personal/personallist'   ,[PersonalController::class,'Index'])  ->name('personal.list');
Route::get('machine/personal/form'            ,[PersonalController::class,'Create']) ->name('personal.form');
Route::post('machine/personal/store'          ,[PersonalController::class,'Store'])  ->name('personal.store');
Route::get('machine/personal/edit/{UNID}'            ,[PersonalController::class,'Edit'])   ->name('personal.edit');
Route::post('machine/personal/update/{UNID}'  ,[PersonalController::class,'Update']);
Route::get('machine/personal/delete/{UNID}'   ,[PersonalController::class,'Delete']) ->name('personal.delete');

//machinetype
Route::get('machine/machinetype/machinetypelist'   ,[MachineTypeController::class,'Index'])  ->name('machinetype.list');
Route::get('machine/machinetype/form'            ,[MachineTypeController::class,'Create']) ->name('machinetype.form');
Route::post('machine/machinetype/store'          ,[MachineTypeController::class,'Store'])  ->name('machinetype.store');
Route::get('machine/machinetype/edit'            ,[MachineTypeController::class,'Edit'])   ->name('machinetype.edit');
Route::post('machine/machinetype/update/{UNID}'  ,[MachineTypeController::class,'Update']);
Route::get('machine/machinetype/delete/{UNID}'   ,[MachineTypeController::class,'Delete']) ->name('machinetype.delete');

//repair
Route::get('machine/repair/repairlist'         ,[RepairController::class,'Index'])  ->name('repair.list');
Route::get('machine/repair/form'            ,[RepairController::class,'Create']) ->name('repair.form');
Route::get('machine/repair/formdata'            ,[RepairController::class,'Create']) ->name('repair.formdata');
Route::post('machine/repair/store'          ,[RepairController::class,'Store'])  ->name('repair.store');
Route::get('machine/repair/edit'     ,[RepairController::class,'Edit'])   ->name('repair.edit');
Route::post('machine/repair/update/{UNID}'  ,[RepairController::class,'Update']);
Route::get('machine/repair/delete/{UNID}'   ,[RepairController::class,'Delete']) ->name('repair.delete');

//sparepart
Route::get('machine/sparepart/sparepartlist'   ,[SparePartController::class,'Index'])  ->name('sparepart.list');
Route::get('machine/sparepart/form'            ,[SparePartController::class,'Create']) ->name('sparepart.form');
Route::post('machine/sparepart/store'          ,[SparePartController::class,'Store'])  ->name('sparepart.store');
Route::get('machine/sparepart/edit'            ,[SparePartController::class,'Edit'])   ->name('sparepart.edit');
Route::post('machine/sparepart/update/{UNID}'  ,[SparePartController::class,'Update']);
Route::get('machine/sparepart/delete/{UNID}'   ,[SparePartController::class,'Delete']) ->name('sparepart.delete');

//stock
Route::get('machine/stock/stocklist'      ,[StockController::class,'Index'])  ->name('stock.list');
Route::get('machine/stock/form'            ,[StockController::class,'Create']) ->name('stock.form');
Route::post('machine/stock/store'          ,[StockController::class,'Store'])  ->name('stock.store');
Route::get('machine/stock/edit'            ,[StockController::class,'Edit'])   ->name('stock.edit');
Route::post('machine/stock/update/{UNID}'  ,[StockController::class,'Update']);
Route::get('machine/stock/delete/{UNID}'   ,[StockController::class,'Delete']) ->name('stock.delete');


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
