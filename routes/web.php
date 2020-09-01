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
//Portal
Route::get('/','PortalController@index')->name('portal');
Route::get('/ramuanList','PortalController@ramuanList');
//Login
Route::get('/login','LoginController@index')->name('login');
Route::post('/auth','LoginController@auth');

Route::get('/logout','LoginController@logout');

//Client Webpage
Route::group(['middleware' => 'auth:client','prefix' => 'client'],function(){
    //Dashboard
    Route::get('/','DashboardController@client');

    //Permohonan Baru
    Route::get('permohonan','Client\PermohonanController@index')->name('Permohonan Ramuan');
    Route::get('permohonan/create', 'Client\PermohonanController@create');
    Route::get('permohonan/edit/{id}','Client\PermohonanController@edit');
    Route::post('permohonan/store','Client\PermohonanController@store');
    Route::post('permohonan/upload','Client\PermohonanController@upload');
    Route::get('permohonan/view/{id}','Client\PermohonanController@view');
    Route::post('permohonan/delete/{id}','Client\PermohonanController@delete');

    //Permohonan Ditolak
    Route::get('tolak','Client\PermohonanController@tolak')->name('Permohonan Ditolak');
    Route::get('tolak/view/{id}','Client\PermohonanController@view');

    //Senarai Ramuan
    Route::get('ramuan','Client\RamuanController@index')->name('Senarai Ramuan');
    Route::get('ramuan/view/{id}','Client\RamuanController@view');
    Route::post('ramuan/delete/{id}','Client\RamuanController@delete');

    //Ramuan Yang Dihapuskan
    Route::get('hapus','Client\RamuanController@hapus')->name('Ramuan Yang Dihapuskan');
    Route::get('hapus/view/{id}','Client\RamuanController@view');
});

//Admin Webpage
Route::group(['prefix' => 'admin'],function(){

    //Dashboard
    Route::get('/','DashboardController@admin');
    Route::get('/pengumuman','DashboardController@pengumuman')->name('Pengumuman');

    //Permohonan Ditolak
    Route::get('tolak','Admin\PermohonanController@tolak')->name('Permohonan Ditolak');

    //Audit
    Route::get('audit','Admin\AuditController@index')->name('Audit');

    //Syarikat
    Route::get('syarikat','Admin\SyarikatController@index')->name('Syarikat');
    Route::get('syarikat/ramuan/{id}','Admin\SyarikatController@ramuan')->name('Syarikat / Senarai Ramuan');
    Route::get('syarikat/view/{id}','Admin\SyarikatController@view');

    //Staff
    Route::get('staff','Admin\StaffController@index')->name('Staff');
    Route::get('staff/create','Admin\StaffController@create');
    Route::get('staff/resetPassword','Admin\StaffController@resetPassword');

    //Permohonan
    Route::get('permohonan','Admin\PermohonanController@index')->name('Senarai Permohonan');
    Route::get('premohonan/modalSenaraiPermohonan','Admin\PermohonanController@modalSenaraiPermohonan');

    //Proses Semakan
    Route::get('proses','Admin\ProsesPermohonanController@index')->name('Semak Permohonan');

    //Proses Kelulusan
    Route::get('lulus','Admin\ProsesKelulusanController@index')->name('Kelulusan Permohonan');
});
