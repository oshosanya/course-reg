<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class RegisterableCourse extends Model
{
    public static function registeredByStudent($c)
    {
    	$currentSession = Setting::where('parameter', '=', 'current_session')->first()->value;
		$currentSemester = Setting::where('parameter', '=', 'current_semester')->first()->value;
    	$count = RegisteredCourse::where([
    			['id_registerable_course', '=', $c],
    			['id_user', '=', Auth::id()],
    			['id_session', '=', $currentSession],
    			['id_semester', '=', $currentSemester]
    		])->get()->count();
    	if($count==0)
    	{
    		return false;
    	}
    	else
    	{
    		return true;
    	}
    }
}
