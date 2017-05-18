<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use \App\Course;
use \App\Department;
use \App\Faculty;
use \App\Level;
use \App\Semester;

class AdminController extends Controller
{
    public function doLogin(Request $request)
    {
    	if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->intended('admin/dashboard');
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

    public function registerableCourses()
    {
        $courses = Course::all();
        $departments = Department::all();
        $levels = Level::all();
        $registerableCourses = RegisterableCourse::all()->paginate(20);
        $semesters = Semester::all();
        return view('admin.registerableCourses')->with([
                'courses' => $courses,
                'departments' => $departments,
                'levels' => $levels,
                'registerableCourses' => $registerableCourses,
                'semesters' => $semesters
            ]);
    }
}
