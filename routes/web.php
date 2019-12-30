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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'ProductController@show')->name('showProduct');
    // Route::get('/detail/{id}', 'ProductController@detail')->name('detail-product');
    Route::get('/delete/{id}', 'ProductController@delete')->name('delete-product');
    Route::get('add', 'ProductController@create')->name('add-product');
    Route::post('add', 'ProductController@store');
});
