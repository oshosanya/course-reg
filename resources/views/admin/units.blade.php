@extends('admin.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Create Course Unit</div>
				<div class="panel-body">
			    	<form method="post" action="/admin/units/create">
			    		{{ csrf_field() }}
			    		<div class="col-sm-8">
				    		<div class="input-group input-group-sm col-sm-8">	
							  	<input type="number" class="form-control" name="unitValue" placeholder="Unit Value" aria-describedby="sizing-addon1">
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
		<div class="col-sm-8">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>ID</td>
						<td>Unit Value</td>
						<td>Updated At</td>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($units as $u)
					<tr>
						<td>{{ $u->id }}</td>
						<td>{{ $u->value }}</td>
						<td>{{ $u->updated_at }}</td>
						<td><a href="/admin/units/edit/{{ $u->id }}">Edit</a>|<a href="/admin/units/delete/{{ $u->id }}" class="deleteBtn">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.deleteBtn').on('click', function(event)
	{
		var target = $(this);
		event.preventDefault();
		var r = confirm("Are you sure you want to delete this units?");
		console.log(r)
		if (r == true) {
		    location.href = target.attr('href');
		} else {
			return false;
		}
	})
</script>
@endsection