@extends('admin.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Edit Student Account</div>
				<div class="panel-body">
			    	<form method="post" action="">
			    		{{ csrf_field() }}
			    		<div class="row">
				    		<div class="col-sm-4">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="text" class="form-control" name="studentLastName" placeholder="Surname" aria-describedby="sizing-addon1" value="{{ \App\Student::where('id_user', '=', $user->id)->first()->last_name }}" required="required">
								</div>
							</div>
							<div class="col-sm-4">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="text" class="form-control" name="studentFirstName" placeholder="First Name" aria-describedby="sizing-addon1" value="{{ \App\Student::where('id_user', '=', $user->id)->first()->first_name }}" required="required">
								</div>
							</div>
							<div class="col-sm-4">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="text" class="form-control" name="studentOtherName" placeholder="Other Name" aria-describedby="sizing-addon1" value="{{ \App\Student::where('id_user', '=', $user->id)->first()->other_name }}" required="required">
								</div>
							</div>
						</div>
						<div class="row">
				    		<div class="col-sm-6">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="email" class="form-control" name="studentEmail" placeholder="student@college.com" aria-describedby="sizing-addon1" value="{{ $user->email }}" required="required">
								</div>
							</div>
							<div class="col-sm-6">
					    		<div class="input-group input-group-sm col-sm-12">	
								  	<input type="text" class="form-control" name="studentMatricNo" placeholder="Matric Number" aria-describedby="sizing-addon1" value="{{ \App\Student::where('id_user', '=', $user->id)->first()->matric_no }}" required="required">
								</div>
							</div>
						</div>
						<div class="row">
				    		<div class="col-sm-6">
					    		<select class="form-control" required="required" name="studentDepartment">
					    			<option value="">DEPARTMENT</option>
					    			@foreach($departments as $d)
					    			<option value="{{ $d->id }}" @if($d->id==\App\Student::where('id_user', '=', $user->id)->first()->id_department)selected="selected"@endif>{{ $d->name }}</option>
					    			@endforeach
					    		</select>
							</div>
							<div class="col-sm-6">
					    		<select class="form-control" required="required" name="studentLevel">
					    			<option value="">LEVEL</option>
					    			@foreach($levels as $l)
					    			<option value="{{ $l->id }}" @if($l->id==\App\Student::where('id_user', '=', $user->id)->first()->id_level)selected="selected"@endif>{{ $l->name }}</option>
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
@endsection