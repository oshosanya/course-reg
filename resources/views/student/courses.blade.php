@extends('student.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<table class="table">
			<thead>
				<th>COURSE</th>
				<th>DEPARTMENT</th>
				<th>LEVEL</th>
				<th>SEMESTER</th>
				<th>SESSION</th>
			</thead>
			<tbody>
				@foreach($courses as $c)
				<tr>
					<td>{{ \App\Course::find(\App\RegisterableCourse::find($c->id_registerable_course)->id_course)->name }}</td>
					<td>{{ \App\Department::find(\App\RegisterableCourse::find($c->id_registerable_course)->id_department)->name }}</td>
					<td>{{ \App\Level::find(\App\RegisterableCourse::find($c->id_registerable_course)->id_department)->name }}</td>
					<td>{{ \App\Semester::find($c->id_semester)->name }}</td>
					<td>{{ \App\Session::find($c->id_session)->name }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection