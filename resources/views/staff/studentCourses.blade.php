@extends('staff.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="post" action="">
			 	{{ csrf_field() }}
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th></th>
							<th>Course</th>
							<th>Course Code</th>
						</tr>
					</thead>
					<tbody>
						@foreach($studentCourses as $s)
						
							<tr>
								<td><input type="checkbox" name="registeredCourseId[]" value="{{ $s->id }}" @if($s->approved) checked @endif></td>
								<td>{{ \App\Course::find(\App\RegisterableCourse::find(\App\RegisteredCourse::find($s->id)->id_registerable_course)->id_course)->name }}</td>
								<td>{{ \App\RegisterableCourse::find(\App\RegisteredCourse::find($s->id)->id_registerable_course)->course_code }}</td>
							</tr>
						@endforeach	
					</tbody>
					<tfoot>
						<tr>
							<td><button class="btn btn-primary">Submit</button></td>
						</tr>
					</tfoot>
				</table>
			</form>
		</div>
	</div>
</div>
@endsection