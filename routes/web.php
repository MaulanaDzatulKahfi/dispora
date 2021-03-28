<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DatadiriController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PertingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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
//     return view('auth.login');
// });
// Route::get('/', function(){
//     $tittle = 'Dashboard';
//     return view('beranda', compact('tittle'));
// });

Auth::routes();
//verifikasi email
Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->middleware('verified')->name('home');



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    // datadiri
    Route::get('datadiri/create', [DatadiriController::class, 'create'])->name('datadiri.create');
    Route::post('datadiri/store', [DatadiriController::class, 'store'])->name('datadiri.store');
    Route::post('datadiri/storekk', [DatadiriController::class, 'storekk'])->name('datadiri.storekk');

    //perguruan tinggi
    Route::get('products/archive', [ProductController::class, 'archive'])->name('products.archive');
    Route::get('perting', [PertingController::class, 'index'])->name('perting.index');
    Route::get('perting/create', [PertingController::class, 'create'])->name('perting.create');
    Route::post('perting/store', [PertingController::class, 'store'])->name('perting.store'); // ok
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); // Soft Delete move to archive
    Route::get('products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore'); // Soft delete restore
    Route::get('products/restoreall', [ProductController::class, 'restoreall'])->name('products.restoreall'); // Soft delete restore all

    //permission
    Route::get('permission', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('permission/{permission}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::delete('permission/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');

    //jurusan
    Route::get('jurusan/{jurusan}', [JurusanController::class, 'index'])->name('jurusan.index');
});
