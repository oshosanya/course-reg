@extends('admin.layouts.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Create Semester</div>
				<div class="panel-body">
			    	<form method="post" action="/admin/semesters/create">
			    		{{ csrf_field() }}
			    		<div class="col-sm-8">
				    		<div class="input-group input-group-sm col-sm-8">	
							  	<input type="text" class="form-control" name="semesterName" placeholder="Semester Name" aria-describedby="sizing-addon1">
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
						<td>Semester</td>
						<td>Updated At</td>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($semesters as $s)
					<tr>
						<td>{{ $s->id }}</td>
						<td>{{ $s->name }}</td>
						<td>{{ $s->updated_at }}</td>
						<td><a href="/admin/semesters/edit/{{ $s->id }}">Edit</a>|<a href="/admin/semesters/delete/{{ $s->id }}" class="deleteBtn">Delete</a></td>
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
		var r = confirm("Are you sure you want to delete this semester?");
		console.log(r)
		if (r == true) {
		    location.href = target.attr('href');
		} else {
			return false;
		}
	})
</script>
@endsection