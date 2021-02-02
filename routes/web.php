<?php

use Illuminate\Support\Facades\Route;
use App\Models\Mainmenu;
use App\Http\Controllers\MenuController;
use App\Models\Menusubitem;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MenuSubController;


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

Route::get('/formfacilities', function(){
  return view('formfacilities');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {


    return view('dashboard');
})->name('dashboard');


Route::get('/user/logout/',[MenuController::class,'Logout'])->name('user.logout');

//Formfactory
Route::get('/assets/formassete/formfacilities',[MachineController::class,'Create'])->name('Formfactory');
Route::get('/assets/Facilities',[MachineController::class,'Index'])->name('factoryhome');
Route::post('/store/form',[MachineController::class,'Store'])->name('form.store');
Route::get('/assets/edit/edit/{UNID}',[MachineController::class,'Edit'])->name('factory.edit');
Route::post('/factory/update/{UNID}',[MachineController::class,'Update']);
Route::post('/factory/delete/',[MachineController::class,'Delete'])->name('factory.delete');






//MenuController
Route::post('/menu/add',[MenuController::class,'AddMenu'])->name('store.menu');
Route::get('/menu/all',[MenuController::class,'AllMenu'])->name('all.menu');
Route::get('/menu/edit/{UNID}',[MenuController::class,'Edit']);
Route::post('/menu/update/{UNID}',[MenuController::class,'Update']);
Route::get('/SoftDeletes/menu/{UNID}',[MenuController::class,'SoftDeletes']);
Route::get('/CDelete/menu/{UNID}',[MenuController::class,'Delete']);
Route::get('/Restore/menu/{UNID}',[MenuController::class,'Restore']);
//endMenucontroller

//submenucontroller
Route::get('/submenu/indexsubmenu/{UNID}',[MenuSubController::class,'Viewsubmenu'])->name('all.submenu');
Route::post('/submenu/add',[MenuSubController::class,'AddMenu'])->name('store.submenu');
Route::get('/submenu/edit/{UNID}',[MenuSubController::class,'Edit']);
Route::post('/submenu/update/{UNID}',[MenuSubController::class,'Update']);
Route::get('/SoftDeletes/submenu/{UNID}',[MenuSubController::class,'SoftDeletes']);
Route::get('/CDelete/submenu/{UNID}',[MenuSubController::class,'Delete']);
Route::get('/Restore/submenu/{UNID}',[MenuSubController::class,'Restore']);
