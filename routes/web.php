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

Route::group(['middleware' => 'CheckLogin'], function () {
    Route::get('/', 'UserController@show')->name('login');
    Route::post('/', 'UserController@login');
});
Route::get('logout', 'UserController@logout')->name('logout');
Route::group(['prefix' => 'admin','middleware' => 'CheckLogout'], function () {
    Route::get('/', 'ProductController@show')->name('showProduct');
    Route::get('/delete/{id}', 'ProductController@delete')->name('delete-product');
    Route::get('add', 'ProductController@create')->name('add-product');
    Route::post('add', 'ProductController@store');
    Route::get('/detail/{id}', 'ProductController@detail')->name('detail-product');
    Route::post('/detail/{id}', 'ProductController@update')->name('update-product');
});
