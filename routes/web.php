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
//admin match login logout
Route::get('admin/matchindex','AdminController@matchindex')->middleware('auth:admin');
Route::get('admin/matchupdate/{id?}','AdminController@matchupdate');
Route::post('admin/matchupdate/{id?}','AdminController@matchupdate');
Route::get('admin/matchadd','AdminController@matchadd');
Route::post('admin/matchadd','AdminController@matchadd');
Route::get('admin/matchdelete/{id?}','AdminController@matchdelete');
Route::get('admin/matchview/{id?}','AdminController@matchview');
Route::get('admin/logout','AdminController@logout');
Route::get('admin/login','AdminController@login');
Route::post('admin/login','AdminController@login');
Route::get('admin/index','AdminController@index');

//admin's company
Route::get('admin/company_index', 'AdminController@companyIndex')->name('admin_company_index');
Route::get('admin/company_add', 'AdminController@companyAdd')->name('admin_company_add');
Route::get('admin/company_edit', 'AdminController@companyedit')->name('admin_company_edit');
Route::get('admin/company_index', 'AdminController@companyIndex')->name('admin_company_index');
Route::get('admin/company_add', 'AdminController@companyAdd')->name('admin_company_add');
Route::post('admin/company_add','AdminController@companyAdd')->name('admin_company_add');
Route::get('admin/company_edit/{id?}', 'AdminController@companyEdit');
Route::post('admin/company_edit/{id?}','AdminController@companyEdit');
Route::get('admin/company_view/{id?}','AdminController@companyView')->name('admin_company_view');
Route::get('admin/company_del/{id?}','AdminController@companyDelete');
Route::post('admin/company_del/{id?}','AdminController@companyDelete');


//admin留学生部分
Route::get('admin/student_index', 'AdminController@studentIndex')->name('admin_student_index');
Route::get('admin/student_info/{id?}','AdminController@studentInfo');
Route::get('admin/student_del/{id?}','AdminController@studentDelete');
Route::post('admin/student_del/{id?}','AdminController@studentDelete');
Route::get('admin/student_add', 'AdminController@studentAdd')->name('admin_student_add');

Route::post('admin/student_add','AdminController@studentAdd')->name('admin_student_add');
Route::get('admin/student_edit/{id?}','AdminController@studentEdit');
Route::post('admin/student_edit/{id?}','AdminController@studentEdit');

//company
Route::get('company/login','CompanyController@login');
Route::post('company/login','CompanyController@login');
Route::get('company/register','CompanyController@register');
Route::post('company/register','CompanyController@register');
Route::get('company/view','CompanyController@view')->middleware('auth:company');
Route::post('company/view','CompanyController@view')->middleware('auth:company');
Route::get('company/edit','CompanyController@edit')->middleware('auth:company');
Route::post('company/edit','CompanyController@edit')->middleware('auth:company');
Route::get('company/logout','CompanyController@logout');
Route::get('company/clickrank','CompanyController@clickrank');
Route::get('/home', 'HomeController@index')->name('home');

//student
Route::get('student/student_add', 'StudentController@studentAdd');
Route::post('student/student_add', 'StudentController@studentAdd');
Route::get('student/student_login', 'StudentController@studentLogin');
Route::post('student/student_login', 'StudentController@studentLogin');
Route::get('student/student_index', 'StudentController@studentIndex')->middleware('auth');
Route::get('student/student_delete/{id?}','StudentController@studentDelete');
Route::get('student/student_edit', 'StudentController@studentEdit')->middleware('auth');
Route::post('student/student_edit', 'StudentController@studentEdit')->middleware('auth');
Route::get('student/student_match', 'StudentController@studentMatch')->middleware('auth');
Route::get('student/student_application/{id?}', 'StudentController@studentApplication')->middleware('auth');
Route::post('student/student_application/{id?}', 'StudentController@studentApplication')->middleware('auth');
Route::get('student/student_logout','StudentController@studentLogout');

//mail Test
Route::get('mail/send','MailController@send');





