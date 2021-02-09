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



Route::get('/user/logout/',[MenuController::class,'Logout'])->name('user.logout');
//serach
Route::get('/search', [MachineController::class,'search']);

//Exportandimport
Route::get('users/export', [MachineExportController::class,'export']);
Route::get('users/import/show', [MachineImportController::class,'show']);
Route::post('users/import', [MachineImportController::class,'store']);


//assets
Route::get('machine/assets/machinelist'     ,[MachineController::class,'Index'])  ->name('machine.list');
Route::get('machine/assets/form'            ,[MachineController::class,'Create']) ->name('machine.form');
Route::post('machine/assets/store'          ,[MachineController::class,'Store'])  ->name('machine.store');
Route::get('machine/assets/edit/{UNID}'     ,[MachineController::class,'Edit'])   ->name('machine.edit');
Route::post('machine/assets/update/{UNID}'  ,[MachineController::class,'Update']);
Route::get('machine/assets/delete/{UNID}'   ,[MachineController::class,'Delete']) ->name('machine.delete');

//assets
Route::get('machine/personal/personallist'     ,[MachineController::class,'Index'])  ->name('personal.list');
Route::get('machine/personal/form'            ,[MachineController::class,'Create']) ->name('personal.form');
Route::post('machine/personal/store'          ,[MachineController::class,'Store'])  ->name('personal.store');
Route::get('machine/personal/edit/{UNID}'     ,[MachineController::class,'Edit'])   ->name('personal.edit');
Route::post('machine/personal/update/{UNID}'  ,[MachineController::class,'Update']);
Route::get('machine/personal/delete/{UNID}'   ,[MachineController::class,'Delete']) ->name('personal.delete');



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
