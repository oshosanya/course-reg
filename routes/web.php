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

Route::get('/', function()
{
	return view('admin.home');
});

Route::get('/test', function()
{
	return Hash::make('foluke');
});

Route::get('/result', 'ResultController@result');

Route::group(['middleware' => ['web']], function () {
	
	Route::get('/admin', function () {
	    return view('admin.login');
	});

	Route::post('/admin/login', 'AdminController@doLogin');

	Route::get('/staff', function () {
	    return view('staff.login');
	});

	Route::post('/staff/login', 'StaffController@doLogin');

	Route::get('/student', function () {
	    return view('student.login');
	});

	Route::post('/student/login', 'StudentController@doLogin');

});

//Admin Routes
Route::group(['middleware' => ['web', 'checkadmin']], function () {

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


	Route::get('/admin/units', 'AdminController@units');

    Route::post('/admin/units/create', 'AdminController@unitsCreate');

    Route::get('/admin/units/delete/{id}', 'AdminController@unitsDelete');

    Route::get('/admin/units/edit/{id}', 'AdminController@unitsEdit');

    Route::post('/admin/units/edit/{id}', 'AdminController@unitsUpdate');


	Route::get('/admin/registerableCourses', 'AdminController@registerableCourses');

	Route::post('/admin/registerableCourses/create', 'AdminController@registerableCoursesCreate');

	Route::get('/admin/registerableCourses/assign/{id}', 'AdminController@registerableCoursesAssign');

	Route::post('/admin/registerableCourses/assign/{id}', 'AdminController@registerableCoursesAssigned');


	Route::get('/admin/userAccounts/student', 'AdminController@userAccountsStudent');

    Route::post('/admin/userAccounts/student/create', 'AdminController@userAccountsStudentCreate');

    Route::get('/admin/userAccounts/student/delete/{id}', 'AdminController@userAccountsStudentDelete');

    Route::get('/admin/userAccounts/student/edit/{id}', 'AdminController@userAccountsStudentEdit');

    Route::post('/admin/userAccounts/student/edit/{id}', 'AdminController@userAccountsStudentUpdate');


    Route::get('/admin/userAccounts/staff', 'AdminController@userAccountsStaff');

    Route::post('/admin/userAccounts/staff/create', 'AdminController@userAccountsStaffCreate');

    Route::get('/admin/userAccounts/staff/delete/{id}', 'AdminController@userAccountsStaffDelete');

    Route::get('/admin/userAccounts/staff/edit/{id}', 'AdminController@userAccountsStaffEdit');

    Route::post('/admin/userAccounts/staff/edit/{id}', 'AdminController@userAccountsStaffUpdate');

    Route::get('/admin/results', 'AdminController@results');

    Route::get('/admin/resultPrint', 'AdminController@resultPrint');

    Route::get('/admin/logout', function()
    {
    	Auth::logout();
    	return redirect('/admin')->with([
    			'warning' => 'You have been logged out'
    		]);
    });

});

//Staff Routes
Route::group(['middleware' => ['web', 'checkstaff']], function () {

	Route::get('/staff/dashboard', 'StaffController@dashboard');

	Route::get('/staff/account', 'StaffController@account');

	Route::get('/staff/courses', 'StaffController@courses');

	Route::get('/staff/results', 'StaffController@results');

	Route::post('/staff/results', 'StaffController@storeResults');

	Route::get('/staff/logout', function()
    {
    	Auth::logout();
    	return redirect('/staff')->with([
    			'warning' => 'You have been logged out'
    		]);
    });

});

//Student Routes
Route::group(['middleware' => ['web', 'checkstudent']], function () {

	Route::get('/student/account', 'StudentController@account');

	Route::get('/student/dashboard', 'StudentController@dashboard');

	Route::get('/student/courses', 'StudentController@courses');

	Route::get('/student/courseRegistration', 'StudentController@courseRegistration');

	Route::post('/student/courseRegistration', 'StudentController@courseRegistrationCreate');

	Route::post('/student/passport', 'StudentController@passport');

	Route::get('/student/result', 'StudentController@result');

	Route::get('/student/resultGet', 'StudentController@resultGet');

	Route::get('/student/logout', function()
    {
    	Auth::logout();
    	return redirect('/student')->with([
    			'warning' => 'You have been logged out'
    		]);
    });

});