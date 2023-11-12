<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'jwt.auth'], function () {
    // Routes untuk BarangController
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/{id}', [BarangController::class, 'show']);
Route::post('/barang', [BarangController::class, 'store']);
Route::put('/barang/{id}', [BarangController::class, 'update']);
Route::delete('/barang/{id}', [BarangController::class, 'destroy']);

    // Routes untuk PenjualanController
Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/penjualan/{kode}', [PenjualanController::class, 'show']);
Route::post('/penjualan', [PenjualanController::class, 'store']);
Route::get('/penjualan-by-date', [PenjualanController::class, 'showByDateRange']);
Route::delete('/penjualan/{kode}', [PenjualanController::class, 'destroy']);
});
// Routes Untuk AuthController

Route::post('/login', 'AuthJwtController@login');
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'AuthJwtController@logout');
    Route::get('/me', 'AuthJwtController@me');
});