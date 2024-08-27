<?php

use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\AdminProfileController;

// Super Admin Dashboard
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\FrontendPagesController;
use App\Http\Controllers\ProfileController;

// Customer Frontend
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Clear application cache:
Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
// Artisan::call('view:clear');
// Cached events cleared!
// Compiled views cleared!
// Application cache cleared!
// Route cache cleared!
// Configuration cache cleared!
// Compiled services and packages files removed!
// Caches cleared successfully!

    return 'Application cache has been cleared';
});

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

Route::group(['middleware' => ['auth', 'isAdmin', 'verified'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminPagesController::class, 'index'])->name('admin.dashboard');

    Route::get('/profile', [AdminProfileController::class, 'index'])->name('admin.profileView');
    Route::post('/profile/{id}', [AdminProfileController::class, 'update'])->name('admin.profileUpdate');

    // Category
    Route::group(['prefix' => '/category'], function () {
        Route::get('/manage', [CategoryController::class, 'index'])->name('category.manage');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::post('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    // Post
    Route::group(['prefix' => '/post'], function () {
        Route::get('/manage', [PostController::class, 'index'])->name('post.manage');
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/store', [PostController::class, 'store'])->name('post.store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::post('/update/{id}', [PostController::class, 'update'])->name('post.update');
        Route::post('/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    });

});

/*
|--------------------------------------------------------------------------
| The Editorial Post - Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
// Home Page
Route::get('/', [FrontendPagesController::class, 'homepage'])->name('home.page');
Route::get('post/{id}', [FrontendPagesController::class, 'show'])->name('post.show');

require __DIR__ . '/auth.php';
