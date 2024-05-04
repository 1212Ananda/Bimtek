<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelatihanController;

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


Route::resource('pendaftaran', PendaftaranController::class);
Route::get('/', [LandingpageController::class, 'index'])->name('landingpage');



Auth::routes();


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/pendaftaran', [AdminController::class, 'pendaftaranMenunggu'])->name('admin_pendaftaran');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin_users');
    Route::post('/admin/approve_pendaftaran/{id}', [AdminController::class, 'approvePendaftaran'])->name('approve_pendaftaran');
    Route::get('admin/pendaftaran/{id}', [AdminController::class, 'showDetail'])->name('showDetail');

    Route::get('/admin/kirim-jadwal/{id}', [AdminController::class, 'tampilkanFormulirKirimJadwal'])->name('kirim-jadwal');
    Route::post('/admin/proses-kirim-jadwal/{id}', [AdminController::class, 'prosesKirimJadwal'])->name('proses-kirim-jadwal');

    Route::post('/pendaftaran/{id}/send-to-user', [AdminController::class, 'sendToUser'])->name('approve');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/pelatihan', PelatihanController::class);
});


Route::middleware(['auth', 'role:admin,bendahara'])->group(function () {

    Route::get('/konfirmasi-pembayaran/{id}/{action}', [AdminController::class, 'konfirmasiPembayaran'])->name('konfirmasi-pembayaran');
    Route::get('/admin/pembayaran', [AdminController::class, 'pembayaran'])->name('admin_pembayaran');
});

Route::middleware(['auth', 'role:instruktur'])->group(function () {

    Route::get('/admin/pelatihan', [AdminController::class, 'pelatihan'])->name('admin_pelatihan');
    Route::get('/admin/jadwal-pelatihan', [AdminController::class, 'jadwalPelatihan'])->name('admin_jadwal-pelatihan');
});
Route::middleware(['auth', 'role:admin,perusahaan'])->group(function () {

    Route::delete('/riwayat_pendaftaran/{id}/cancel', [PendaftaranController::class, 'cancel'])->name('cancel_pendaftaran');
    Route::get('detail/{id}', [PendaftaranController::class, 'detailPendaftaran'])->name('detailPendaftaran');
    Route::post('/upload-bukti-pembayaran/{id}', [PendaftaranController::class, 'buktiPembayaran'])->name('upload_bukti_pembayaran');
    Route::get('/jadwal-pelatihan/user', [PendaftaranController::class, 'jadwalPelatihan'])->name('lihat-jadwal');
    Route::get('/riwayat-pendaftaran', [PendaftaranController::class, 'riwayatPendaftaran'])->name('riwayat_pendaftaran');
});
