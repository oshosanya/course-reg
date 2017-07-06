<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public static function getGrade($score)
    {
    	$grades = self::all();
    	foreach($grades as $g)
    	{
    		if($score<=$g->upper_limit&&$score>=$g->lower_limit)
    		{
    			return $g->grade_letter;
    		}
    	}
    }
}
