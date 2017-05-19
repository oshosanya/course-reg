@extends('admin.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Create Staff Account</div>
				<div class="panel-body">
			    	<form method="post" action="/admin/userAccounts/staff/create">
			    		{{ csrf_field() }}
			    		<div class="row">
				    		<div class="col-sm-4">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="text" class="form-control" name="staffLastName" placeholder="Surname" aria-describedby="sizing-addon1" required="required">
								</div>
							</div>
							<div class="col-sm-4">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="text" class="form-control" name="staffFirstName" placeholder="First Name" aria-describedby="sizing-addon1" required="required">
								</div>
							</div>
							<div class="col-sm-4">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="text" class="form-control" name="staffOtherName" placeholder="Other Name" aria-describedby="sizing-addon1" required="required">
								</div>
							</div>
						</div>
						<div class="row">
				    		<div class="col-sm-6">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="email" class="form-control" name="staffEmail" placeholder="staff@college.com" aria-describedby="sizing-addon1" required="required">
								</div>
							</div>
							<div class="col-sm-6">
					    		<select class="form-control" required="required" name="staffDepartment">
					    			<option value="">DEPARTMENT</option>
					    			@foreach($departments as $d)
					    			<option value="{{ $d->id }}">{{ $d->name }}</option>
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
						<th>Staff Name</th>
						<th>Department</th>
						<th>Updated At</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $u)
					<tr>
						<td>{{ \App\Staff::where('id_user', '=', $u->id)->first()->id }}</td>
						<td>{{ \App\Staff::where('id_user', '=', $u->id)->first()->last_name }} {{ \App\Staff::where('id_user', '=', $u->id)->first()->first_name }} {{ \App\Staff::where('id_user', '=', $u->id)->first()->other_name }}</td>
						<td>{{ \App\Department::find(\App\Staff::where('id_user', '=', $u->id)->first()->id_department)->name }}</td>
						<td>{{ $u->updated_at }}</td>
						<td><a href="/admin/userAccounts/staff/edit/{{ $u->id }}">Edit</a>|<a href="/admin/userAccounts/staff/delete/{{ $u->id }}" class="deleteBtn">Delete</a></td>
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
		var r = confirm("Are you sure you want to delete this staff");
		console.log(r)
		if (r == true) {
		    location.href = target.attr('href');
		} else {
			return false;
		}
	})
</script>
@endsection