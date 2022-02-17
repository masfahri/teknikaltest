<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\OtherTestController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PhoneController;
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
    return redirect('/home');
});

// Auth::routes();

Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

// Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('jenis', JenisController::class);
    Route::resource('pemasukan', PemasukanController::class);
    Route::resource('pengeluaran', PengeluaranController::class);

    Route::post('/cari', [HomeController::class, 'cari'])->name('cari');
    Route::get('/cari/{from}/{to}', [HomeController::class, 'cariDate'])->name('cari.date');
    
    Route::get('/transaksi', [HomeController::class, 'transaksi'])->name('transaksi');
    
// });

Route::get('/other-test', [OtherTestController::class, 'index']);

Route::get('/auth/redirect', [LoginController::class, 'redirectToProvider'])->name('login.google');
Route::get('/auth/callback', [LoginController::class, 'handleProviderCallback'])->name('callback.google');
