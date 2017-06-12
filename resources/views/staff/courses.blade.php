@extends('staff.layouts.layout')
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
				<th></th>
			</thead>
			<tbody>
				@foreach($courses as $c)
				<tr>
					<td>{{ \App\Course::find($c->id_course)->name }}</td>
					<td>{{ \App\Department::find($c->id_department)->name }}</td>
					<td>{{ \App\Level::find($c->id_level)->name }}</td>
					<td>{{ \App\Semester::find($c->id_semester)->name }}</td>
					<td>{{ \App\Session::find($c->id_session)->name }}</td>
					<td><a href="/staff/results?course={{ $c->id }}&level={{ $c->id_level }}">Enter Results</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection