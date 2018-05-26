<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::get('/barang/kehilangan', 'BarangController@kehilangan');
Route::get('/barang/menemukan', 'BarangController@menemukan');
Route::resource('/barang','BarangController', ['except' => 'create']);