<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;

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
Route::get('/user/{id}/show/pwd', [UserController::class, 'pwd']);
Route::post('/user/{id}/show/chpwd', [UserController::class, 'chpwd']);
Route::post('/user/{id}/update', [UserController::class, 'update']);
Route::get('/user/{id}/destroy', [UserController::class, 'destroy']);

# Route Siswa
Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/create', [SiswaController::class, 'create']);
Route::post('/siswa/store', [SiswaController::class, 'store']);
Route::get('/siswa/{nis}/show', [SiswaController::class, 'show']);
Route::post('/siswa/{nis}/update', [SiswaController::class, 'update']);
Route::get('/siswa/{nis}/destroy', [SiswaController::class, 'destroy']);