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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', 'LoginController@index');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/auth', 'LoginController@authLogin');
Route::get('/logout', 'LoginController@logout');

Route::group(['middleware' => ['auth','CheckUserRole:admin,manajemen,gudang,kasir']], function () {
    
});

Route::group(['middleware' => ['auth','CheckUserRole:admin,manajemen']], function () {

    Route::get('/dashboard', 'DashboardController@index');
    
});

Route::group(['middleware' => ['auth','CheckUserRole:admin,manajemen,kasir']], function () {

    Route::get('/penjualan', 'PenjualanController@index');
    
});

Route::group(['middleware' => ['auth','CheckUserRole:admin,manajemen,gudang']], function () {
    
    Route::get('/produksi', 'ProduksiController@index');
    Route::get('/produksi/tabel', 'ProduksiController@listAll');
    Route::get('/produksi/produk/{id}', 'ProduksiController@show');
    Route::get('/produksi/edit/{id}', 'ProduksiController@edit');
    Route::post('/produksi/update/{id}', 'ProduksiController@update');
    Route::get('/produksi/delete/{id}', 'ProduksiController@delete');
    Route::get('/produksi/destroy/{id}', 'ProduksiController@destroy');
    Route::get('/produksi/tambah', 'ProduksiController@add');
    Route::post('/produksi/simpan', 'ProduksiController@store');

});

// Route::group(['middleware' => ['auth','CheckUserRole:admin']], function () {

//     Route::get('/dashboard', 'DashboardController@index');
//     Route::get('/dashboard/manager', 'DashboardController@index');
    
    
//     Route::get('/produksi', 'ProduksiController@index');

// });

// Route::group(['middleware' => ['auth','CheckUserRole:admin,manajemen,gudang,kasir']], function () {
    
//     Route::get('/dashboard', 'DashboardController@index');

// });

// Route::group(['middleware' => ['auth','CheckUserRole:gudang']], function () {
    
//     Route::get('/dashboard', 'DashboardGudangController@index');

// });

// Route::group(['middleware' => ['auth','CheckUserRole:kasir']], function () {
    
//     Route::get('/dashboard', 'DashboardKasirController@index');

// });