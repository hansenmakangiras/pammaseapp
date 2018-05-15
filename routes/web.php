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
Route::resource('data','DataController');
Route::resource('hasil','HasilController');
Route::resource('formulir','FormulirController');
Route::get('/data/kelurahan/{idkec}','DataController@getJsonKelurahan');
