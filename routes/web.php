<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\DatadiriController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PertingController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PrestasiController;
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
//     return view('beranda');
// });

Auth::routes();
//verifikasi email
Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->middleware('verified')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::get('profil', [HomeController::class, 'profil'])->name('profil');
    Route::patch('profil/update', [HomeController::class, 'update'])->name('profil.update');
    Route::post('change', [ChangePasswordController::class, 'index'])->name('change.password');

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
    Route::post('datadiri/storektp', [DatadiriController::class, 'storektp'])->name('store.ktp.ortu');

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

    //fakultas
    Route::get('fakultas/{perting}', [FakultasController::class, 'index'])->name('fakultas.index');
    Route::get('fakultas/create/{perting}', [FakultasController::class, 'create'])->name('fakultas.create');
    Route::post('fakultas/store/{perting}', [FakultasController::class, 'store'])->name('fakultas.store');
    Route::get('fakultas/{fakultas}/edit', [FakultasController::class, 'edit'])->name('fakultas.edit');
    Route::patch('fakultas/{fakultas}', [FakultasController::class, 'update'])->name('fakultas.update');
    Route::delete('fakultas/{fakultas}', [FakultasController::class, 'destroy'])->name('fakultas.destroy');

    //jurusan
    Route::get('jurusan/{fakultas}', [JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('jurusan/create/{fakultas}', [JurusanController::class, 'create'])->name('jurusan.create');
    Route::post('jurusan/store/{fakultas}', [JurusanController::class, 'store'])->name('jurusan.store');
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

    //peserta
    Route::get('peserta', [PesertaController::class, 'index'])->name('peserta.index');
    Route::get('peserta/create', [PesertaController::class, 'create'])->name('peserta.create');
    Route::post('ajaxperting', [PesertaController::class, 'ajaxPerting'])->name('ajax.perting');
    Route::post('ajaxfakultas', [PesertaController::class, 'ajaxFakultas'])->name('ajax.fakultas');
    Route::post('peserta/store', [PesertaController::class, 'store'])->name('peserta.store');
    Route::get('peserta/show/{peserta}', [PesertaController::class, 'show'])->name('peserta.show');

    //peserta kolektif
    Route::get('kolektif/createdatadiri', [DatadiriController::class, 'createDatadiri'])->name('kolektif.createDatadiri');
    Route::get('kolektif/createkk', [DatadiriController::class, 'createKk'])->name('kolektif.createKk');
    Route::get('kolektif/creatependidikan', [PesertaController::class, 'createPendidikan'])->name('kolektif.createPendidikan');

    //prestasi
    Route::get('prestasi/create', [PrestasiController::class, 'create'])->name('prestasi.create');
    Route::post('prestasi/store', [PrestasiController::class, 'store'])->name('prestasi.store');
});
