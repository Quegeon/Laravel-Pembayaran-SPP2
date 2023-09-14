<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\KelasController;

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

Route::get('/user', [UserController::class,'index']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/store', [UserController::class, 'store']);
Route::get('/user/{id}/show', [UserController::class, 'show']);
Route::get('/user/{id}/show/pwd', [UserController::class, 'pwd']);
Route::post('/user/{id}/show/chpwd', [UserController::class, 'chpwd']);
Route::post('/user/{id}/update', [UserController::class, 'update']);
Route::get('/user/{id}/destroy', [UserController::class, 'destroy']);










# Route Kelas
Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/kelas/create', [KelasController::class, 'create']);
Route::post('/kelas/store', [KelasController::class, 'store']);
Route::get('/kelas/{id}/show', [KelasController::class, 'show']);
Route::post('/kelas/{id}/update', [KelasController::class, 'update']);
Route::get('/kelas/{id}/destroy', [KelasController::class, 'destroy']);