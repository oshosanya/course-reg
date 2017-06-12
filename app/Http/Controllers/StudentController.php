<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\RegisterableCourse;
use App\RegisteredCourse;
use App\Setting;
use App\Student;

class StudentController extends Controller
{
    public function __construct()
	{
		$this->currentSession = Setting::where('parameter', '=', 'current_session')->first()->value;
		$this->currentSemester = Setting::where('parameter', '=', 'current_semester')->first()->value;
	}

    public function dashboard()
    {
    	return view('student.dashboard');
    }

    public function doLogin(Request $request)
    {
    	if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect()->intended('student/dashboard');
        }
        else
        {
            return redirect('/student')->with('warning', 'Login credentials incorrect');
        }
    }

    public function courses()
    {
    	$courses = RegisteredCourse::where([
    		['id_level', '=', Student::where('id_user', '=', Auth::id())->first()->id_level],
    		['id_user', '=', Auth::id()],
    		['id_session', '=', $this->currentSession],
    		['id_semester', '=', $this->currentSemester]
    		])->get();
    	return view('student.courses')->with([
    		'courses' => $courses,
    		]);
    }

    public function courseRegistration()
    {
    	$courses = RegisterableCourse::where([
    		['id_level', '=', Student::where('id_user', '=', Auth::id())->first()->id_level],
    		['id_session', '=', $this->currentSession],
    		['id_semester', '=', $this->currentSemester]
    		])->get();
    	$previously_registered = RegisteredCourse::where([
    			['id_user', '=', Auth::id()],
    			['id_level', '=', Student::where('id_user', '=', Auth::id())->first()->id_level],
    			['id_semester', '=', $this->currentSemester],
    			['id_session', '=', $this->currentSession]
    		])->get();

    	return view('student.courseRegistration')->with([
    		'courses' => $courses,
    		'registered_courses' => $previously_registered
    		]);
    }

    public function courseRegistrationCreate(Request $request)
    {
    	$registerable = $request->input('registerable');
    	$previously_registered = RegisteredCourse::where([
    			['id_user', '=', Auth::id()],
    			['id_level', '=', Student::where('id_user', '=', Auth::id())->first()->id_level],
    			['id_semester', '=', $this->currentSemester],
    			['id_session', '=', $this->currentSession]
    		])->get();
    	foreach($previously_registered as $p)
    	{
    		RegisteredCourse::find($p->id)->delete();
    	}
    	foreach($registerable as $r)
    	{
    		$registered = new RegisteredCourse;
    		$registered->id_registerable_course = $r;
    		$registered->id_user = Auth::id();
    		$registered->id_session = $this->currentSession;
    		$registered->id_semester = $this->currentSemester;
    		$registered->id_level = Student::where('id_user', '=', Auth::id())->first()->id_level;
    		$registered->save();
    	}
    	return redirect('/student/courseRegistration')->with([
    			'success' => 'Course Registration successfull. Click on registered courses in the course sub menu to print your course form'
    		]);
    }
}
