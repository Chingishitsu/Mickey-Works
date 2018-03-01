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
Route::get('admin/matchindex','AdminController@matchindex')->middleware('auth:admin');
Route::get('admin/matchupdate/{id?}','AdminController@matchupdate')->middleware('auth:admin');
Route::post('admin/matchupdate/{id?}','AdminController@matchupdate')->middleware('auth:admin');
Route::get('admin/matchadd','AdminController@matchadd')->middleware('auth:admin');
Route::post('admin/matchadd','AdminController@matchadd')->middleware('auth:admin');
Route::get('admin/matchdelete/{id?}','AdminController@matchdelete')->middleware('auth:admin');
Route::get('admin/matchview/{id?}','AdminController@matchview')->middleware('auth:admin');
Route::get('admin/logout','AdminController@logout');
Route::get('admin/login','AdminController@login');
Route::post('admin/login','AdminController@login');
Route::get('admin/index','AdminController@index')->middleware('auth:admin');

Route::get('/home','HomeController@index')->name('home');
Route::get('admin/student_index', 'AdminController@studentIndex')->name('admin_student_index');

Route::get('admin/student_info/{id?}','AdminController@studentInfo');

Route::get('admin/student_del/{id?}','AdminController@studentDelete');
Route::post('admin/student_del/{id?}','AdminController@studentDelete');

Route::get('admin/student_add', 'AdminController@studentAdd')->name('admin_student_add');


//管理者の企業
Route::get('admin/company_index', 'AdminController@companyIndex')->name('admin_company_index');
Route::get('admin/company_add', 'AdminController@companyAdd')->name('admin_company_add');
Route::get('admin/company_edit', 'AdminController@companyedit')->name('admin_company_edit');
//student
Route::get('student/student_add', 'StudentController@studentAdd');
Route::post('student/student_add', 'StudentController@studentAdd');
Route::get('student/student_login', 'StudentController@studentLogin');
Route::get('student/student_index', 'StudentController@studentIndex');
Route::get('student/student_edit', 'StudentController@studentEdit');
Route::post('student/student_edit', 'StudentController@studentEdit');


//adminのstudent
Route::get('admin/student_info/{id?}','AdminController@studentInfo');
Route::get('admin/student_del/{id?}','AdminController@studentDelete');
Route::post('admin/student_del/{id?}','AdminController@studentDelete');
Route::get('admin/student_add', 'AdminController@studentAdd')->name('admin_student_add');
Route::post('admin/student_add','AdminController@studentAdd')->name('admin_student_add');
Route::get('admin/student_edit/{id?}','AdminController@studentEdit');
Route::post('admin/student_edit/{id?}','AdminController@studentEdit');


Route::get('admin/student_edit','AdminController@studentEdit')->name('admin_student_edit');
Route::post('admin/student_edit','AdminController@studentEdit')->name('admin_student_edit');




//company
Route::get('company/login','CompanyController@login');
Route::post('company/login','CompanyController@login');
Route::get('company/register','CompanyController@register');
Route::post('company/register','CompanyController@register');
Route::get('company/view','CompanyController@view');
Route::get('company/edit','CompanyController@edit');
Route::post('company/edit','CompanyController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
