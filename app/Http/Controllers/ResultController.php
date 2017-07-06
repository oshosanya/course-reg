<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Result;
use App\Student;

class ResultController extends Controller
{
    public function result(Request $request)
    {
    	$level = $request->input('level');
        $semester = $request->input('semester');
        $session = $request->input('session');
        $user = $request->input('student');
        $student = Student::where('id_user', '=', $user)->first();

        $request->flash();

        $result = Result::where([
                ['id_level', '=', $level],
                ['id_semester', '=', $semester],
                ['id_session', '=', $session],
                ['id_user', '=', $user]
            ])
        ->get();
        return view('student.resultPrint')->with([
                'result' => $result,
                'student' => $student
            ]);
    }
}
