@extends('app')

@section('content')
	<h1>Add a new client </h1>
	<hr/>
	@include('errors.list')
	{!! Form::open(array('action' => 'TempController@store')) !!}
		<div class="form-group">
			{!! Form::label('fname', 'First Name:') !!}
			{!! Form::text('fname', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group"> 
			{!! Form::label('lname', 'Last Name:') !!}
			{!! Form::text('lname', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group"> 
			{!! Form::label('gender','Gender',array('id'=>'','class'=>'')) !!}
			{!! Form::radio('gender', 'Male') !!} Male
			{!! Form::radio('gender', 'Female') !!} Female
		</div>

		<div class="form-group">
			{!! Form::submit('Add client', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
@stop