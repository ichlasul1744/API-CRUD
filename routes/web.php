<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', [WelcomeController::class, 'welcome']);
// routes/web.php
Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('products', 'ProductController');
    Route::post('sales', 'SaleController@store');
});

Route::get('/barang', 'BarangController@index');
Route::get('/barang/{id}', 'BarangController@show');
Route::post('/barang', 'BarangController@store');
Route::put('/barang/{id}', 'BarangController@update');
Route::delete('/barang/{id}', 'BarangController@destroy');
