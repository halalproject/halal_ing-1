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
Route::get('/view/{id}','PortalController@syarikat');
//Login
Route::get('/login','LoginController@index')->name('login');
Route::post('/auth','LoginController@auth');

Route::get('/logout','LoginController@logout');

//Client Webpage
Route::group(['middleware' => 'auth:client','prefix' => 'client'],function(){
    //Dashboard
    Route::get('/','DashboardController@client');
    Route::get('/announce/{id}','DashboardController@announcement');

    //Profile & Password
    Route::get('/profile','Client\ClientController@profile');
    Route::post('/store','Client\ClientController@store');
    Route::get('/password','Client\ClientController@password');
    Route::post('/reset','Client\ClientController@reset');

    //Permohonan Baru
    Route::get('permohonan','Client\PermohonanController@index')->name('Permohonan Ramuan');
    Route::get('permohonan/create', 'Client\PermohonanController@create');
    Route::get('permohonan/edit/{id}','Client\PermohonanController@edit');
    Route::post('permohonan/store','Client\PermohonanController@store');
    Route::post('permohonan/upload','Client\PermohonanController@upload');
    Route::get('permohonan/view/{id}','Client\PermohonanController@view');
    Route::post('permohonan/delete/{id}','Client\PermohonanController@delete');
    Route::get('permohonan/getDokumen/{type}','Client\PermohonanController@getDokumen');
    Route::get('dokumen_ramuan/{file}', 'Client\PermohonanController@downloadDocument');

    //Permohonan Ditolak
    Route::get('tolak','Client\PermohonanController@tolak')->name('Permohonan Ditolak');
    Route::get('tolak/view/{id}','Client\PermohonanController@view');
    Route::get('tolak/surat','Client\PermohonanController@surat');

    //Senarai Ramuan
    Route::get('ramuan','Client\RamuanController@index')->name('Senarai Ramuan');
    Route::get('ramuan/view/{id}','Client\RamuanController@view');
    Route::get('ramuan/edit/{id}','Client\RamuanController@showEditTarikh');
    Route::post('ramuan/updateSijil','Client\RamuanController@updateSijil');
    Route::get('ramuan/delete_comment/{id}','Client\RamuanController@delete_comment');
    Route::post('ramuan/reason','Client\RamuanController@reason');
    Route::get('ramuan/{file}', 'Client\RamuanController@downloadDocument');
    Route::get('ramuan/surat','Client\RamuanController@surat');

    //Ramuan Yang Dihapuskan
    Route::get('hapus','Client\RamuanController@hapus')->name('Ramuan Yang Dihapuskan');
    Route::get('hapus/view/{id}','Client\RamuanController@view');
    Route::post('hapus/restore/{id}','Client\RamuanController@restore');

    //Surat Ramuan
    Route::get('surat','Client\SuratController@index');
});

//Admin Webpage
Route::group(['middleware' => 'auth:admin','prefix' => 'admin'],function(){

    //Dashboard
    Route::get('/','DashboardController@admin');
    
    //Pengumuman
    Route::get('pengumuman','DashboardController@pengumuman')->name('Pengumuman');
    Route::get('pengumuman/create','DashboardController@pengumuman_create');
    Route::post('pengumuman/store','DashboardController@pengumuman_store');
    Route::get('pengumuman/edit/{id}','DashboardController@edit');
    Route::post('pengumuman/delete/{id}','DashboardController@delete');
    Route::get('dokumen_pengumuman/{file}', 'DashboardController@downloadDocument');

    //Event
    Route::get('/event/view/{id}','DashboardController@event_view');

    //Profile and Password
    Route::get('profile','Admin\AdminController@profile');
    Route::post('store','Client\AdminController@store');
    Route::get('password','Admin\AdminController@password');
    Route::post('reset','Admin\AdminController@reset');

    //Permohonan
    Route::get('permohonan','Admin\PermohonanController@index')->name('Senarai Permohonan');
    Route::get('premohonan/modal_permohonan/{id}','Admin\PermohonanController@modal_permohonan');

    //Proses Semakan
    Route::get('semak','Admin\SemakanController@index')->name('Semak Permohonan');
    Route::get('semak/modal_permohonan/{id}','Admin\SemakanController@modal_permohonan');
    Route::post('semak/komen','Admin\SemakanController@komen');

    //Proses Kelulusan
    Route::get('lulus','Admin\KelulusanController@index')->name('Kelulusan Permohonan');
    Route::get('lulus/modal_permohonan/{id}','Admin\KelulusanController@modal_permohonan');
    Route::post('lulus/komen','Admin\KelulusanController@komen');

    //Permohonan Ditolak
    Route::get('tolak','Admin\PermohonanController@tolak')->name('Permohonan Ditolak');
    Route::get('tolak/detail/{id}','Admin\PermohonanController@detail');
    Route::get('tolak/surat','Admin\PermohonanController@surat');

    //Audit
    Route::get('audit','Admin\AuditController@index')->name('Audit');
    Route::get('audit/detail/{id}','Admin\AuditController@detail');
    Route::get('audit/surat','Admin\AuditController@surat');

    //Syarikat
    Route::get('syarikat','Admin\SyarikatController@index')->name('Syarikat');
    Route::get('syarikat/ramuan/{id}','Admin\SyarikatController@ramuan')->name('Syarikat / Senarai Ramuan');
    Route::get('syarikat/view/{id}','Admin\SyarikatController@view');
    Route::get('syarikat/detail/{id}','Admin\SyarikatController@detail');
    Route::get('syarikat/pengumuman/{id}','Admin\SyarikatController@pengumuman');
    Route::post('syarikat/pengumuman/simpan','Admin\SyarikatController@simpan');
    Route::get('syarikat/announcement/{id}','Admin\SyarikatController@announcement')->name('Syarikat / Senarai Pengumuman');
    Route::get('syarikat/pengumuman/create/{id}','Admin\SyarikatController@pengumuman_create');

    //Staff
    Route::get('staff','Admin\StaffController@index')->name('Kakitangan');
    Route::get('staff/create','Admin\StaffController@create');
    Route::get('staff/edit/{id}','Admin\StaffController@edit');
    Route::post('staff/store','Admin\StaffController@store');
    Route::post('staff/reset/{id}','Admin\StaffController@reset');
    Route::post('staff/delete/{id}','Admin\StaffController@delete');

    //Email
    Route::get('surat','Admin\SuratController@index')->name('Kakitangan');
    Route::get('surat/edit/{id}','Admin\SuratController@edit');
    Route::post('surat/store','Admin\SuratController@store');
});
