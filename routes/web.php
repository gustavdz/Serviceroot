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
Route::middleware('auth')->get('/home/tokeninit', 'ApiTokenController@update')->name('tokeninit');
Route::middleware('auth')->get('/categories', 'CategoryController@index')->name('categories');