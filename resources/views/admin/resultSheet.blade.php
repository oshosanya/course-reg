@extends('admin.layouts.layout-empty')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-4 col-xs-offset-4">
			<h3 class="text-center">RESULT SHEET</h3>
			<br>
			<h4 class="text-center">{{ \App\Department::find($department)->name }}</h4>
			<p class="text-center">{{ \App\Level::find($level)->name }} {{ \App\Semester::find($semester)->name }} {{ \App\Session::find($session)->name }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-4">
			<table class="table table-bordered">
				<tbody>
					<tr><td>NAMES</td></tr>
					@foreach(\App\Student::distinctStudent($level, $semester, $session, $department) as $s)
					<tr>
						<td>{{ $s }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-xs-8">
			<table class="table table-bordered">
				<tbody>
					<tr>
						@foreach(\App\Course::distinctCourse($level, $semester, $session, $department) as $s)
						<td>{{ $s }}</td>
						@endforeach
						<td>CGPA</td>
					</tr>
					@foreach(\App\Student::distinctStudentId($level, $semester, $session, $department) as $key=>$s)
					<tr>
						@foreach(\App\Course::distinctCourseId($level, $semester, $session, $department) as $c)
						<td>{{ \App\Result::studentScore($s, $c, $level, $semester, $session) }}</td>
						@endforeach
						<td>{{ \App\Cgpa::getCgpa($result = \App\Result::where([
				                ['id_level', '=', $level],
				                ['id_semester', '=', $semester],
				                ['id_session', '=', $session],
				                ['id_user', '=', $s]
				            ])
				        ->get()) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection