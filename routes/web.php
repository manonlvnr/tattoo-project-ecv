<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\FlashesController;
use App\Http\Controllers\TatoueursController;
use App\Http\Controllers\BookingController;

use App\Http\Controllers\ManagerController;

use App\Http\Controllers\UserController;
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


Route::get('/', [HomeController::class, 'main'])->name('main');

Route::get('/flashes', [FlashesController::class, 'index'])->name('flashes');

Route::get('/tatoueurs', [TatoueursController::class, 'index'])->name('tatoueurs');

Route::get('/tatoueurs/{id}', [TatoueursController::class, 'showTatoueur'])->name('showTatoueur');

Route::get('/flash/booking/{id}', [BookingController::class, 'index'])->name('booking');

Route::post('/flash/booking/{id}', [BookingController::class, 'post'])->name('post');


Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::post('/home/updateInfo', [UserController::class, 'saveInfo'])->name('user.saveInfo');
    Route::get('/home/booking', [UserController::class, 'booking'])->name('user.booking');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
// Route::middleware(['auth', 'user-access:admin'])->group(function () {

//     Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
// });

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/


Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
    Route::get('/manager/profile', [ManagerController::class, 'profile'])->name('manager.profile');
    Route::get('/manager/flashes', [ManagerController::class, 'flashes'])->name('manager.flashes');
    Route::get('/manager/calendar', [ManagerController::class, 'calendar'])->name('manager.calendar');
    Route::get('/manager/flashes/add',function(){return view('managerAddFlash');} )->name('manager.add'); 


    // ROUTE POST 
    Route::post('/manager/flashes/save', [ManagerController::class, 'newFlash'])->name('manager.newFlash');
    Route::post('/manager/updateInfo', [ManagerController::class, 'saveInfo'])->name('manager.saveInfo');
    Route::post('/manager/store', [ManagerController::class, 'storeImage'])->name('manager.store');

    // ROUTE DELETE
    Route::get('/manager/flashes/delete/{id}', [ManagerController::class, 'deleteFlash'])->name('manager.deleteFlash'); 

    // ROUTE PUT
    Route::get('/manager/flashes/edit/{id}', [ManagerController::class, 'editFlash'])->name('manager.editFlash'); 
    Route::put('/manager/updateFlash', [ManagerController::class, 'updateFlash'])->name('manager.updateFlash');

});
