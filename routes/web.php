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
 68XMw5cs5EhEWHTjSLSYCIhESNyoCDSwzXQG3lAR93k2xxk5zsdlkSGrtinv
*/
Route::middleware('auth')->get('home/tokeninit', 'ApiTokenController@update')->name('tokeninit');
Route::middleware('auth')->get('categories', 'CategoryController@index')->name('categories');
Route::middleware('auth')->get('categories/create', 'CategoryController@create')->name('create_category');
Route::middleware('auth')->post('categories/store', 'CategoryController@store')->name('store_category');
Route::middleware('auth')->get('categories/{category_id}/services', 'CategoryController@index_category_services')->name('category_services');
Route::middleware('auth')->get('services', 'ServiceController@index')->name('services');
Route::middleware('auth')->get('categories/{category_id}/services/create', 'ServiceController@create_category_services')->name('create_category_service');
Route::middleware('auth')->post('categories/{category_id}/services/store', 'ServiceController@store_category_services')->name('store_category_service');