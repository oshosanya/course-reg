@extends('student.layouts.layout')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<img src="{{ $student->passport_url }}" id="image" style="width: 100%">
			</div>
			<div class="col-sm-4">
				<form enctype="multipart/form-data" method="post" action="/student/passport">
					{{ csrf_field() }}
					<input type="file" name="passport" id="passport" style="display: none">
					<button type="button" class="btn btn-primary" onclick="$('#passport').click()">Change Passport</button>
					<button type="submit" class="btn btn-success">Submit</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<b>Name: </b>
			</div>
			<div class="col-md-6">
				<p>{{ $student->last_name }} {{ $student->first_name }} {{ $student->other_name }}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<b>Matric Number: </b>
			</div>
			<div class="col-md-6">
				<p>{{ $student->matric_no }}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<b>Department: </b>
			</div>
			<div class="col-md-6">
				<p>{{ \App\Department::find($student->id_department)->name }}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<b>Level: </b>
			</div>
			<div class="col-md-6">
				<p>{{ \App\Level::find($student->id_level)->name }}</p>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function readURL(input) {

		    if (input.files && input.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#image').attr('src', e.target.result);
		        }

		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#passport").change(function(){
		    readURL(this);
		});
	</script>
@endsection