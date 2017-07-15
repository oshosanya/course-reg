<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    public static function distinctStudent($level, $semester, $session, $department)
    {
	    $student = Result::where([
	                ['id_level', '=', $level],
	                ['id_semester', '=', $semester],
	                ['id_session', '=', $session],
	                ['id_department', '=', $department]
	            ])
	    ->select('id_user')
		->distinct()
	    ->get();
	    $studentNames = [];
	    foreach($student as $s)
	    {
	    	$studentName = self::where('id_user', '=', $s->id_user)->first()->last_name." ".self::where('id_user', '=', $s->id_user)->first()->first_name." ".self::where('id_user', '=', $s->id_user)->first()->other_name;
	    	$studentNames[] = $studentName;
	    }
	    return $studentNames;
	}

	public static function distinctStudentId($level, $semester, $session, $department)
    {
	    $student = Result::where([
	                ['id_level', '=', $level],
	                ['id_semester', '=', $semester],
	                ['id_session', '=', $session],
	                ['id_department', '=', $department]
	            ])
	    ->select('id_user')
		->distinct()
	    ->get();
	    $studentIds = [];
	    foreach($student as $s)
	    {
	    	$studentId = $s->id_user;
	    	$studentIds[] = $studentId;
	    }
	    return $studentIds;
	}

	public static function score($s, $c, $level, $semester, $session)
    {
    	$result = Result::where([
    			['id_user', '=', $s],
    			['id_registered_course', '=', $c],
    			['id_level', '=', $level],
    			['id_semester', '=', $semester],
    			['id_session', '=', $session]
    		])->first();
    	//die(var_dump($result));
    	$totalScore = $result->ca;
    	return $totalScore;
    }
}
