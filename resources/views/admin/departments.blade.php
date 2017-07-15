@extends('admin.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Create Department</div>
				<div class="panel-body">
			    	<form method="post" action="/admin/departments/create">
			    		{{ csrf_field() }}
			    		<div class="row">
			    			<div class="col-sm-8">
					    		<div class="input-group input-group-sm col-sm-8">	
								  	<input type="text" class="form-control" name="departmentName" placeholder="Department Name" aria-describedby="sizing-addon1">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-8">
					    		<div class="input-group input-group-sm col-sm-8">	
					    			<select class="form-control" name="facultyId">
					    				<option value="">FACULTY</option>
					    				@foreach($faculties as $f)
					    				<option value="{{ $f->id }}">{{ $f->name }}</option>
					    				@endforeach
					    			</select>
					    		</div>
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
		<div class="col-sm-8">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>ID</td>
						<td>Departments</td>
						<td>Faculty</td>
						<td>Course Adviser</td>
						<td>Updated At</td>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($departments as $d)
					<tr>
						<td>{{ $d->id }}</td>
						<td>{{ $d->name }}</td>
						<td>{{ \App\Faculty::find($d->id_faculty)->name }}</td>
						<td>{{ \App\Staff::where('id_user', '=', $d->id_user_adviser)->first()->first_name }} {{ \App\Staff::where('id_user', '=', $d->id_user_adviser)->first()->other_name }} {{ \App\Staff::where('id_user', '=', $d->id_user_adviser)->first()->last_name }}</td>
						<td>{{ $d->updated_at }}</td>
						<td><a href="/admin/departments/edit/{{ $d->id }}">Edit</a>|<a href="/admin/departments/delete/{{ $d->id }}" class="deleteBtn">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.deleteBtn').on('click', function(event)
	{
		var target = $(this);
		event.preventDefault();
		var r = confirm("Are you sure you want to delete this department?");
		console.log(r)
		if (r == true) {
		    location.href = target.attr('href');
		} else {
			return false;
		}
	})
</script>
@endsection