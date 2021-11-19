<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\DashboardController;



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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/details', [DetailsController::class,'index'])->name('details');
Route::get('/checkout', [CheckoutController::class,'index'])->name('checkout');
Route::get('/checkout/success', [CheckoutController::class,'success'])->name('checkout-success');

Route::prefix('admin')
    ->namespace('App\Http\Controllers\Admin')->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', [DashboardController::class,'index'])->name('dashboard');
        Route::resource('travel-package', TravelPackageController::class);
    });

Auth::routes(['verify' => true]);
