<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManajemenAkun\ManajemenAkunController;
use App\Http\Controllers\Admin\ManajemenRefUnit\ManajemenRefUnitController;
use App\Http\Controllers\Admin\ManajemenRefJabatan\ManajemenRefJabatanController;
use App\Http\Controllers\Admin\ManajemenPegawai\ManajemenPegawaiController;
use App\Http\Controllers\Admin\ManajemenUraianPekerjaan\ManajemenUraianPekerjaanController;
use App\Http\Controllers\Admin\ManajemenTargetSkpPegawai\ManajemenTargetSkpPegawaiController;
use App\Http\Controllers\Admin\ManajemenUraianPekerjaanJabatan\ManajemenUraianPekerjaanJabatanController;
use App\Http\Controllers\Pegawai\ManajemenTargetRealisasiSkp\ManajemenTargetRealisasiSkpController;
use App\Http\Controllers\Pegawai\ManajemenTargetRealisasiSkp\ManajemenRealisasiSkpController;
use App\Http\Controllers\Pegawai\ManajemenTargetRealisasiSkp\ManajemenTargetSkpController;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('Admin')
        ->prefix('admin')
        ->name('admin.')
        ->middleware('can:are-admin')
        ->group(function (){
            Route::get('/', [AdminController::class, 'index']);
            Route::namespace('ManajemenAkun')
                ->prefix('manajemen-akun')
                ->name('manajemen-akun.')
                ->group(function(){
                    Route::get('/', [ManajemenAkunController::class, 'index']);
                    Route::get('/create', [ManajemenAkunController::class, 'create']);
                    Route::post('/create/store', [ManajemenAkunController::class, 'store']);
                    Route::get('/update/{user}', [ManajemenAkunController::class, 'update']);
                    Route::post('/update/{user}/store', [ManajemenAkunController::class, 'updateStore']);
                    Route::post('/delete/{user}', [ManajemenAkunController::class, 'delete']);
                });
                
        });
