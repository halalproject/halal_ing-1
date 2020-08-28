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
Route::get('/','PortalController@index');
Route::get('/ramuanList','PortalController@ramuanList');
//Login
Route::get('/login','LoginController@index')->name('login');
Route::post('/auth','LoginController@auth');

//Client Webpage
Route::group(['prefix' => 'client'],function(){
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

    //Ramuan Yang Dihapuskan
    Route::get('hapus','Client\RamuanHapusController@hapus')->name('Ramuan Yang Dihapuskan');
    Route::get('hapus/view/{id}','Client\RamuanHapusController@view');
});

//Admin Webpage
Route::group(['prefix' => 'admin'],function(){

    //Dashboard
    Route::get('/','DashboardController@admin');

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

    //Proses
    Route::get('proses','Admin\ProsesPermohonanController@index')->name('Semak Permohonan');
});
