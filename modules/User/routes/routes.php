<?php

use Illuminate\Support\Facades\Route;
use Modules\User\src\Http\Controllers\UserController;

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

Route::prefix('admin')->middleware("web")->group(function(){
    Route::prefix('user')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('admin.user.index');
        Route::get('/create',[UserController::class,'create'])->name('admin.user.create');
        Route::post('/store',[UserController::class,'store'])->name('admin.user.store');
        Route::get('/delete/{id}',[UserController::class,'delete'])->name('admin.user.delete');
    });
});
