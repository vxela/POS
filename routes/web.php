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

    Route::get('/penjualan/flushss', 'PenjualanController@flushSs');
    Route::resource('/penjualan', 'PenjualanController');
    Route::get('/penjualan/{id}/delete', 'PenjualanController@delete');
    Route::get('/penjualan/potemp/clear', 'poTempController@clear_temp')->name('potemp.clear');
    Route::resource('penjualan/potemp', 'poTempController');
    Route::post('/customer/search', 'CustomerController@src_customer')->name('customer.search');
    // Route::post('/penjualan/storetemp', 'PenjualanController@storeTemp');
    // Route::post('/penjualan/{id}/updatepreorder', 'PenjualanController@updatepreorder');
});

Route::group(['middleware' => ['auth','CheckUserRole:admin,manajemen,gudang']], function () {
    
    Route::resource('/produk', 'ProdukController');
    Route::get('/produk/{id}/delete', 'ProdukController@delete');
    Route::get('/dashboard', 'ProduksiController@dashboard');
    Route::resource('/produksi', 'ProduksiController');
    Route::get('/produksi/{id}/delete', 'ProduksiController@delete');
    
});
