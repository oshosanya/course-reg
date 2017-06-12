<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

use Auth;
use Hash;

use \App\Course;
use \App\Department;
use \App\Faculty;
use \App\Level;
use \App\Semester;
use \App\RegisterableCourse;
use \App\Session;
use \App\Setting;
use \App\Staff;
use \App\Student;
use \App\Unit;
use \App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->currentSession = Setting::where('parameter', '=', 'current_session')->first()->value;
    }

    public function doLogin(Request $request)
    {
    	if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->intended('admin/dashboard');
        }
        else
        {
            return redirect('/admin')->with('warning', 'Login credentials incorrect');
        }
    }

    public function dashboard()
    {
    	return view('admin.dashboard');
    }

    public function faculties()
    {
    	$faculties = Faculty::all();
    	return view('admin.faculties')->with([
    			'faculties' => $faculties
    		]);
    }

    public function facultiesCreate(Request $request)
    {
    	$this->validate($request, [
	        'facultyName' => 'required|unique:faculties,name|max:255',
	    ]);
    	$faculty = new Faculty;
    	$faculty->name = $request->input('facultyName');
    	$faculty->save();
    	return redirect('admin/faculties')->with([
    			'success' => 'Faculty added successfully'
    		]);
    }

    public function facultiesDelete($id)
    {
    	$faculty = Faculty::find($id);
    	$faculty->delete();
    	return redirect('admin/faculties')->with([
    			'success' => 'Faculty deleted successfully'
    		]);
    }

    public function facultiesEdit($id)
    {
    	$faculty = Faculty::find($id);
    	return view('admin.facultiesEdit')->with([
    			'faculty' => $faculty
    		]);
    }

    public function facultiesUpdate(Request $request, $id)
    {
    	$this->validate($request, [
	        'facultyName' => 'required|max:255',
	    ]);
    	$faculty = Faculty::find($id);
    	$faculty->name = $request->input('facultyName');
    	$faculty->save();
    	return redirect('admin/faculties')->with([
    			'success' => 'Faculty updated successfully'
    		]);
    }

    public function departments()
    {
    	$departments = Department::all();
    	$faculties = Faculty::all();
    	return view('admin.departments')->with([
    			'departments' => $departments,
    			'faculties' => $faculties
    		]);
    }

    public function departmentsCreate(Request $request)
    {
    	$this->validate($request, [
	        'departmentName' => 'required|unique:departments,name|max:255',
	        'facultyId' => 'required',
	    ]);
    	$department = new Department;
    	$department->name = $request->input('departmentName');
    	$department->id_faculty = $request->input('facultyId');
    	$department->save();
    	return redirect('admin/departments')->with([
    			'success' => 'Department added successfully'
    		]);
    }

    public function departmentsDelete($id)
    {
    	$department = Department::find($id);
    	$department->delete();
    	return redirect('admin/departments')->with([
    			'success' => 'Department deleted successfully'
    		]);
    }

    public function departmentsEdit($id)
    {
    	$department = Department::find($id);
    	$faculties = Faculty::all();
    	return view('admin.departmentsEdit')->with([
    			'faculties' => $faculties,
    			'department' => $department
    		]);
    }

    public function departmentsUpdate(Request $request, $id)
    {
    	$this->validate($request, [
	        'departmentName' => 'required|max:255',
	        'facultyId' => 'required',
	    ]);
    	$department = Department::find($id);
    	$department->name = $request->input('departmentName');
    	$department->id_faculty = $request->input('facultyId');
    	$department->save();
    	return redirect('admin/departments')->with([
    			'success' => 'Department updated successfully'
    		]);
    }

    public function levels()
    {
        $levels = Level::all();
        return view('admin.levels')->with([
                'levels' => $levels
            ]);
    }

    public function levelsCreate(Request $request)
    {
        $this->validate($request, [
            'levelName' => 'required|unique:levels,name|max:255',
        ]);
        $level = new Level;
        $level->name = $request->input('levelName');
        $level->save();
        return redirect('admin/levels')->with([
                'success' => 'Level added successfully'
            ]);
    }

    public function levelsDelete($id)
    {
        $level = Level::find($id);
        $level->delete();
        return redirect('admin/levels')->with([
                'success' => 'level deleted successfully'
            ]);
    }

    public function levelsEdit($id)
    {
        $level = Level::find($id);
        return view('admin.levelsEdit')->with([
                'level' => $level
            ]);
    }

    public function levelsUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'levelName' => 'required|max:255',
        ]);
        $level = Level::find($id);
        $level->name = $request->input('levelName');
        $level->save();
        return redirect('admin/levels')->with([
                'success' => 'Level updated successfully'
            ]);
    }

    public function courses()
    {
        $courses = Course::all();
        return view('admin.courses')->with([
                'courses' => $courses
            ]);
    }

    public function coursesCreate(Request $request)
    {
        $this->validate($request, [
            'courseName' => 'required|unique:courses,name|max:255',
            'courseCode' => 'required|unique:courses,name|max:255',
        ]);
        $course = new Course;
        $course->name = $request->input('courseName');
        $course->code = $request->input('courseCode');
        $course->save();
        return redirect('admin/courses')->with([
                'success' => 'Course added successfully'
            ]);
    }

    public function coursesDelete($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect('admin/courses')->with([
                'success' => 'course deleted successfully'
            ]);
    }

    public function coursesEdit($id)
    {
        $course = Course::find($id);
        return view('admin.coursesEdit')->with([
                'course' => $course
            ]);
    }

    public function coursesUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'courseName' => 'required|max:255',
            'courseCode' => 'required|max:255',
        ]);
        $course = Course::find($id);
        $course->name = $request->input('courseName');
        $course->code = $request->input('courseCode');
        $course->save();
        return redirect('admin/courses')->with([
                'success' => 'Course updated successfully'
            ]);
    }

    public function semesters()
    {
        $semesters = Semester::all();
        return view('admin.semesters')->with([
                'semesters' => $semesters
            ]);
    }

    public function semestersCreate(Request $request)
    {
        $this->validate($request, [
            'semesterName' => 'required|unique:semesters,name|max:255',
        ]);
        $semester = new Semester;
        $semester->name = $request->input('semesterName');
        $semester->save();
        return redirect('admin/semesters')->with([
                'success' => 'Semester added successfully'
            ]);
    }

    public function semestersDelete($id)
    {
        $semester = Semester::find($id);
        $semester->delete();
        return redirect('admin/semesters')->with([
                'success' => 'semester deleted successfully'
            ]);
    }

    public function semestersEdit($id)
    {
        $semester = Semester::find($id);
        return view('admin.semestersEdit')->with([
                'semester' => $semester
            ]);
    }

    public function semestersUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'semesterName' => 'required|max:255',
        ]);
        $semester = Semester::find($id);
        $semester->name = $request->input('semesterName');
        $semester->save();
        return redirect('admin/semesters')->with([
                'success' => 'Semester updated successfully'
            ]);
    }

    public function units()
    {
        $units = Unit::all();
        return view('admin.units')->with([
                'units' => $units
            ]);
    }

    public function unitsCreate(Request $request)
    {
        $this->validate($request, [
            'unitValue' => 'required|unique:units,value|max:255',
        ]);
        $unit = new Unit;
        $unit->value = $request->input('unitValue');
        $unit->save();
        return redirect('admin/units')->with([
                'success' => 'Course Unit added successfully'
            ]);
    }

    public function unitsDelete($id)
    {
        $unit = Unit::find($id);
        $unit->delete();
        return redirect('admin/units')->with([
                'success' => 'Course Unit deleted successfully'
            ]);
    }

    public function unitsEdit($id)
    {
        $unit = Unit::find($id);
        return view('admin.unitsEdit')->with([
                'unit' => $unit
            ]);
    }

    public function unitsUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'unitValue' => 'required|max:255',
        ]);
        $unit = Unit::find($id);
        $unit->value = $request->input('unitValue');
        $unit->save();
        return redirect('admin/units')->with([
                'success' => 'Course Unit updated successfully'
            ]);
    }

    public function registerableCourses()
    {
        $courses = Course::all();
        $departments = Department::all();
        $levels = Level::all();
        $registerableCourses = RegisterableCourse::paginate(20);
        $semesters = Semester::all();
        $units = Unit::all();
        $sessions = Session::all();
        return view('admin.registerableCourses')->with([
                'courses' => $courses,
                'departments' => $departments,
                'levels' => $levels,
                'registerableCourses' => $registerableCourses,
                'semesters' => $semesters,
                'units' => $units,
                'sessions' => $sessions,
            ]);
    }

    public function registerableCoursesCreate(Request $request)
    {
        $this->validate($request, [
            'courseId' => 'required|max:4',
            'departmentId' => 'required|max:4',
            'semesterId' => 'required|max:4',
            'levelId' => 'required|max:4',
            'unitId' => 'required|max:4',
            'sessionId' => 'required|max:4'
        ]);
        $r = new RegisterableCourse;
        $r->id_course = $request->input('courseId');
        $r->id_department = $request->input('departmentId');
        $r->id_semester = $request->input('semesterId');
        $r->id_level = $request->input('levelId');
        $r->id_unit = $request->input('unitId');
        $r->id_session = $request->input('sessionId');
        $r->save();
        return redirect('admin/registerableCourses')->with([
                'success' => 'Course added successfully'
            ]);
    }

    public function registerableCoursesAssign($id)
    {
        $registerableCourse = RegisterableCourse::find($id);
        $users = User::where('role', '=', 3)->get();
        return view('admin.registerableCoursesAssign')->with([
                'registerableCourse' => $registerableCourse,
                'users' => $users
            ]);
    }

    public function registerableCoursesAssigned(Request $request, $id)
    {
        $registerableCourse = RegisterableCourse::find($id);
        $registerableCourse->id_user = $request->input('staffId');
        $registerableCourse->save();
        return redirect('admin/registerableCourses')->with([
                'success' => 'Course assigned to '.Staff::where('id_user', '=', $request->input('staffId'))->first()->last_name
            ]);
    }

    public function userAccountsStudent()
    {
        $levels = Level::all();
        $users = User::where('role', '=', '2')->paginate(30);
        $departments = Department::all();
        return view('admin.students')->with([
                'departments' => $departments,
                'levels' => $levels,
                'users' => $users 
            ]);
    }

    public function userAccountsStudentCreate(Request $request)
    {
        $this->validate($request, [
            'studentLastName' => 'required|max:32',
            'studentFirstName' => 'required|max:32',
            'studentOtherName' => 'required|max:32',
            'studentEmail' => 'required|email|unique:users,email|max:64',
            'studentMatricNo' => 'required|max:16',
            'studentDepartment' => 'required',
            'studentLevel' => 'required'
        ]);

        $user = new User;
        $user->email = $request->input('studentEmail');
        $user->username = $request->input('studentMatricNo');
        $user->password = Hash::make($request->input('studentLastName'));
        $user->role = 2;
        $user->save();

        $student = new Student;
        $student->last_name = $request->input('studentLastName');
        $student->first_name = $request->input('studentFirstName');
        $student->other_name = $request->input('studentOtherName');
        $student->id_user = $user->id;
        $student->matric_no = $request->input('studentMatricNo');
        $student->id_department = $request->input('studentDepartment');
        $student->id_level = $request->input('studentLevel');
        $student->save();

        return redirect('/admin/userAccounts/student')->with([
                'success' => 'Student Account created successfully'
            ]);
    }

    public function userAccountsStudentEdit($id)
    {
        $levels = Level::all();
        $user = User::find($id);
        $departments = Department::all();
        return view('admin.studentsEdit')->with([
                'departments' => $departments,
                'levels' => $levels,
                'user' => $user 
            ]);
    }

    public function userAccountsStudentUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'studentLastName' => 'required|max:32',
            'studentFirstName' => 'required|max:32',
            'studentOtherName' => 'required|max:32',
            'studentEmail' => 'required|email|max:64',
            'studentMatricNo' => 'required|max:16',
            'studentDepartment' => 'required',
            'studentLevel' => 'required'
        ]);

        $user = User::find($id);
        $user->email = $request->input('studentEmail');
        $user->username = $request->input('studentMatricNo');
        $user->password = Hash::make($request->input('studentLastName'));
        $user->role = 2;
        $user->save();

        $student = Student::where('id_user', '=', $id)->first();
        $student->last_name = $request->input('studentLastName');
        $student->first_name = $request->input('studentFirstName');
        $student->other_name = $request->input('studentOtherName');
        $student->id_user = $user->id;
        $student->matric_no = $request->input('studentMatricNo');
        $student->id_department = $request->input('studentDepartment');
        $student->id_level = $request->input('studentLevel');
        $student->save();

        return redirect('/admin/userAccounts/student')->with([
                'success' => 'Student Account edited successfully'
            ]);
    }

    public function userAccountsStaff()
    {
        $levels = Level::all();
        $users = User::where('role', '=', '3')->paginate(30);
        $departments = Department::all();
        return view('admin.staffs')->with([
                'departments' => $departments,
                'levels' => $levels,
                'users' => $users 
            ]);
    }

    public function userAccountsStaffCreate(Request $request)
    {
        $this->validate($request, [
            'staffLastName' => 'required|max:32',
            'staffFirstName' => 'required|max:32',
            'staffOtherName' => 'required|max:32',
            'staffEmail' => 'required|email|unique:users,email|max:64',
            'staffDepartment' => 'required',
        ]);

        $user = new User;
        $user->email = $request->input('staffEmail');
        $user->username = strtolower($request->input('staffLastName').$request->input('staffFirstName'));
        $user->password = Hash::make($request->input('staffLastName'));
        $user->role = 3;
        $user->save();

        $staff = new Staff;
        $staff->last_name = $request->input('staffLastName');
        $staff->first_name = $request->input('staffFirstName');
        $staff->other_name = $request->input('staffOtherName');
        $staff->id_user = $user->id;
        $staff->id_department = $request->input('staffDepartment');
        $staff->save();

        return redirect('/admin/userAccounts/staff')->with([
                'success' => 'Staff Account created successfully'
            ]);
    }
}
