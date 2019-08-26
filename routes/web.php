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
Route::get('/tes',function(){
  return  view('vendor.multiauth.layouts.appadmin');
});

Route::resource('sekolah', 'SekolahController')->except('show','store');
Route::resource('/sekolah/profil', 'ProfileController');
Route::get('/register', 'SekolahController@index')->name('register');
Route::get('/admin/sekolah', 'SekolahController@list')->name('admin.sekolah');
Route::post('/admin/sekolah/{id}', 'SekolahController@destroy')->name('admin.sekolah.delete');

Route::resource('/admin/anggaran', 'AnggaranController')->except('index');
Route::get('/admin/anggarans','AnggaranController@index')->name('anggaran');
Route::get('/admin/anggarans/getdata','AnggaranController@getdata')->name('anggaran.getdata');

Route::resource('/admin/kegiatan', 'KegiatanController')->except('index');
Route::get('/admin/kegiatans','KegiatanController@index')->name('kegiatan');
Route::get('/admin/kegiatans/getdata','KegiatanController@getdata')->name('kegiatan.getdata');

Route::resource('/admin/belanja','BelanjaController')->except('index');
Route::get('/admin/belanjas','BelanjaController@index')->name('belanja');
Route::get('/admin/belanjas/getdata','BelanjaController@getdata')->name('belanja.getdata');


Route::resource('/admin/jenisbelanja','JenisbelanjaController')->except('index');
Route::get('/admin/jenisbelanjas','JenisbelanjaController@index')->name('jenisbelanja');
Route::get('/admin/jenisbelanjas/getdata','JenisbelanjaController@getdata')->name('jenisbelanja.getdata');


Route::resource('/admin/penge','PengeluaranController')->except('index');
Route::get('/admin/pengeluarans','PengeluaranController@index')->name('pengeluaran');
Route::get('/admin/pengeluarans/getdata','PengeluaranController@getdata')->name('pengeluaran.getdata');

Route::GET('/sekolah/password/change', 'ProfileController@showChangePasswordForm')->name('sekolah.password.change');
Route::POST('/sekolah/password/change', 'ProfileController@changePassword')->name('sekolah.password.change');

Route::resource('/sekolah/pengeluaran','SekolahPengeluaranController')->except('index','create','edit');
Route::get('/sekolah/pengeluarans/{id}','SekolahPengeluaranController@index')->name('sekolah.pengeluaran');
Route::get('/sekolah/pengeluarans/create/{id}','SekolahPengeluaranController@create')->name('sekolah.pengeluaran.create');
Route::get('/sekolah/pengeluarans/edit/{id}/{id1}','SekolahPengeluaranController@edit')->name('sekolah.pengeluaran.edit');
Route::get('/sekolah/pengeluarans/getdatasekolah/{id}','SekolahPengeluaranController@getdatasekolah')->name('pengeluaran.getdatasekolah');

Route::get('/sekolah/cetak/pengeluaran','CetakController@cetakpengeluaran')->name('sekolah.cetak.pengeluaran');
Route::get('/admin/cetak/pengeluaran','AdminCetakController@cetakpengeluaranadmin')->name('admin.cetak.pengeluaran');
Route::post('/sekolah/cetak','CetakController@cetak')->name('sekolah.cetak');
Route::post('/admin/cetak','AdminCetakController@rekap')->name('admin.cetak');
Route::get('/cetak','CetakController@rekap')->name('cetak');

Route::get('user','UserController@index')->name('user');
Route::get('user/getdata','UserController@getdata')->name('user.getdata');


Route::post('/register/store', 'SekolahController@store')->name('register.store');
