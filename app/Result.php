<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Result extends Model
{

    public static function studentScore($s, $c, $level, $semester, $session)
    {
        //dd($c);
        DB::enableQueryLog();
    	$ca = @self::where([
    			['id_user', '=', $s],
    			['id_registerable_course', '=', $c->id_registerable_course],
    			['id_level', '=', $level],
    			['id_semester', '=', $semester],
    			['id_session', '=', $session]
    		])
        ->first()->ca;
        //dd(DB::getQueryLog());
    	$exam = @self::where([
    			['id_user', '=', $s],
    			['id_registerable_course', '=', $c->id_registerable_course],
    			['id_level', '=', $level],
    			['id_semester', '=', $semester],
    			['id_session', '=', $session]
    		])
        ->first()->exam;
    	$totalScore = @$ca+$exam;
    	return $totalScore;
    }
}
