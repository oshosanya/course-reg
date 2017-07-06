@extends('staff.layouts.layout')
@section('content')
<div class="row">
	<div class="col-lg-3 col-xs-6">
      <!-- small box -->
      	<div class="small-box bg-aqua">
	        <div class="inner">
	          	<h3>{{ $courses->count() }}</h3>
	          	<p>Assigned Courses</p>
	        </div>
	        <div class="icon">
	          	<i class="ion ion-bag"></i>
	        </div>
	        <a href="#assignedcourses" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      	</div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-xs-12">
    	<div class="panel panel-primary" id="assignedcourses">
		  	<div class="panel-heading">
		    	<h3 class="panel-title">Assigned Courses</h3>
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
		    			@foreach($courses as $c)
		    			<tr>
		    				<td>{{ \App\Course::find(\App\RegisterableCourse::find($c->id)->id_course)->name }}</td>
		    				<td>{{ $c->course_code }}</td>
		    			</tr>
		    			@endforeach
		    		</tbody>
		    	</table>
		  	</div>
		</div>
    </div>
</div>
@endsection