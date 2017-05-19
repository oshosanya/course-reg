@extends('admin.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Edit Course Unit</div>
				<div class="panel-body">
			    	<form method="post" action="">
			    		{{ csrf_field() }}
			    		<div class="col-sm-8">
				    		<div class="input-group input-group-sm col-sm-8">	
							  	<input type="number" class="form-control" name="unitValue" placeholder="Unit Value" aria-describedby="sizing-addon1" value="{{ $unit->value }}">
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