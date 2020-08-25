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
    return('welcome');
});

//Client Webpage
Route::group(['prefix' => 'client'],function(){
    //Dashboard
    Route::get('/','Client\DashboardController@index');

    //Permohonan Baru
    Route::get('daftar','Client\DaftarController@index')->name('Permohonan Baru');
    Route::get('daftar/create', 'Client\DaftarController@create');
    Route::get('daftar/edit/{id}','Client\DaftarController@edit');
    Route::post('daftar/store','Client\DaftarController@store');
    Route::post('daftar/upload','Client\DaftarController@upload');
    Route::get('daftar/view/{id}','Client\DaftarController@view');
    Route::post('daftar/delete/{id}','Client\DaftarController@delete');

    //Permohonan Diproses
    Route::get('proses','Client\PermohonanController@proses')->name('Permohonan Diproses');
    Route::get('proses/edit/{id}', 'Client\PermohonanController@edit');
    Route::get('proses/view/{id}', 'Client\PermohonanController@view');
    Route::get('proses/delete/{id}', 'Client\PermohonanController@delete');

    //Permohonan Ditolak
    Route::get('tolak','Client\PermohonanController@tolak')->name('Permohonan Ditolak');
    Route::get('tolak/edit/{id}','Client\PermohonanController@edit');
    Route::get('tolak/view/{id}','Client\PermohonanController@view');

    //Senarai Ramuan
    Route::get('ramuan','Client\RamuanController@index')->name('Senarai Ramuan');
    Route::get('ramuan/view/{id}','Client\RamuanController@view');

    //Ramuan Yang Dihapuskan
    Route::get('hapus','Client\RamuanController@hapus')->name('Ramuan Yang Dihapuskan');
    Route::get('hapus/view/{id}','Client\RamuanController@view');
});

//Admin Webpage
Route::group(['prefix' => 'admin'],function(){
    //Login
    Route::get('/','Admin\LoginController@index');

    //Syarikat
    Route::get('syarikat','Admin\SyarikatController@index')->name('Syarikat');
    // Route::get('syarikat/view/{id}','Admin\SyarikatnController@view');
    Route::get('syarikat/create','Admin\SyarikatController@create');

    //Staff
    Route::get('staff','Admin\StaffController@index')->name('Staff');
});
