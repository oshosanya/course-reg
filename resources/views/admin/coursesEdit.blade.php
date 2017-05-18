@extends('admin.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Edit Course</div>
				<div class="panel-body">
			    	<form method="post" action="">
			    		{{ csrf_field() }}
			    		<div class="row">
			    			<div class="col-sm-8">
					    		<div class="input-group input-group-sm col-sm-8">	
								  	<input type="text" class="form-control" name="courseName" placeholder="Course Name" aria-describedby="sizing-addon1" value="{{ $course->name }}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-8">
					    		<div class="input-group input-group-sm col-sm-8">	
					    			<input type="text" class="form-control" placeholder="Course Code" name="courseCode" value="{{ $course->code }}">
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