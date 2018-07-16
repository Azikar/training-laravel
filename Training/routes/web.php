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

Route::resource('/home', 'AdController');
Route::get('/', 'PagesController@index');
Route::get('/home/sort/{way}',['uses'=> 'AdController@sortbydate']);
Auth::routes();
Route::get('/MyAds/sort/{way}',['uses'=> 'HomeController@sortbydate']);
Route::get('/MyAds', 'HomeController@index')->name('home');
//Route::get('/Main_reload','PagesController@index');
Auth::routes();
Route::get('/Main_reload','PagesController@reload');
Route::get('/MyAds', 'HomeController@index')->name('home');
