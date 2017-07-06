@extends('student.layouts.layout')
@section('content')
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
		    				<th></th>
		    				<th>Course Name</th>
		    				<th>Course Code</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			@foreach($registerableCourses as $c)
		    			<tr>
		    				<td>@if(\App\RegisterableCourse::registeredByStudent($c->id))<i class="fa fa-check-square-o" aria-hidden="true"></i>
@endif</td>
		    				<td>{{ \App\Course::find(\App\RegisterableCourse::find($c->id)->id_course)->name }}</td>
		    				<td>{{ \App\RegisterableCourse::find($c->id)->course_code }}</td>
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
		    	<h3 class="panel-title">Registered Courses</h3>
		  	</div>
		  	<div class="panel-body">
		    	<table class="table table-bordered table-striped">
		    		<thead>
		    			<tr>
		    				<th>Course Name</th>
		    				<th>Course Code</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			@foreach($registeredCourses as $c)
		    			<tr>
		    				<td>{{ \App\Course::find(\App\RegisterableCourse::find(\App\RegisteredCourse::find($c->id)->id_registerable_course)->id_course)->name }}</td>
		    				<td>{{ \App\RegisterableCourse::find(\App\RegisteredCourse::find($c->id)->id_registerable_course)->course_code }}</td>
		    			</tr>
		    			@endforeach
		    		</tbody>
		    	</table>
		  	</div>
		</div>
	</div>
</div>
@endsection