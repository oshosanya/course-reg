@extends('admin.layouts.layout')
@section('content')
<div class="row">
	<div class="col-lg-6 col-xs-12">
    	<div class="panel panel-primary">
		  	<div class="panel-heading">
		    	<h3 class="panel-title">Faculties</h3>
		  	</div>
		  	<div class="panel-body">
		    	<table class="table table-bordered table-striped">
		    		<thead>
		    			<tr>
		    				<th>Name</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			@foreach($faculties as $f)
		    			<tr>
		    				<td>{{ $f->name }}</td>
		    			</tr>
		    			@endforeach
		    		</tbody>
		    	</table>
		  	</div>
		</div>
    </div>
    <div class="col-lg-6 col-xs-12">
    	<div class="panel panel-primary">
		  	<div class="panel-heading">
		    	<h3 class="panel-title">Departments</h3>
		  	</div>
		  	<div class="panel-body">
		    	<table class="table table-bordered table-striped">
		    		<thead>
		    			<tr>
		    				<th>Name</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			@foreach($departments as $d)
		    			<tr>
		    				<td>{{ $d->name }}</td>
		    			</tr>
		    			@endforeach
		    		</tbody>
		    	</table>
		  	</div>
		</div>
    </div>
</div>
<div class="row">
	<div class="col-lg-6 col-xs-12">
    	<div class="panel panel-primary">
		  	<div class="panel-heading">
		    	<h3 class="panel-title">Registerable Courses</h3>
		  	</div>
		  	<div class="panel-body">
		    	<table class="table table-bordered table-striped">
		    		<thead>
		    			<tr>
		    				<th>Name</th>
		    				<th>Course Code</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			@foreach($registerableCourses as $r)
		    			<tr>
		    				<td>{{ \App\Course::find(\App\RegisterableCourse::find($r->id)->id_course)->name }}</td>
		    				<td>{{ $r->course_code }}</td>
		    			</tr>
		    			@endforeach
		    		</tbody>
		    		<tfoot>
		    			<tr>{{ $registerableCourses->links() }}</tr>
		    		</tfoot>
		    	</table>
		  	</div>
		</div>
    </div>
</div>
@endsection