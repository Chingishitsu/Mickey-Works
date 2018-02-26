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
//管理者の企業
Route::get('admin/company_index', 'AdminController@companyIndex')->name('admin_company_index');
Route::get('admin/company_add', 'AdminController@companyAdd')->name('admin_company_add');
Route::get('admin/company_edit', 'AdminController@companyedit')->name('admin_company_edit');
