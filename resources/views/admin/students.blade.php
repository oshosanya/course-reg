@extends('admin.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Create Student Account</div>
				<div class="panel-body">
			    	<form method="post" action="/admin/userAccounts/student/create">
			    		{{ csrf_field() }}
			    		<div class="row">
				    		<div class="col-sm-4">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="text" class="form-control" name="studentLastName" placeholder="Surname" aria-describedby="sizing-addon1" required="required">
								</div>
							</div>
							<div class="col-sm-4">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="text" class="form-control" name="studentFirstName" placeholder="First Name" aria-describedby="sizing-addon1" required="required">
								</div>
							</div>
							<div class="col-sm-4">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="text" class="form-control" name="studentOtherName" placeholder="Other Name" aria-describedby="sizing-addon1" required="required">
								</div>
							</div>
						</div>
						<div class="row">
				    		<div class="col-sm-6">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="email" class="form-control" name="studentEmail" placeholder="student@college.com" aria-describedby="sizing-addon1" required="required">
								</div>
							</div>
							<div class="col-sm-6">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="text" class="form-control" name="studentMatricNo" placeholder="Matric Number" aria-describedby="sizing-addon1" required="required">
								</div>
							</div>
						</div>
						<div class="row">
				    		<div class="col-sm-6">
					    		<select class="form-control" required="required" name="studentDepartment">
					    			<option value="">DEPARTMENT</option>
					    			@foreach($departments as $d)
					    			<option value="{{ $d->id }}">{{ $d->name }}</option>
					    			@endforeach
					    		</select>
							</div>
							<div class="col-sm-6">
					    		<select class="form-control" required="required" name="studentLevel">
					    			<option value="">LEVEL</option>
					    			@foreach($levels as $l)
					    			<option value="{{ $l->id }}">{{ $l->name }}</option>
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
						<th>Student Name</th>
						<th>Matric No</th>
						<th>Department</th>
						<th>Level</th>
						<th>Updated At</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $u)
					<tr>
						<td>{{ \App\Student::where('id_user', '=', $u->id)->first()->id }}</td>
						<td>{{ \App\Student::where('id_user', '=', $u->id)->first()->last_name }} {{ \App\Student::where('id_user', '=', $u->id)->first()->first_name }} {{ \App\Student::where('id_user', '=', $u->id)->first()->other_name }}</td>
						<td>{{ \App\Student::where('id_user', '=', $u->id)->first()->matric_no }}</td>
						<td>{{ \App\Department::find(\App\Student::where('id_user', '=', $u->id)->first()->id_department)->name }}</td>
						<td>{{ \App\Level::find(\App\Student::where('id_user', '=', $u->id)->first()->id_level)->name }}</td>
						<td>{{ $u->updated_at }}</td>
						<td><a href="/admin/userAccounts/student/edit/{{ $u->id }}">Edit</a>|<a href="/admin/userAccounts/student/delete/{{ $u->id }}" class="deleteBtn">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>{{ $users->links() }}</tr>
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
		var r = confirm("Are you sure you want to delete this units?");
		console.log(r)
		if (r == true) {
		    location.href = target.attr('href');
		} else {
			return false;
		}
	})
</script>
@endsection