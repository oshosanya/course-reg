@extends('student.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<form method="post" action="">
			{{ csrf_field() }}
			<table class="table">
				<thead>
					<th>Check</th>
					<th>COURSE</th>
					<th>DEPARTMENT</th>
					<th>LEVEL</th>
					<th>SEMESTER</th>
					<th>SESSION</th>
				</thead>
				<tbody>
					@foreach($courses as $c)
					<tr>
						<td><input type="checkbox" name="registerable[]" value="{{ $c->id }}" @foreach($registered_courses as $r)@if($r->id_registerable_course==$c->id)checked="checked" @break @endif @endforeach></td>
						<td>{{ \App\Course::find($c->id_course)->name }}</td>
						<td>{{ \App\Department::find($c->id_department)->name }}</td>
						<td>{{ \App\Level::find($c->id_level)->name }}</td>
						<td>{{ \App\Semester::find($c->id_semester)->name }}</td>
						<td>{{ \App\Session::find($c->id_session)->name }}</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3">
							<button class="btn btn-primary">Register Courses</button>
						</td>
					</tr>
				</tfoot>
			</table>
		</form>
	</div>
</div>
@endsection