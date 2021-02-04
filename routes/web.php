<?php

use Illuminate\Support\Facades\Route;

//Controller
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {


    return view('dashboard');
})->name('dashboard');


Route::get('/user/logout/',[MenuController::class,'Logout'])->name('user.logout');

//assets
Route::get('machine/assets/machinelist'     ,[MachineController::class,'Index'])->name('machine.list');
Route::get('machine/assets/form'            ,[MachineController::class,'Create'])->name('machine.form');
Route::post('machine/assets/store'          ,[MachineController::class,'Store'])->name('machine.store');
Route::get('machine/assets/edit/{UNID}'     ,[MachineController::class,'Edit'])->name('machine.edit');
Route::post('machine/assets/update/{UNID}'  ,[MachineController::class,'Update']);
Route::get('machine/assets/delete/{UNID}'   ,[MachineController::class,'Delete'])->name('machine.delete');






//MenuController
Route::get('setting/menu/home'                       ,[MenuController::class,'Home'])->name('menu.home');
Route::post('setting/menu/add'                       ,[MenuController::class,'AddMenu'])->name('menu.store');
Route::get('setting/menu/edit/{UNID}'                ,[MenuController::class,'Edit']);
Route::post('setting/menu/update/{UNID}'             ,[MenuController::class,'Update']);
Route::get('setting/menu/delete/{UNID}'              ,[MenuController::class,'Delete']);


//submenucontroller
Route::get('setting/submenu/home/{UNID}'             ,[MenuSubController::class,'subhome'])->name('submenu.home');
Route::post('setting/submenu/add'                            ,[MenuSubController::class,'AddMenu'])->name('submenu.store');
Route::get('setting/submenu/edit/{UNID}'                     ,[MenuSubController::class,'Edit']);
Route::post('setting/submenu/update/{UNID}'                  ,[MenuSubController::class,'Update']);
Route::get('setting/submenu/delete{UNID}'                  ,[MenuSubController::class,'Delete']);
