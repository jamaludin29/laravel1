<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DepartemenController;

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

    Route::fallback(function () {
    return "Maaf, alamat tidak ditemukan";
    });

    Auth::routes();
    
    Route::group(['middleware' => ['auth']], function() {
        
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        
        Route::resource('mahasiswa', MahasiswaController::class);
        Route::get('sampah', [MahasiswaController::class, 'listsampah'])->name('list.sampahM');
        // Route::get('sampah', [MahasiswaController::class, 'listsampah'])->name('list.sampahM')->middleware('can:updated,user');
        Route::get('sampah/mahasiswa/restore/{id?}', [MahasiswaController::class,'restore'])->name('sampah.mahasiswa.restore');
        // Route::get('sampah/mahasiswa/restore/{id?}', [MahasiswaController::class,'restore'])->name('sampah.mahasiswa.restore')->middleware('can:updated,user');
        Route::delete('sampah/mahasiswa/delete/{id?}', [MahasiswaController::class,'delete'])->name('sampah.mahasiswa.delete');
        // Route::delete('sampah/mahasiswa/delete/{id?}', [MahasiswaController::class,'delete'])->name('sampah.mahasiswa.delete')->middleware('can:updated,user');

        Route::resource('dosen', DosenController::class);
        Route::get('sampahdosen', [DosenController::class, 'listsampah'])->name('list.sampahD');
        Route::get('sampahdosen/dosen/restore/{id?}', [DosenController::class,'restore'])->name('sampah.dosen.restore');
        Route::delete('sampahdosen/dosen/delete/{id?}', [DosenController::class,'delete'])->name('sampah.dosen.delete');

        Route::resource('departemen', DepartemenController::class);
        Route::get('sampahdept', [DepartemenController::class, 'listsampah'])->name('list.sampahDept');
        Route::get('sampahdept/departemen/restore/{id?}', [DepartemenController::class,'restore'])->name('sampah.departemen.restore');
        Route::delete('sampahdept/departemen/delete/{id?}', [DepartemenController::class,'delete'])->name('sampah.departemen.delete');


        Route::resource('prodi', ProdiController::class);
        Route::get('sampahprodi', [ProdiController::class, 'listsampah'])->name('list.sampahP');
        Route::get('sampahprodi/prodi/restore/{id?}', [ProdiController::class,'restore'])->name('sampah.prodi.restore');
        Route::delete('sampahprodi/prodi/delete/{id?}', [ProdiController::class,'delete'])->name('sampah.prodi.delete');



});