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

Route::get('/admin', function () {
    return view('admin.login');
});

Route::get('/test', function()
{
	return Uuid::generate(4);
});

//Admin Routes
Route::group(['middleware' => ['web']], function () {

	Route::post('/admin/login', 'AdminController@doLogin');

	Route::get('/admin/dashboard', 'AdminController@dashboard');	

	Route::get('/admin/faculties', 'AdminController@faculties');

	Route::post('/admin/faculties/create', 'AdminController@facultiesCreate');

	Route::get('/admin/faculties/delete/{id}', 'AdminController@facultiesDelete');

	Route::get('/admin/faculties/edit/{id}', 'AdminController@facultiesEdit');

	Route::post('/admin/faculties/edit/{id}', 'AdminController@facultiesUpdate');


	Route::get('/admin/departments', 'AdminController@departments');

	Route::post('/admin/departments/create', 'AdminController@departmentsCreate');

	Route::get('/admin/departments/delete/{id}', 'AdminController@departmentsDelete');

	Route::get('/admin/departments/edit/{id}', 'AdminController@departmentsEdit');

	Route::post('/admin/departments/edit/{id}', 'AdminController@departmentsUpdate');


	Route::get('/admin/levels', 'AdminController@levels');

	Route::post('/admin/levels/create', 'AdminController@levelsCreate');

	Route::get('/admin/levels/delete/{id}', 'AdminController@levelsDelete');

	Route::get('/admin/levels/edit/{id}', 'AdminController@levelsEdit');

	Route::post('/admin/levels/edit/{id}', 'AdminController@levelsUpdate');


	Route::get('/admin/courses', 'AdminController@courses');

	Route::post('/admin/courses/create', 'AdminController@coursesCreate');

	Route::get('/admin/courses/delete/{id}', 'AdminController@coursesDelete');

	Route::get('/admin/courses/edit/{id}', 'AdminController@coursesEdit');

	Route::post('/admin/courses/edit/{id}', 'AdminController@coursesUpdate');


	Route::get('/admin/semesters', 'AdminController@semesters');

	Route::post('/admin/semesters/create', 'AdminController@semestersCreate');

	Route::get('/admin/semesters/delete/{id}', 'AdminController@semestersDelete');

	Route::get('/admin/semesters/edit/{id}', 'AdminController@semestersEdit');

	Route::post('/admin/semesters/edit/{id}', 'AdminController@semestersUpdate');

	Route::get('/admin/registerableCourses', 'AdminController@registerableCourses');

});
