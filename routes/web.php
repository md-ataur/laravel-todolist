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

Route::get('/',function(){
	return view('welcome');
});

/* CRUD mechanism for todolist */
Route::resource('todo','TodolistController');

/* Ajax mechanism start */
Route::get('todoajax','ListController@index');
Route::post('todoajax','ListController@create');
Route::post('delete','ListController@delete');
Route::post('update','ListController@update');
Route::get('search','ListController@search');
/* Ajax mechanism end */

/* File upload mechanism start */
Route::get('upload','UploadController@index');
Route::post('store','UploadController@store');
Route::get('show/{id}','UploadController@show');
/* File upload mechanism end */

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/* Socialite for facebook */
/*Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');*/

/* Socialite for twitter */
/*Route::get('login/twitter', 'Auth\LoginController@redirectToProvider');
Route::get('login/twitter/callback', 'Auth\LoginController@handleProviderCallback');*/

/* Socialite for google */
/*Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');*/

/* Socialite login */
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
