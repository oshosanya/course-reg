<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cgpa extends Model
{
    public static function getCgpa($result)
    {
    	$cgpas = self::all();
    	$tqp = 0;
    	$tcu = 0;
    	$totalScore = 0;
    	foreach($result as $r)
    	{
    		$course_unit = \App\Unit::find(\App\RegisterableCourse::find(\App\RegisteredCourse::find($r->id_registered_course)->id_registerable_course)->id_unit)->value;
    		$tcu+=$course_unit;
    		$grades = \App\Grade::all();
    		$score = $r->ca+$r->exam;
	    	foreach($grades as $g)
	    	{
	    		if($score<=$g->upper_limit&&$score>=$g->lower_limit)
	    		{
	    			$tqp+= ($g->point*$course_unit);
	    			break;
	    		}
	    	}
    	}
    	$cgpa = $tqp/$tcu;
        return $cgpa;
    	// foreach($cgpas as $c)
    	// {
    	// 	if($cgpa<=$c->upper_limit&&$cgpa>=$c->lower_limit)
    	// 	{
    	// 		return $c->name;
    	// 	}
    	// }
    	// return "UNDEFINED";
    }

    public static function getCgpaGrade($result)
    {
        $cgpas = self::all();
        $tqp = 0;
        $tcu = 0;
        $totalScore = 0;
        foreach($result as $r)
        {
            $course_unit = \App\Unit::find(\App\RegisterableCourse::find(\App\RegisteredCourse::find($r->id_registered_course)->id_registerable_course)->id_unit)->value;
            $tcu+=$course_unit;
            $grades = \App\Grade::all();
            $score = $r->ca+$r->exam;
            foreach($grades as $g)
            {
                if($score<=$g->upper_limit&&$score>=$g->lower_limit)
                {
                    $tqp+= ($g->point*$course_unit);
                    break;
                }
            }
        }
        $cgpa = $tqp/$tcu;
        foreach($cgpas as $c)
        {
            if($cgpa<=$c->upper_limit&&$cgpa>=$c->lower_limit)
            {
                return $c->name;
            }
        }
        return "UNDEFINED";
    }
}
