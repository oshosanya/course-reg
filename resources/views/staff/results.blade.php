@extends('staff.layouts.layout')
@section('content')
{{-- @foreach($students as $s)
{{ var_dump(\App\Student::find(\App\Student::where('id_user', '=', $s->id_user)->first()->id)->results()->get()) }}
@endforeach --}}
{{-- {{ var_dump($students) }} --}}
<div class="container">
	<div class="row">
		<div class="alert alert-info" role="alert">
  			<strong>Heads up!</strong> Scores with zero have been saved as 0 or have not been entered.
		</div>
	</div>
	<div class="row">
		<form method="post" action="">
			{{ csrf_field() }}
			<table class="table">
				<thead>
					<tr>
						<td>STUDENT NAME</td>
						<td>MATRIC NO</td>
						<td>CA</td>
						<td>EXAM</td>
					</tr>
				</thead>
				<tbody>
					@foreach($students as $s)
					<tr>
						<td><input type="hidden" name="studentId[]" value="{{ $s->id_user }}">{{ \App\Student::where('id_user', '=', $s->id_user)->first()->last_name }} {{ \App\Student::where('id_user', '=', $s->id_user)->first()->first_name }} {{ \App\Student::where('id_user', '=', $s->id_user)->first()->other_name }}</td>
						<td>{{ \App\Student::where('id_user', '=', $s->id_user)->first()->matric_no }}</td>
						<td><input type="number" name="ca[]" class="form-control" value="@if($s->ca==NULL){{ 0 }}@else{{ $s->ca }}@endif"></td>
						<td><input type="number" name="exam[]" class="form-control" value="@if($s->ca==NULL){{ 0 }}@else{{ $s->exam }}@endif"></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<button class="btn btn-primary" type="submit">Submit</button>
		</form>
	</div>
</div>
@endsection