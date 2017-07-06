@extends('admin.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Print Result</div>
				<div class="panel-body">
			    	<form method="get" action="/admin/resultPrint" target="_blank">
			    		{{ csrf_field() }}
			    		<div class="row">
				    		<div class="col-sm-8">
					    		<select class="form-control" name="id_level">
					    			@foreach($levels as $l)
					    			<option value="{{ $l->id }}">{{ $l->name }}</option>
					    			@endforeach
					    		</select>
							</div>
						</div>
						<div class="row">
				    		<div class="col-sm-8">
					    		<select class="form-control" name="id_semester">
					    			@foreach($semesters as $s)
					    			<option value="{{ $s->id }}">{{ $s->name }}</option>
					    			@endforeach
					    		</select>
							</div>
						</div>
						<div class="row">
				    		<div class="col-sm-8">
					    		<select class="form-control" name="id_session">
					    			@foreach($sessions as $s)
					    			<option value="{{ $s->id }}">{{ $s->name }}</option>
					    			@endforeach
					    		</select>
							</div>
						</div>
						<div class="row">
				    		<div class="col-sm-8">
					    		<select class="form-control" name="id_department">
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
</div>
@endsection