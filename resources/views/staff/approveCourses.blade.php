@extends('staff.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Select Level</div>
				<div class="panel-body">
			    	<form method="post" action="">
			    		{{ csrf_field() }}
			    		<div class="row">
			    			<div class="col-sm-8">
					    		<select name="levelId" class="form-control">
					    			<option>LEVEL</option>
					    			@foreach($levels as $l)
					    			<option value="{{ $l->id }}">{{ $l->name }}</option>
					    			@endforeach
					    		</select>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2">
								<button class="btn btn-primary" type="submit">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@if(!empty($students))
	<div class="row">
		<div class="col-sm-12">
			<table class="table">
				<thead>
					<tr>
						<th>Student Name</th>
						<th>Level</th>
						<th>Department</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($students as $s)
					<tr>
						<td>{{ $s->first_name }} {{ $s->other_name }} {{ $s->other_name }}</td>
						<td>{{ \App\Level::find($level)->name }}</td>
						<td>{{ \App\Department::find($department)->name }}</td>
						<td><a href="/staff/approveCoursesForStudent?id_user={{ $s->id_user }}&id_level={{ $level }}&id_department={{ $department }}">View courses</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@endif
</div>
@endsection