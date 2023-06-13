<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome1');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/outlet', [OutletController::class, 'index'])->middleware('auth', 'admin' );
Route::get('/outlet/create', [OutletController::class, 'create'])->middleware('auth', );
Route::post('/outlet/create', [OutletController::class, 'store'])->middleware('auth', );
Route::get('/outlet/edit/{outlet}', [OutletController::class, 'edit'])->middleware('auth', );
Route::put('/outlet/update/{outlet}', [OutletController::class, 'update'])->name('edit')->middleware('auth', );
Route::delete('/outlet/{outlet}', [OutletController::class, 'destroy'])->middleware('auth', );
Route::get('/outlet/trash', [OutletController::class, 'trash'])->middleware('auth', );
Route::get('/outlet/restore/{outlet}', [OutletController::class, 'restore'])->middleware('auth', );

// Route::get('/paket', [PaketController::class, 'index']);
// Route::get('/paket/create', [PaketController::class, 'create']);
// Route::post('/paket/store', [PaketController::class, 'store'])->name('create');
// Route::get('/paket/edit/{paket}', [PaketController::class, 'edit']);
// Route::put('/paket/update/{paket}', [PaketController::class, 'update'])->name('edit');;
// Route::delete('/paket/{paket}', [PaketController::class, 'destroy']);
// Route::get('/paket/trash', [PaketController::class, 'trash']);
// Route::get('/paket/restore/{paket}', [PaketController::class, 'restore']);

Route::get('/paket', [PaketController::class, 'index'])->name('paket')->middleware('auth','admin' );
Route::get('/create-paket', [PaketController::class, 'create'])->name('create-paket')->middleware('auth', );
Route::post('/store-paket', [PaketController::class, 'store'])->name('store-paket')->middleware('auth', );
Route::get('/edit-paket/{paket}', [PaketController::class, 'edit'])->name('edit-paket')->middleware('auth', );
Route::put('/update-paket/{paket}', [PaketController::class, 'update'])->name('update-paket')->middleware('auth', );
Route::delete('/destroy-paket/{paket}', [PaketController::class, 'destroy'])->name('destroy-paket')->middleware('auth', );
//pengguna
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna')->middleware('auth','admin' );
Route::get('/create-pengguna', [PenggunaController::class, 'create'])->name('create-pengguna')->middleware('auth', );
Route::post('/store-pengguna', [PenggunaController::class, 'store'])->name('store-pengguna')->middleware('auth', );
Route::get('/edit-pengguna/{user}', [PenggunaController::class, 'edit'])->name('edit-pengguna')->middleware('auth', );
Route::put('/update-pengguna/{user}', [PenggunaController::class, 'update'])->name('update-pengguna')->middleware('auth', );
Route::delete('/destroy-pengguna/{user}', [PenggunaController::class, 'destroy'])->name('destroy-pengguna')->middleware('auth', );
Route::get('/pengguna/trash', [PenggunaController::class, 'trash'])->middleware('auth', );
Route::get('/pengguna/restore/{user}', [PenggunaController::class, 'restore'])->middleware('auth', );
Route::get('/pengguna/history', [PenggunaController::class, 'history'])->name('history-pengguna')->middleware('auth');

//transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi')->middleware('auth', );
Route::get('/create-transaksi', [TransaksiController::class, 'create'])->name('create-transaksi')->middleware('auth', );
Route::get('/history', [TransaksiController::class, 'history'])->name('history')->middleware('auth', );
Route::post('/store-transaksi', [TransaksiController::class, 'store'])->name('store-transaksi')->middleware('auth', );
Route::get('/edit-transaksi/{transaksi}', [TransaksiController::class, 'edit'])->name('edit-transaksi')->middleware('auth', );
Route::put('/update-transaksi/{transaksi}', [TransaksiController::class, 'update'])->name('update-transaksi')->middleware('auth', );
Route::get('/printharian', [TransaksiController::class, 'printharian'])->name('printharian')->middleware('auth', );
Route::get('/printbulanan', [TransaksiController::class, 'printbulanan'])->name('printbulanan')->middleware('auth', );
Route::get('/printtahunan', [TransaksiController::class, 'printtahunan'])->name('printtahunan')->middleware('auth', );
Route::delete('/destroy-transaksi/{transaksi}', [TransaksiController::class, 'destroy'])->name('destroy-transaksi')->middleware('auth','admin' );
Route::post('/getLaporan', [TransaksiController::class, 'getLaporan'])->name('laporan.getLaporan');


Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan')->middleware('auth', );
Route::get('/create-pelanggan', [PelangganController::class, 'create'])->name('create-pelanggan')->middleware('auth', );
Route::post('/store-pelanggan', [PelangganController::class, 'store'])->name('store-pelanggan')->middleware('auth', );
Route::get('/edit-pelanggan/{member}', [PelangganController::class, 'edit'])->name('edit-pelanggan')->middleware('auth', );
Route::put('/update-pelanggan/{member}', [PelangganController::class, 'update'])->name('update-pelanggan')->middleware('auth', );
Route::delete('/destroy-pelanggan/{member}', [PelangganController::class, 'destroy'])->name('destroy-pelanggan')->middleware('auth', );


Route::get('/backup', [BackupController::class, 'index'])->name('backup',)->middleware('auth','admin' );
Route::get('/backup/create', [BackupController::class, 'backup'])->name('backup/create');
require __DIR__.'/auth.php';
