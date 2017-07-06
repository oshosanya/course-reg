@extends('staff.layouts.layout')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<b>Name: </b>
			</div>
			<div class="col-md-6">
				<p>{{ $staff->last_name }} {{ $staff->first_name }} {{ $staff->other_name }}</p>
			</div>
		</div>
		{{-- <div class="row">
			<div class="col-md-2">
				<b>Matric Number: </b>
			</div>
			<div class="col-md-6">
				<p>{{ $staff->matric_no }}</p>
			</div>
		</div> --}}
		<div class="row">
			<div class="col-md-2">
				<b>Department: </b>
			</div>
			<div class="col-md-6">
				<p>{{ \App\Department::find($staff->id_department)->name }}</p>
			</div>
		</div>
		{{-- <div class="row">
			<div class="col-md-2">
				<b>Level: </b>
			</div>
			<div class="col-md-6">
				<p>{{ \App\Level::find($staff->id_level)->name }}</p>
			</div>
		</div> --}}
	</div>
@endsection