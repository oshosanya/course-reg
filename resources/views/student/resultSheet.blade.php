@extends('student.layouts.layout')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th>COURSE NAME</th>
						<th>COURSE CODE</th>
						<th>UNITS</th>
						<th>GRADE</th>
					</thead>
					<tbody>
						@foreach($result as $r)
						<tr>
							<td>{{ \App\Course::find(\App\RegisterableCourse::find(\App\RegisteredCourse::find($r->id_registered_course)->id_registerable_course)->id_course)->name }}</td>
							<td>{{ \App\Course::find(\App\RegisterableCourse::find(\App\RegisteredCourse::find($r->id_registered_course)->id_registerable_course)->id_course)->code }}</td>
							<td>{{ \App\Unit::find(\App\RegisterableCourse::find(\App\RegisteredCourse::find($r->id_registered_course)->id_registerable_course)->id_unit)->value }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<a href="javascript:;" onclick="popitup('/result?student={{ Auth::id() }}&semester={{ old('semester') }}&level={{ old('level') }}&session={{ old('session') }}')" class="btn btn-primary">Print Result</a>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function popitup(a)
	    {
	        window.open(a,
	        'open_window',
	        'menubar=no, toolbar=no, location=no, directories=no, status=no, scrollbars=no, resizable=no, dependent, width=800, height=620, left=0, top=0')
	    }
	</script>
@endsection