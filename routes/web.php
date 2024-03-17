<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::middleware(['auth'])->group(function () {
    Route::resource('/mobil', MobilController::class);
    Route::Post('/logout', [AuthController::class, 'logout']);

    Route::get('/beranda', [AuthController::class, 'index']);

    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::get('/transaksi/pengembalianmobil', [TransaksiController::class, 'viewpengembalian']);
    Route::get('/transaksi/{id}', [TransaksiController::class, 'show']);
    Route::post('/transaksi', [TransaksiController::class, 'store']);
    Route::post('/transaksi/pengembalian', [TransaksiController::class, 'pengembalian']);

    Route::get('/riwayat', [RiwayatController::class, 'index']);
    Route::get('/riwayat/{id}', [RiwayatController::class, 'show']);
});

Route::get('/registrasi', [AuthController::class, 'registrasi']);
Route::post('/registrasi-store', [AuthController::class, 'store']);

// Route::Post('/login', [AuthController::class, 'authenticate']);
