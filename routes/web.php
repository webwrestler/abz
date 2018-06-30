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

Route::get('/index', function () {
    return view('index');
});

Auth::routes();


Route::match(['get','post'], '/', ['as' => 'index', 'uses' => 'Controller@index']);
Route::match(['get','post'], '/admin/create', ['as' => 'create', 'uses' => 'AdminController@create']);
Route::match(['get','post'], '/admin/update/{id}', ['as' => 'update', 'uses' => 'AdminController@update']);
Route::get('/admin/delete/{id}', ['as' => 'delete', 'uses' => 'AdminController@delete']);

Route::get('/admin', ['as' => 'admin', 'uses' => 'AdminController@index']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


//Route::get('/', view('welcome'));


