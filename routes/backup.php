<?php

use Illuminate\Support\Facades\Route;

// Super Admin Dashboard
use App\Http\Controllers\Admin\AdminPagesController;

// Vendor Dashboard

// Customer Frontend

/*
|--------------------------------------------------------------------------
| Super Admin Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Cart Page Routes
Route::group(['prefix' => 'admin'], function(){
    Route::get('/dashboard', [AdminPagesController::class, 'index'])->name('admin.dashboard');
});


/*
|--------------------------------------------------------------------------
| Vendor Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



/*
|--------------------------------------------------------------------------
| Customer Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/