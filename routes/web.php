<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\GuruPNSController;
use App\Http\Controllers\GuruPNSAbsenController;
use App\Http\Controllers\GuruPTTController;
use App\Http\Controllers\GuruPTTAbsenController;
use App\Http\Controllers\LaporanAbsenController;
use App\Http\Controllers\KoordinatSekolahController;

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

Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'ceklevel:admin,kepsek,guru_pns,guru_ptt']], function() {

    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('admin', AdminController::class);
    
    Route::resource('kepala-sekolah', KepalaSekolahController::class);
    
    Route::resource('guru-pns', GuruPNSController::class);
    
    Route::resource('guru-ptt', GuruPTTController::class);



});

Route::group(['middleware' => ['auth', 'ceklevel:admin,kepsek']], function() {

    Route::resource('admin', AdminController::class);
    
    Route::resource('kepala-sekolah', KepalaSekolahController::class);
    
    Route::resource('guru-pns', GuruPNSController::class);
    
    Route::resource('guru-ptt', GuruPTTController::class);

    Route::get('/laporan-absensi-pns', [LaporanAbsenController::class, 'laporanPNS']);
    Route::get('/filter-pns/{tglawal}/{tglakhir}', [LaporanAbsenController::class, 'filterPNS']);
    Route::get('/cetak-pns/{data1}/{data2}', [LaporanAbsenController::class, 'cetakPNS']);

    Route::get('laporan-absensi-ptt', [LaporanAbsenController::class, 'laporanPTT']);
    Route::get('/filter-ptt/{tglawal}/{tglakhir}', [LaporanAbsenController::class, 'filterPTT']);
    Route::get('/cetak-ptt/{data1}/{data2}', [LaporanAbsenController::class, 'cetakPTT']);

    Route::get('lokasi-sekolah', [KoordinatSekolahController::class, 'index']);
    Route::post('ubah-koordinat', [KoordinatSekolahController::class, 'update']);

});


Route::group(['middleware' => ['auth', 'ceklevel:guru_pns']], function() {
    
    Route::resource('absen-guru-pns', GuruPNSAbsenController::class);
    Route::post('absen-guru-pns-keluar', [GuruPNSAbsenController::class, 'absenKeluar'])->name('absen-pns-keluar');

});

Route::group(['middleware' => ['auth', 'ceklevel:guru_ptt']], function() {
    
    Route::resource('absen-guru-ptt', GuruPTTAbsenController::class);
    Route::post('absen-guru-ptt-keluar', [GuruPTTAbsenController::class, 'absenKeluar'])->name('absen-ptt-keluar');

});

Route::group(['middleware' => ['auth', 'ceklevel:guru_pns,guru_ptt']], function() {
    
    Route::view('lokasi-anda', 'pages.lokasi.lokasi-anda');

});

