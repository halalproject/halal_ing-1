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
    Route::get('/dokumen_pengumuman/{file}', 'DashboardController@downloadDocument');

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
Route::group(['middleware' => 'auth:admin','prefix' => 'jais'],function(){

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
    Route::get('/event/dokumen/{file}','DashboardController@event_doc');

    //Profile and Password
    Route::get('profile','Jais\AdminController@profile');
    Route::post('store','Jais\AdminController@store');
    Route::get('password','Jais\AdminController@password');
    Route::post('reset','Jais\AdminController@reset');

    //Permohonan
    Route::get('permohonan','Jais\PermohonanController@index')->name('Senarai Permohonan');
    Route::get('premohonan/modal_permohonan/{id}','Jais\PermohonanController@modal_permohonan');

    //Proses Semakan
    Route::get('semak','Jais\SemakanController@index')->name('Semak Permohonan');
    Route::get('semak/modal_permohonan/{id}','Jais\SemakanController@modal_permohonan');
    Route::post('semak/komen','Jais\SemakanController@komen');

    //Proses Kelulusan
    Route::get('lulus','Jais\KelulusanController@index')->name('Kelulusan Permohonan');
    Route::get('lulus/modal_permohonan/{id}','Jais\KelulusanController@modal_permohonan');

    //Permohonan Ditolak
    Route::get('tolak','Jais\PermohonanController@tolak')->name('Permohonan Ditolak');
    Route::get('tolak/detail/{id}','Jais\PermohonanController@detail');
    Route::get('tolak/surat','Jais\PermohonanController@surat');

    //Audit
    Route::get('audit','Jais\AuditController@index')->name('Audit');
    Route::get('audit/detail/{id}','Jais\AuditController@detail');
    Route::get('audit/dokumen/{file}','Jais\AuditController@download');
    Route::get('audit/surat','Jais\AuditController@surat');

    //Syarikat
    Route::get('syarikat','Jais\SyarikatController@index')->name('Syarikat');
    Route::get('syarikat/ramuan/{id}','Jais\SyarikatController@ramuan')->name('Syarikat / Senarai Ramuan');
    Route::get('syarikat/view/{id}','Jais\SyarikatController@view');
    Route::get('syarikat/detail/{id}','Jais\SyarikatController@detail');
    Route::get('syarikat/pengumuman/{id}','Jais\SyarikatController@pengumuman');
    Route::post('syarikat/pengumuman/simpan','Jais\SyarikatController@simpan');
    Route::get('syarikat/announcement/{id}','Jais\SyarikatController@announcement')->name('Syarikat / Senarai Pengumuman');
    Route::get('syarikat/pengumuman/create/{id}','Jais\SyarikatController@pengumuman_create');

    //Staff
    Route::get('staff','Jais\StaffController@index')->name('Kakitangan');
    Route::get('staff/create','Jais\StaffController@create');
    Route::get('staff/edit/{id}','Jais\StaffController@edit');
    Route::post('staff/store','Jais\StaffController@store');
    Route::post('staff/reset/{id}','Jais\StaffController@reset');
    Route::post('staff/delete/{id}','Jais\StaffController@delete');

    //Email
    Route::get('surat','Jais\SuratController@index')->name('Penjanaa Surat');
    Route::get('surat/edit/{id}','Jais\SuratController@edit');
    Route::post('surat/store','Jais\SuratController@simpan');

    //Badan Persijilan Halal
    Route::get('sijil_halal','Jais\CBController@index')->name('Badan Persijilan Halal');
    Route::get('sijil_halal/edit','Jais\CBController@edit');
    Route::post('sijil_halal/store','Jais\CBController@store');
    Route::get('sijil_halal/sync','Jais\CBController@sync');

    //Auditrail
    Route::get('auditrail','Jais\AuditrailController@index');
});
