@extends('admin.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<form method="post">
				{{ csrf_field() }}
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Course</th>
							<th>Department</th>
							<th>Semester</th>
							<th>Level</th>
							<th>Instructor</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $registerableCourse->id }}</td>
							<td>{{ \App\Course::find($registerableCourse->id_course)->name }}</td>
							<td>{{ \App\Department::find($registerableCourse->id_department)->name }}</td>
							<td>{{ \App\Semester::find($registerableCourse->id_semester)->name }}</td>
							<td>{{ \App\Level::find($registerableCourse->id_level)->name }}</td>
							<td>
								<select name="staffId" class="form-control" required="required">
									<option value="">INSTRUCTOR</option>
									@foreach($users as $u)
									<option value="{{ $u->id }}">{{ \App\Staff::where('id_user', '=', $u->id)->first()->last_name }} {{ \App\Staff::where('id_user', '=', $u->id)->first()->first_name }}</option>
									@endforeach
								</select>
							</td>
							<td><button type="submit" class="btn btn-success">Submit</button></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.deleteBtn').on('click', function(event)
	{
		var target = $(this);
		event.preventDefault();
		var r = confirm("Are you sure you want to delete this semester?");
		console.log(r)
		if (r == true) {
		    location.href = target.attr('href');
		} else {
			return false;
		}
	})
</script>
@endsection