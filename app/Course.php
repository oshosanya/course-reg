<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public static function distinctCourse($level, $semester, $session, $department)
    {
    	$courses = Result::where([
                ['id_level', '=', $level],
                ['id_semester', '=', $semester],
                ['id_session', '=', $session],
                ['id_department', '=', $department]
            ])
    	->select('id_registerable_course')
    	->distinct()
        ->get();
        //dd($courses);
        $courseNames = [];
        foreach($courses as $c)
        {
        	$courseName = \App\RegisterableCourse::find($c->id_registerable_course)->course_code;
        	$courseNames[] = $courseName;
        }
        return $courseNames;    	
    }

    public static function distinctCourseId($level, $semester, $session, $department)
    {
        $courses = Result::where([
                ['id_level', '=', $level],
                ['id_semester', '=', $semester],
                ['id_session', '=', $session],
                ['id_department', '=', $department]
            ])
        ->select('id_registerable_course')
        ->distinct()
        ->get();
        //dd($courses);
        // $courseNames = [];
        // foreach($courses as $c)
        // {
        //     $courseName = \App\RegisterableCourse::find($c->id_registerable_course)->course_code;
        //     $courseNames[] = $courseName;
        // }
        return $courses;        
    }

    public static function distinctRegisteredCourseId($level, $semester, $session)
    {
    	$courses = Result::where([
                ['id_level', '=', $level],
                ['id_semester', '=', $semester],
                ['id_session', '=', $session],
            ])
    	->select('id_registered_course')
    	->distinct()
        ->get();
        $courseIds = [];
        foreach($courses as $c)
        {
        	$courseId = $c->id_registered_course;
        	$courseIds[] = $courseId;
        }
        return $courseIds; 
    }
}
