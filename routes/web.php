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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('inputbarang', function () {
	return view('admin/inputbarang');
});

Route::get('barangmasuk', function () {
	return view('gudang/barangmasuk');
});

Route::get('penjualan', function () {
	return view('kasir/penjualan');
});

Route::post('inputbarang', 'barangController@store');
Route::post('barangmasuk', 'barangController@addStock');
Route::post('penjualan/cek', 'barangController@cek')->name('cek');
Route::post('penjualan', 'barangController@jual')->name('jual');


Route::get('admin', function () {
	return view('admin/dashboard');
})->middleware('auth');
Route::get('gudang', function () {
	return view('gudang/dashboard');
})->middleware('auth');
Route::get('kasir', function () {
	return view('kasir/dashboard');
})->middleware('auth');
Route::resource('admin/produk', 'Admin\\ProdukController');
Route::resource('gudang/incomingproduk', 'Gudang\\IncomingprodukController');
Route::resource('kasir/invoice', 'Kasir\\InvoiceController');
Route::resource('admin/history', 'Admin\\HistoryController');
Route::resource('admin/account', 'Admin\\AccountController');
