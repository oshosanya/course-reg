@extends('student.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Student Result</div>
				<div class="panel-body">
			    	<form method="get" action="/student/resultGet">
			    		{{ csrf_field() }}
			    		<div class="row">
			    			<div class="col-sm-8">
					    		<div class="input-group input-group-sm col-sm-8">	
								  	<select class="form-control" name="level">
								  		<option value="">LEVEL</option>
								  		@foreach($levels as $l)
								  		<option value="{{ $l->id }}">{{ $l->name }}</option>
								  		@endforeach
								  	</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-8">
					    		<div class="input-group input-group-sm col-sm-8">	
					    			<select class="form-control" name="semester">
								  		<option value="">SEMESTER</option>
								  		@foreach($semesters as $s)
								  		<option value="{{ $s->id }}">{{ $s->name }}</option>
								  		@endforeach
								  	</select>
					    		</div>
					    	</div>
						</div>
						<div class="row">
							<div class="col-sm-8">
					    		<div class="input-group input-group-sm col-sm-8">	
					    			<select class="form-control" name="session">
								  		<option value="">SESSION</option>
								  		@foreach($sessions as $s)
								  		<option value="{{ $s->id }}">{{ $s->name }}</option>
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