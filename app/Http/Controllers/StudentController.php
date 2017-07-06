<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Storage;

use App\Level;
use App\RegisterableCourse;
use App\RegisteredCourse;
use App\Result;
use App\Semester;
use App\Session;
use App\Setting;
use App\Student;
use App\User;

class StudentController extends Controller
{
    public function __construct()
	{
		$this->currentSession = Setting::where('parameter', '=', 'current_session')->first()->value;
		$this->currentSemester = Setting::where('parameter', '=', 'current_semester')->first()->value;
        \Cloudinary::config(array( 
            "cloud_name" => "bellybutton", 
            "api_key" => "751876358226266", 
            "api_secret" => "IVvDXdYIFXq0ppfrYp_Px7YH4Mk" 
        ));
	}

    public function account()
    {
        $user = User::find(Auth::id());
        $student = Student::where('id_user', '=', Auth::id())->first();
        return view('student.account')->with([
                'user' => $user,
                'student' => $student
            ]);
    }

    public function dashboard()
    {
        $registeredCourses = RegisteredCourse::where([
                ['id_user', '=', Auth::id()],
                ['id_level', '=', Student::where('id_user', '=', Auth::id())->first()->id_level]
            ])->get();
        $registerableCourses = RegisterableCourse::where([
                ['id_level', '=', Student::where('id_user', '=', Auth::id())->first()->id_level],
                ['id_session', '=', $this->currentSession],
                ['id_semester', '=', $this->currentSemester],
                ['id_department', '=', Student::where('id_user', '=', Auth::id())->first()->id_department],
            ])->get();
    	return view('student.dashboard')->with([
                'registeredCourses' => $registeredCourses,
                'registerableCourses' => $registerableCourses
            ]);
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

    public function passport(Request $request)
    {
        if ($request->hasFile('passport')) {
            $this->validate($request, [
                'passport' => 'required|file|image|mimes:jpeg,png',
            ]);
            $path = $request->file('passport')->store('passports');
            //$contents = Storage::get(storage_path('app/'.$path));
            $upload = \Cloudinary\Uploader::upload(storage_path('app/'.$path));
            //return var_dump($upload['secure_url']);
            $student = Student::where('id_user', '=', Auth::id())->first();
            $student->passport_url = $upload['secure_url'];
            $student->save();

            return redirect('/student/account')->with([
                    'success' => 'Passport uploaded successfully'
                ]);
        }
        else
        {
            return redirect('/student/account')->with([
                    'warning' => 'Please select a file to upload'
                ]);
        }
    }

    public function result()
    {
        $levels = Level::all();
        $semesters = Semester::all();
        $sessions = Session::all();
        return view('student.result')->with([
                'levels' => $levels,
                'semesters' => $semesters,
                'sessions' => $sessions
            ]);
    }

    public function resultGet(Request $request)
    {
        $grades = Grade::all();
        $level = $request->input('level');
        $semester = $request->input('semester');
        $session = $request->input('session');

        $request->flash();

        $result = Result::where([
                ['id_level', '=', $level],
                ['id_semester', '=', $semester],
                ['id_session', '=', $session],
                ['id_user', '=', Auth::id()]
            ])
        ->get();
        return view('student.resultSheet')->with([
                'result' => $result
            ]);
    }
}
