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


Route::get('index', 'PageController@getIndex')->name('trang-chu');
Route::get('loai-san-pham/{type}', 'PageController@getLoaiSp')->name('loaisanpham');
Route::get('chi-tiet-san-pham', 'PageController@getChitiet')->name('chitietsanpham');
Route::get('lien-he', 'PageController@getLienHe')->name('lienhe');
Route::get('gioi-thieu', 'PageController@getGioiThieu')->name('gioithieu');