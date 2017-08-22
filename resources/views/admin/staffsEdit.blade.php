@extends('admin.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Create Staff Account</div>
				<div class="panel-body">
			    	<form method="post" action="">
			    		{{ csrf_field() }}
			    		<div class="row">
				    		<div class="col-sm-4">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="text" class="form-control" name="staffLastName" placeholder="Surname" aria-describedby="sizing-addon1" value="{{ \App\Staff::where('id_user', '=', $user->id)->first()->last_name }}" required="required">
								</div>
							</div>
							<div class="col-sm-4">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="text" class="form-control" name="staffFirstName" placeholder="First Name" aria-describedby="sizing-addon1" value="{{ \App\Staff::where('id_user', '=', $user->id)->first()->first_name }}"required="required">
								</div>
							</div>
							<div class="col-sm-4">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="text" class="form-control" name="staffOtherName" placeholder="Other Name" aria-describedby="sizing-addon1" value="{{ \App\Staff::where('id_user', '=', $user->id)->first()->other_name }}" required="required">
								</div>
							</div>
						</div>
						<div class="row">
				    		<div class="col-sm-6">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="email" class="form-control" name="staffEmail" placeholder="staff@college.com" aria-describedby="sizing-addon1" value="{{ $user->email }}" required="required">
								</div>
							</div>
							<div class="col-sm-6">
					    		<select class="form-control" required="required" name="staffDepartment">
					    			<option value="">DEPARTMENT</option>
					    			@foreach($departments as $d)
					    			<option value="{{ $d->id }}" @if($d->id==\App\Staff::where('id_user', '=', $user->id)->first()->id_department)selected="selected"@endif>{{ $d->name }}</option>
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