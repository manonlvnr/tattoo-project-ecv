<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
    Route::get('/manager/profile', [ManagerController::class, 'profile'])->name('manager.profile');
    Route::get('/manager/flashes', [ManagerController::class, 'flashes'])->name('manager.flashes');
    Route::get('/manager/calendar', [ManagerController::class, 'calendar'])->name('manager.calendar');
    Route::get('/manager/flashes/add', [ManagerController::class, 'addflash'])->name('manager.add'); 
    Route::get('/manager/flashes/save', [ManagerController::class, 'newFlash'])->name('manager.newFlash');
    Route::post('/manager/updateInfo', [ManagerController::class, 'saveInfo'])->name('manager.saveInfo');
    Route::post('/manager/store', [ManagerController::class, 'store'])->name('manager.store');

});
