<?php

use App\Http\Controllers\MahasiswaController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('mahasiswa', MahasiswaController::class);
Route::get('sampah', [MahasiswaController::class, 'listsampah'])->name('list.sampah');
Route::get('sampah/mahasiswa/restore/{id?}', [MahasiswaController::class,'restore'])->name('sampah.mahasiswa.restore');
Route::delete('sampah/mahasiswa/delete/{id?}', [MahasiswaController::class,'delete'])->name('sampah.mahasiswa.delete');

Route::resource('dosen', DosenController::class);
Route::get('sampahdosen', [DosenController::class, 'listsampah'])->name('list.sampah');
Route::get('sampahdosen/dosen/restore/{id?}', [DosenController::class,'restore'])->name('sampah.dosen.restore');
Route::delete('sampahdosen/dosen/delete/{id?}', [DosenController::class,'delete'])->name('sampah.dosen.delete');