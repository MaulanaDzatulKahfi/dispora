<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
    return view('auth.login');
});

Auth::routes();
//verifikasi email
Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->middleware('verified')->name('home');



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    //Route::resource('products', ProductController::class);
    Route::get('products/archive', [ProductController::class, 'archive'])->name('products.archive');
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store'); // ok
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); // Soft Delete move to archive
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); // Soft Delete move to archive
    Route::get('products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore'); // Soft delete restore
    Route::get('products/restoreall', [ProductController::class, 'restoreall'])->name('products.restoreall'); // Soft delete restore all
});
