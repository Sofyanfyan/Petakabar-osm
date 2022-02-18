<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\VillaController;
use App\Http\Controllers\UserController;
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

Route::get('/', [WebController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Kecamatan
Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');

Route::get('/kecamatan/add', [KecamatanController::class, 'add']);
Route::post('/kecamatan/insert', [KecamatanController::class, 'insert']);
Route::get('/kecamatan/edit/{id_kecamatan}', [KecamatanController::class, 'edit']);
Route::post('/kecamatan/update/{id_kecamatan}', [KecamatanController::class, 'update']);
Route::get('/kecamatan/delete/{id_kecamatan}', [KecamatanController::class, 'delete']);

//harga
Route::get('/harga', [HargaController::class, 'index'])->name('harga');
Route::get('/harga/add', [HargaController::class, 'add']);
Route::post('/harga/insert', [HargaController::class, 'insert']);
Route::get('/harga/edit/{id_harga}', [HargaController::class, 'edit']);
Route::post('/harga/update/{id_harga}', [HargaController::class, 'update']);
Route::get('/harga/delete/{id_harga}', [HargaController::class, 'delete']);


//Villa
Route::get('/villa', [VillaController::class, 'index'])->name('villa');
Route::get('/villa/add', [VillaController::class, 'add']);
Route::post('/villa/insert', [VillaController::class, 'insert']);
Route::get('/villa/edit/{id_villa}', [VillaController::class, 'edit']);
Route::post('/villa/update/{id_villa}', [VillaController::class, 'update']);
Route::get('/villa/delete/{id_villa}', [VillaController::class, 'delete']);


//user
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/add', [UserController::class, 'add']);
Route::post('/user/insert', [UserController::class, 'insert']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/delete/{id}', [UserController::class, 'delete']);



//Frotend
Route::get('/kecamatan/{id_kecamatan}', [WebController::class, 'kecamatan']);
Route::get('/harga/{id_harga}', [WebController::class, 'harga']);
Route::get('/detailvilla/{id_villa}', [WebController::class, 'detailvilla']);