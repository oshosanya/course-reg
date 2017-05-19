@extends('admin.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Create Registerable Course</div>
				<div class="panel-body">
			    	<form method="post" action="/admin/registerableCourses/create">
			    		{{ csrf_field() }}
			    		<div class="row">
				    		<div class="col-sm-8">
					    		<select class="form-control" name="courseId">
					    			<option value="">COURSE</option>
					    			@foreach($courses as $c)
					    			<option value="{{ $c->id }}">{{ $c->name }}</option>
					    			@endforeach
					    		</select>
							</div>
						</div>
						<div class="row">
				    		<div class="col-sm-8">
					    		<select class="form-control" name="departmentId">
					    			<option value="">DEPARTMENT</option>
					    			@foreach($departments as $d)
					    			<option value="{{ $d->id }}">{{ $d->name }}</option>
					    			@endforeach
					    		</select>
							</div>
						</div>
						<div class="row">
				    		<div class="col-sm-8">
					    		<select class="form-control" name="semesterId">
					    			<option value="">SEMESTER</option>
					    			@foreach($semesters as $s)
					    			<option value="{{ $s->id }}">{{ $s->name }}</option>
					    			@endforeach
					    		</select>
							</div>
						</div>
						<div class="row">
				    		<div class="col-sm-8">
					    		<select class="form-control" name="levelId">
					    			<option value="">LEVEL</option>
					    			@foreach($levels as $l)
					    			<option value="{{ $l->id }}">{{ $l->name }}</option>
					    			@endforeach
					    		</select>
							</div>
						</div>
						<div class="row">
				    		<div class="col-sm-8">
					    		<select class="form-control" name="unitId">
					    			<option value="">UNIT</option>
					    			@foreach($units as $u)
					    			<option value="{{ $u->id }}">{{ $u->value }}</option>
					    			@endforeach
					    		</select>
							</div>
						</div>
						<div class="col-sm-4">
							<button class="btn btn-success" type="submit">Submit</button>
						</div>
			    	</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Course</th>
						<th>Department</th>
						<th>Semester</th>
						<th>Level</th>
						<th>Instructor</th>
						<th>Updated At</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($registerableCourses as $r)
					<tr>
						<td>{{ $r->id }}</td>
						<td>{{ \App\Course::find($r->id_course)->name }}</td>
						<td>{{ \App\Department::find($r->id_department)->name }}</td>
						<td>{{ \App\Semester::find($r->id_semester)->name }}</td>
						<td>{{ \App\Level::find($r->id_level)->name }}</td>
						<td>{{ @\App\Staff::where('id_user', '=', $r->id_user)->first()->last_name }} {{ @\App\Staff::where('id_user', '=', $r->id_user)->first()->first_name }}</td>
						<td><a href="/admin/registerableCourses/edit/{{ $r->id }}">Edit</a>|<a href="/admin/registerableCourses/assign/{{ $r->id }}">Assign Course</a>|<a href="/admin/registerableCourses/delete/{{ $r->id }}" class="deleteBtn">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>{{ $registerableCourses->links() }}</tr>
				</tfoot>
			</table>
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