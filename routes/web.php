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
use App\Http\Controllers\PDF\TsetController;

//Model
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
    return view('welcome');
});

Route::get('/', function () {
  $result = QueryBuilder::for(User::class)
    ->allowedFilters(['MACHINE_CODE', 'MACHINE_LOCATION'])
    ->get();
    return $result;
    return view('machine/assets/machinelist');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/machine/dashboard/dashboard', function () {
    return view('/machine/dashboard/dashboard');
})->name('/machine/dashboard/dashboard');

Route::get('/machine/dashboard/sumaryline',[DashboardController::class,'Sumaryline'])->name('dashboard.sumaryline');
Route::get('/machine/dashboard/dashboard',[DashboardController::class,'Dashboard'])->name('dashboard.dashboard');



Route::get('/user/logout/',[MenuController::class,'Logout'])->name('user.logout');
//serach
Route::get('/search', [MachineController::class,'search']);

//Exportandimport
Route::get('users/export', [MachineExportController::class,'export']);
Route::get('users/import/show', [MachineImportController::class,'show']);
Route::post('users/import', [MachineImportController::class,'store']);

//PDF
Route::get('machine/pdf/machinepdf', 'App\Http\Controllers\PDF\TsetController@HtmlToPDF');


//assets
Route::get('machine/assets/machinelist'     ,[MachineController::class,'Index'])  ->name('machine.list');
Route::get('machine/assets/form'            ,[MachineController::class,'Create']) ->name('machine.form');
Route::post('machine/assets/store'          ,[MachineController::class,'Store'])  ->name('machine.store');
Route::get('machine/assets/edit/{UNID}'     ,[MachineController::class,'Edit'])   ->name('machine.edit');
Route::post('machine/assets/update/{UNID}'  ,[MachineController::class,'Update']);
Route::get('machine/assets/delete/{UNID}'   ,[MachineController::class,'Delete']) ->name('machine.delete');

//personal
Route::get('machine/personal/personallist'   ,[PersonalController::class,'Index'])  ->name('personal.list');
Route::get('machine/personal/form'            ,[PersonalController::class,'Create']) ->name('personal.form');
Route::post('machine/personal/store'          ,[PersonalController::class,'Store'])  ->name('personal.store');
Route::get('machine/personal/edit'            ,[PersonalController::class,'Edit'])   ->name('personal.edit');
Route::post('machine/personal/update/{UNID}'  ,[PersonalController::class,'Update']);
Route::get('machine/personal/delete/{UNID}'   ,[PersonalController::class,'Delete']) ->name('personal.delete');

//repair
Route::get('machine/repair/repairlist'         ,[RepairController::class,'Index'])  ->name('repair.list');
Route::get('machine/repair/form'            ,[RepairController::class,'Create']) ->name('repair.form');
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
Route::get('machine/sparepart/stock/stocklist'      ,[StockController::class,'Index'])  ->name('stock.list');
Route::get('machine/sparepart/stock/form'            ,[StockController::class,'Create']) ->name('stock.form');
Route::post('machine/sparepart/stock/store'          ,[StockController::class,'Store'])  ->name('stock.store');
Route::get('machine/sparepart/stock/edit'            ,[StockController::class,'Edit'])   ->name('stock.edit');
Route::post('machine/sparepart/stock/update/{UNID}'  ,[StockController::class,'Update']);
Route::get('machine/sparepart/stock/delete/{UNID}'   ,[StockController::class,'Delete']) ->name('stock.delete');


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
