<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JadwalPelatihanController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\UserController;


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


Route::get('/', [LandingpageController::class, 'index'])->name('landingpage');
Route::get('/kontak', [LandingpageController::class, 'kontak'])->name('kontak');

Auth::routes();
Route::middleware('auth')->group(function () {
    
    Route::get('/admin/pembayaran', [AdminController::class, 'pembayaran'])->name('admin_pembayaran');
    Route::delete('/pendaftaran/{id}/cancel', [PendaftaranController::class, 'cancel'])->name('cancel_pendaftaran');
    Route::get('/admin/pelatihan', [AdminController::class, 'pelatihan'])->name('admin_pelatihan');
    Route::get('/admin/jadwal-pelatihan', [AdminController::class, 'jadwalPelatihan'])->name('admin_jadwal-pelatihan');
    Route::get('/admin/jadwal-pelatihan/tambah', [AdminController::class, 'tambahJadwalPelatihan'])->name('admin_jadwal-pelatihan.tambah');
    Route::resource('jadwal-pelatihan', JadwalPelatihanController::class);
    Route::get('/jadwal-pelatihan/{pendaftaran_id}/editPelatihan', [JadwalPelatihanController::class, 'editPelatihan'])->name('jadwal-pelatihan.editPelatihan');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/pendaftaran', [AdminController::class, 'pendaftaranMenunggu'])->name('admin_pendaftaran');
    Route::get('/admin/pendaftaran', [AdminController::class, 'pendaftaranMenunggu'])->name('admin_pendaftaran');
    
    Route::resource('users', UserController::class);

    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin_users');
    Route::get('admin/pendaftaran/{id}', [AdminController::class, 'showDetail'])->name('showDetail');

    Route::get('/admin/kirim-jadwal/{id}', [AdminController::class, 'tampilkanFormulirKirimJadwal'])->name('kirim-jadwal');
    Route::post('/admin/proses-kirim-jadwal/{id}', [AdminController::class, 'prosesKirimJadwal'])->name('proses-kirim-jadwal');

    Route::post('/pendaftaran/{id}/approve-pendaftaran', [AdminController::class, 'approvePendaftaran'])->name('approve');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/pelatihan', PelatihanController::class);
});


Route::middleware(['auth', 'role:bendahara'])->group(function () {

    Route::post('/konfirmasi-pembayaran/{id}', [AdminController::class, 'konfirmasiPembayaran'])->name('konfirmasi-pembayaran');
    Route::get('/admin/pembayaran/kode-billing', [AdminController::class, 'pembayaranKodeBilling'])->name('admin.kodeBilling');
    Route::get('/admin/pembayaran/kode-billing/{id}/create', [AdminController::class, 'createKodeBilling'])->name('kode_billing.create');
    Route::post('/admin/pembayaran/kode-billing/{id}/store', [AdminController::class, 'storeKodeBilling'])->name('kode_billing.store');
    Route::get('/admin/bukti-pembayaran', [AdminController::class, 'buktiPembayaranPage'])->name('buktiPembayaranPage');
});

Route::middleware(['auth', 'role:instruktur'])->group(function () {
    
});
Route::middleware(['auth', 'role:perusahaan'])->group(function () {

    Route::get('detail/{id}', [PendaftaranController::class, 'detailPendaftaran'])->name('detailPendaftaran');
    Route::post('/upload-bukti-pembayaran/{id}', [PendaftaranController::class, 'buktiPembayaran'])->name('upload_bukti_pembayaran');
    Route::get('/user/jadwal-pelatihan', [PendaftaranController::class, 'jadwalPelatihan'])->name('lihat-jadwal');
    Route::get('/riwayat-pendaftaran', [PendaftaranController::class, 'riwayatPendaftaran'])->name('riwayat_pendaftaran');   
    Route::get('/pendaftaranPaket/{pelatihan}', [PendaftaranController::class, 'pendaftaranPaket'])->name('pendaftaran.paket');
    Route::resource('pendaftaran', PendaftaranController::class);

});
