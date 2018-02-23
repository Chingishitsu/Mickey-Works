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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('admin/matchindex','AdminController@matchindex');
Route::get('admin/matchupdate/{id?}','AdminController@matchupdate');
Route::post('admin/matchupdate/{id?}','AdminController@matchupdate');
Route::get('admin/matchadd','AdminController@matchadd');
Route::post('admin/matchadd','AdminController@matchadd');
Route::get('admin/matchdelete/{id?}','AdminController@matchdelete');
Route::get('admin/matchview/{id?}','AdminController@matchview');
Route::get('admin/logout','AdminController@logout');
Route::get('admin/login','AdminController@login');
Route::get('admin/index','AdminController@index');
