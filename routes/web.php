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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

/*
 Route::middleware('auth')->get('home/tokeninit', 'ApiTokenController@update')->name('tokeninit');
 68XMw5cs5EhEWHTjSLSYCIhESNyoCDSwzXQG3lAR93k2xxk5zsdlkSGrtinv
*/


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('categories', 'CategoryController@index')->name('categories');
    Route::get('categories/create', 'CategoryController@create')->name('create_category');
    Route::post('categories/store', 'CategoryController@store')->name('store_category');
    Route::get('categories/{category_id}/edit', 'CategoryController@edit')->name('edit_category');
    Route::post('categories/{category_id}/edit', 'CategoryController@update')->name('update_category');
    Route::post('categories/{category_id}/delete', 'CategoryController@destroy')->name('delete_category');

    Route::get('categories/{category_id}/services', 'CategoryController@index_category_services')->name('category_services');
    Route::get('categories/{category_id}/services/create', 'ServiceController@create_category_services')->name('create_category_service');
    Route::post('categories/{category_id}/services/store', 'ServiceController@store_category_services')->name('store_category_service');
    Route::get('categories/{category_id}/services/{service_id}/edit', 'ServiceController@edit')->name('edit_category_service');
    Route::post('categories/{category_id}/services/{service_id}/edit', 'ServiceController@update')->name('update_category_service');
    Route::post('categories/{category_id}/services/{service_id}/delete', 'ServiceController@destroy')->name('delete_category_service');

});