<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SPPController;
use App\Http\Controllers\PembayaranController;

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
    return view('dashboard');
});

# Route User
Route::get('/user', [UserController::class,'index']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/store', [UserController::class, 'store']);
Route::get('/user/{id}/show', [UserController::class, 'show']);
Route::get('/user/{id}/show/password', [UserController::class, 'show_password']);
Route::post('/user/{id}/change-password', [UserController::class, 'change_password']);
Route::post('/user/{id}/update', [UserController::class, 'update']);
Route::get('/user/{id}/destroy', [UserController::class, 'destroy']);

# Route Kelas
Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/kelas/create', [KelasController::class, 'create']);
Route::post('/kelas/store', [KelasController::class, 'store']);
Route::get('/kelas/{id}/show', [KelasController::class, 'show']);
Route::post('/kelas/{id}/update', [KelasController::class, 'update']);
Route::get('/kelas/{id}/destroy', [KelasController::class, 'destroy']);

# Route Siswa
Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/create', [SiswaController::class, 'create']);
Route::post('/siswa/store', [SiswaController::class, 'store']);
Route::get('/siswa/{nis}/show', [SiswaController::class, 'show']);
Route::post('/siswa/{nis}/update', [SiswaController::class, 'update']);
Route::get('/siswa/{nis}/destroy', [SiswaController::class, 'destroy']);

# Route SPP
Route::get('/spp', [SPPController::class, 'index']);
Route::get('/spp/create', [SPPController::class, 'create']);
Route::post('/spp/store', [SPPController::class, 'store']);
Route::get('/spp/{id}/show', [SPPController::class, 'show']);
Route::post('/spp/{id}/update', [SPPController::class, 'update']);
Route::get('/spp/{id}/destroy', [SPPController::class, 'destroy']);

# Route Pembayaran
Route::get('/pembayaran', [PembayaranController::class, 'index']);
Route::get('/pembayaran/create', [PembayaranController::class, 'create']);
Route::post('/pembayaran/store', [PembayaranController::class, 'store']);
Route::get('/pembayaran/{id}/show', [PembayaranController::class, 'show']);
Route::post('/pembayaran/{id}/update', [PembayaranController::class, 'update']);
Route::get('/pembayaran/{id}/destroy', [PembayaranController::class, 'destroy']);