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
    Route::get('profil', [HomeController::class, 'profil'])->name('profil');
    Route::patch('profil/update/{profile}', [HomeController::class, 'update'])->name('profil.update');
    //user
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{users}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('users/{users}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{users}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('users/archive', [UserController::class, 'archive'])->name('users.archive');
    Route::get('users/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
    Route::get('users/restoreall', [UserController::class, 'restoreall'])->name('users.restoreall');
    Route::get('users/permanent/{id}', [UserController::class, 'permanent'])->name('users.permanent');
    Route::get('users/permanentall', [UserController::class, 'permanentall'])->name('users.permanentall');

    // datadiri
    Route::get('datadiri/create', [DatadiriController::class, 'create'])->name('datadiri.create');
    Route::post('datadiri/store', [DatadiriController::class, 'store'])->name('datadiri.store');
    Route::post('datadiri/storekk', [DatadiriController::class, 'storekk'])->name('datadiri.storekk');

    //perguruan tinggi
    Route::get('products/archive', [ProductController::class, 'archive'])->name('products.archive');
    Route::get('perting', [PertingController::class, 'index'])->name('perting.index');
    Route::get('perting/create', [PertingController::class, 'create'])->name('perting.create');
    Route::post('perting/store', [PertingController::class, 'store'])->name('perting.store');
    Route::get('perting/{perting}/edit', [PertingController::class, 'edit'])->name('perting.edit');
    Route::patch('perting/{perting}', [PertingController::class, 'update'])->name('perting.update');
    Route::delete('perting/{perting}', [PertingController::class, 'destroy'])->name('perting.destroy');
    Route::get('products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore'); // Soft delete restore
    Route::get('products/restoreall', [ProductController::class, 'restoreall'])->name('products.restoreall'); // Soft delete restore all

    //jurusan
    Route::get('jurusan/{jurusan}', [JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('jurusan/create/{perting}', [JurusanController::class, 'create'])->name('jurusan.create');
    Route::post('jurusan/store{perting}', [JurusanController::class, 'store'])->name('jurusan.store');
    Route::get('jurusan/{jurusan}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
    Route::patch('jurusan/{jurusan}', [JurusanController::class, 'update'])->name('jurusan.update');
    Route::delete('jurusan/{jurusan}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');

    //permission
    Route::get('permission', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('permission/{permission}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::patch('permission/{permission}', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('permission/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');


});
