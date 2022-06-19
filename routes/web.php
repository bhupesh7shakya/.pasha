<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\FeaturedProductController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Admin\Slider;
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
Route::get('admin/login', [UserController::class, 'loginIndexAdmin'])->name('admin.login');
Route::post('admin/authentication', [UserController::class, 'check'])->name('admin.authentication');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [DashBoardController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('category', CategoryController::class);
        Route::resource('product', ProductController::class);
        Route::resource('inventory', InventoryController::class);
        Route::resource('order', OrderController::class);
        Route::resource('slider', SliderController::class);
        Route::resource('featured-product', FeaturedProductController::class);
        // Route::get('admin/logout',[UserController::class,'logout'])->name('admin.logout');
        // Route::get('admin/user',[UserController::class,'user'])->name('admin.user');
    });
});
Route::get('auth/google', [UserController::class, 'redirectToGoogle'])->name('google.redirect');
ROute::get('auth/google/callback', [UserController::class, 'handleGoogleCallback']);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search-result', [HomeController::class, 'searchResult'])->name('search-result');
Route::get('/product/{id}', [HomeController::class, 'product'])->name('product');

Route::post('/cart/add', [OrderController::class, 'cart'])->name('cart.add');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/getCartData', [OrderController::class, 'getCartData'])->name('getCartData');
Route::delete('/cart/delete/{id}', [OrderController::class, 'removeItemCart'])->name('cart.delete');
