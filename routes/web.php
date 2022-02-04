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
Route::get('/', function(){
    return view('welcome');
});



// Route Untuk Omah Kunci

Route::get('/home', function () {
    return view('home');
});
Route::get('/login', function(){
    return view('kunci.login');
});
Route::get('/kasir', function(){
    return view('kasir');
});
Route::get('transaksi', function(){
    return view('transaksi');
});
