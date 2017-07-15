@extends('admin.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Edit Faculty Name</div>
				<div class="panel-body">
			    	<form method="post" action="">
			    		{{ csrf_field() }}
			    		<div class="row">
			    			<div class="col-sm-8">
					    		<div class="input-group input-group-sm col-sm-8">	
								  	<input type="text" class="form-control" name="departmentName" placeholder="Department Name" aria-describedby="sizing-addon1" value="{{ $department->name }}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-8">
					    		<div class="input-group input-group-sm col-sm-8">	
					    			<select class="form-control" name="facultyId">
					    				<option value="">FACULTY</option>
					    				@foreach($faculties as $f)
					    				<option value="{{ $f->id }}" @if($f->id==$department->id_faculty)selected="selected"@endif>{{ $f->name }}</option>
					    				@endforeach
					    			</select>
					    		</div>
					    	</div>
						</div>
						<div class="row">
							<div class="col-sm-8">
					    		<div class="input-group input-group-sm col-sm-8">	
					    			<select class="form-control" name="courseAdviser">
					    				<option value="">COURSE ADVISER</option>
					    				@foreach($staffs as $s)
					    				<option value="{{ $s->id_user }}" @if($s->id_user==$department->id_user_adviser)selected="selected"@endif>{{ $s->first_name }} {{ $s->other_name }} {{ $s->last_name }}</option>
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
</div>
@endsection