<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Course;
use App\RegisterableCourse;
use App\RegisteredCourse;
use App\Result;
use App\Setting;
use App\Staff;
use App\Student;
use App\User;

class StaffController extends Controller
{
	public function __construct()
	{
		$this->currentSession = Setting::where('parameter', '=', 'current_session')->first()->value;
		$this->currentSemester = Setting::where('parameter', '=', 'current_semester')->first()->value;
	}

    public function dashboard()
    {
        $courses = RegisterableCourse::where('id_user', '=', Auth::id())->get();
    	return view('staff.dashboard')->with([
                'courses' => $courses
            ]);
    }

    public function doLogin(Request $request)
    {
    	if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->intended('staff/dashboard');
        } 
        else
        {
            return redirect('/staff')->with('warning', 'Login credentials incorrect');
        }
    }

    public function account()
    {
        $user = User::find(Auth::id());
        $staff = Staff::where('id_user', '=', Auth::id())->first();
        return view('staff.account')->with([
                'user' => $user,
                'staff' => $staff
            ]);
    }

    public function courses()
    {
    	$courses = RegisterableCourse::where([
    		['id_user', '=', Auth::id()],
    		['id_session', '=', $this->currentSession],
    		['id_semester', '=', $this->currentSemester]
    		])->get();
    	return view('staff.courses')->with([
    			'courses' => $courses
    		]);
    }

    public function results(Request $request)
    {
    	// $studentsForCourse = RegisteredCourse::where([
    	// 	['registered_courses.id_registerable_course', '=', $request->input('course')],
    	// 	['registered_courses.id_level', '=', $request->input('level')],
    	// 	['registered_courses.id_semester', '=', $this->currentSemester],
    	// 	['registered_courses.id_session', '=', $this->currentSession]
    	// 	])
    	// ->get();
    	// DB::enableQueryLog();
        $this->request = $request;
    	$studentsForCourse = DB::table('students')
    	->leftJoin('results', function ($join) {
            $join->on('students.id_user', '=', 'results.id_user')
                ->where([
                		['results.id_semester', '=', $this->currentSemester],
	    				['results.id_session', '=', $this->currentSession],
                        ['results.id_registerable_course', '=', $this->request->input('course')]
                 	]);
        })
    	->where([
    			['students.id_level', '=', $request->input('level')],
    		])
    	->select('students.*', 'results.ca', 'results.exam')
    	->get();
    	// dd(DB::getQueryLog());
    	// $users = DB::table('users')
     //        ->join('contacts', 'users.id', '=', 'contacts.user_id')
     //        ->join('orders', 'users.id', '=', 'orders.user_id')
     //        ->select('users.*', 'contacts.phone', 'orders.price')
     //        ->get();
    	//return response()->json($studentsForCourse);
    	return view('staff.results')->with([
    			'students' => $studentsForCourse
    		]);
    }

    public function storeResults(Request $request)
    {
    	$course = $request->input('course');
    	$level = $request->input('level');
    	$studentId = $request->input('studentId');
    	$ca = $request->input('ca');
    	$exam = $request->input('exam');
    	foreach ($studentId as $key => $value) {
    		$result = Result::where([
    				['id_user', '=', $value],
    				['id_registered_course', '=', RegisteredCourse::where([
    						['id_registerable_course', '=', $course],
    						['id_user', '=', $value],
    						['id_level', '=', $level],
		    				['id_semester', '=', $this->currentSemester],
		    				['id_session', '=', $this->currentSession]
    					])->first()->id],
    				['id_level', '=', $level],
    				['id_semester', '=', $this->currentSemester],
    				['id_session', '=', $this->currentSession]
    			]);
            $department = Student::where('id_user', '=', $value)->first()->id_department;
    		if($result->count()>0)
    		{
    			$update = Result::find($result->first()->id);
    			$update->ca = $ca[$key];
    			$update->exam = $exam[$key];
    			$update->save();
    		}
    		else
    		{
    			$newResult = new Result;
    			$newResult->id_user = $value;
    			$newResult->id_registered_course = RegisteredCourse::where([
    						['id_registerable_course', '=', $course],
    						['id_user', '=', $value],
    						['id_level', '=', $level],
		    				['id_semester', '=', $this->currentSemester],
		    				['id_session', '=', $this->currentSession]
    					])->first()->id;
                $newResult->id_registerable_course = $course;
    			$newResult->ca = $ca[$key];
    			$newResult->exam = $exam[$key];
    			$newResult->id_session = $this->currentSession;
    			$newResult->id_semester = $this->currentSemester;
    			$newResult->id_level = $level;
                $newResult->id_department = $department;
    			$newResult->save();
    		}
    	}
    	return back()->with([
    		'success' => 'Scores updated'
    		]);
    	
    }
}
