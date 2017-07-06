@extends('student.layouts.layout-empty')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-4 col-offset-md-8 col-xs-offset-8">
				<img src="{{ $student->passport_url }}" id="image" style="width: 100%">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-3 col-md-4">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th>CGPA</th>
							<td>{{ \App\Cgpa::getCgpa($result) }}</td>
						</tr>		
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Course</th>
						<th>Course Code</th>
						<th>Grade</th>
					</tr>
				</thead>
				<tbody>
					@foreach($result as $r)
					<tr>
						<td>{{ \App\Course::find(\App\RegisterableCourse::find(\App\RegisteredCourse::find($r->id_registered_course)->id_registerable_course)->id_course)->name }}</td>
						<td>{{ \App\Course::find(\App\RegisterableCourse::find(\App\RegisteredCourse::find($r->id_registered_course)->id_registerable_course)->id_course)->code }}</td>
						<td>{{ \App\Grade::getGrade($r->ca+$r->exam) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection