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
//
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'AppController@index')->name('home');
Route::get('/getJsonKecamatan', 'AppController@getJsonKecamatan')->name('getJson');
Route::resource('data', 'DataController');
Route::get('/laporan', 'LaporanController@index')->name('laporan.index');
Route::resource('formulir', 'FormulirController');
Route::resource('anggota', 'AnggotaController');
Route::get('/data/kelurahan/{idkec}', 'DataController@getJsonKelurahan');
Route::get('/json/kelurahan/{idkec}', 'FormulirController@getKelurahan');
Route::post('/laporan/wilayah', 'LaporanController@wilayah')->name('laporan.wilayah');
Route::get('/laporan/exportpdf', 'LaporanController@exportPDF')->name('laporan.exportpdf');
Route::get('/datatable', 'DataController@getDatatable')->name('data.datatable');
Route::get('/getDataAnggota', 'AnggotaController@getDataAnggota')->name('anggota.getDatatable');
Route::get('/getListNokk', 'AnggotaController@getListNoKK')->name('anggota.getListNoKK');