<?php

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// admin
Route::get('admin/login',[UserController::class,'loginIndexAdmin'])->name('admin.login');
Route::post('admin/authentication',[UserController::class,'check'])->name('admin.authentication');
Route::middleware(['auth','admin'])->group(function(){
    Route::get('admin/dashboard',[DashBoardController::class,'dashboard'])->name('admin.dashboard');
        // Route::get('admin/logout',[UserController::class,'logout'])->name('admin.logout');
        // Route::get('admin/user',[UserController::class,'user'])->name('admin.user');
});

// user
