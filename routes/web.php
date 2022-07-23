<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/sign_in', 'LoginController@sign_in')->name('sign_in');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::post('/register', 'LoginController@register')->name('register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@home')->name('home');
    Route::get('/sidebar', 'HomeController@sidebar');
    Route::post('/updatesidebar', 'HomeController@updateSidebar');

    Route::resource('/role', 'RoleController');
    Route::post('/role/list', 'RoleController@list');
    Route::post('/role/getdata', 'RoleController@getData');

    Route::resource('/user', 'UserController');
    Route::post('/user/list', 'UserController@list');
    Route::post('/user/getdata', 'UserController@getData');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/uploadpotoprofile', 'UserController@uploadPotoProfile');
    Route::get('/gantipassword', 'UserController@gantiPassword')->name('user.gantipassword');
    Route::post('/updatepassword', 'UserController@updatePassword');

    Route::resource('/menumaster', 'MenuMasterController');
    Route::post('/menumaster/list', 'MenuMasterController@list');
    Route::post('/menumaster/getcolumn', 'MenuMasterController@getColumn');




    Route::post('/carikodeerror', 'HomeController@carikodeerror');







Route::resource('/aplikasi', 'AplikasiController');
    Route::post('/aplikasi/list', 'AplikasiController@list');
    Route::post('/aplikasi/getdata', 'AplikasiController@getData');





Route::resource('/kode_error', 'KodeErrorController');
    Route::post('/kode_error/list', 'KodeErrorController@list');
    Route::post('/kode_error/getdata', 'KodeErrorController@getData');


Route::resource('/layanan', 'LayananController');
    Route::post('/layanan/list', 'LayananController@list');
    Route::post('/layanan/getdata', 'LayananController@getData');


Route::resource('/tingkat_prioritas', 'TingkatPrioritasController');
    Route::post('/tingkat_prioritas/list', 'TingkatPrioritasController@list');
    Route::post('/tingkat_prioritas/getdata', 'TingkatPrioritasController@getData');


Route::resource('/kategori_perbaikan', 'KategoriPerbaikanController');
    Route::post('/kategori_perbaikan/list', 'KategoriPerbaikanController@list');
    Route::post('/kategori_perbaikan/getdata', 'KategoriPerbaikanController@getData');


Route::resource('/perbaikan', 'PerbaikanController');
    Route::post('/perbaikan/list', 'PerbaikanController@list');
    Route::post('/perbaikan/getdata', 'PerbaikanController@getData');

});