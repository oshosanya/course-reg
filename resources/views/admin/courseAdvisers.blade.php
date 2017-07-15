@extends('admin.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Create Course</div>
				<div class="panel-body">
			    	<form method="post" action="/admin/courseAdvisers">
			    		{{ csrf_field() }}
			    		<div class="row">
			    			<div class="col-sm-8">
					    		<select class="form-control">
					    			<option>DEPARTMENT</option>
					    			@foreach($departments as $d)
					    			<option value="{{ $d->id }}">{{ $d->name }}</option>
					    			@endforeach
					    		</select>
							</div>
						</div>
						<div class="row">
			    			<div class="col-sm-8">
					    		<select class="form-control">
					    			<option>INSTRUCTOR</option>
					    			@foreach($staffs as $s)
					    			<option value="{{ $s->id_user }}">{{ $s->first_name }} {{ $s->other_name }} {{ $s->last_name }}</option>
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