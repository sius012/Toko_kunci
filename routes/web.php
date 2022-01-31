<?php

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
    return view('cashier');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Auth::routes();



Route::middleware('auth')->group(function () {
    Route::get('/kasir', 'CassierController@index')->name('trans');
    Route::post('/tambah', 'CassierController@tambah');
    Route::post('/tambahbarang', 'CassierController@tambahdata');
    Route::post('/hapustrans', 'CassierController@hapustrans');
    Route::get('kasir/hapus/{id}', 'CassierController@hapus')->name('hapus');
    Route::get('kasir/hapustrans/{idtrans}', 'CassierController@hapustransaksi')->name('hapustrans');
    Route::get('/notas', function(){
        return view('nota.nota');
    });
    Route::post('/print', 'CassierController@print')->name('cetak');
    Route::get('/reload', 'CassierController@reload')->name('reload');
    Route::get('/transaksi', 'CassierController@show')->name("transaksi");
    Route::get('/userguide', function(){
        return view('guide.guide');
    });
});
