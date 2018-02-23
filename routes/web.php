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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/student_index', 'AdminController@studentIndex')->name('admin_student_index');
Route::get('admin/student_add', 'AdminController@studentAdd')->name('admin_student_add');
