@extends('app')

@section('content')
	<h1> {{$client->fname }} {{$client->lname}} - {{ $client->gender }}</h1>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">	
			{!! Form::open([ 'method' => 'GET', 'action' =>['ClientController@createFromTemp', $client->id] ]) !!}
				<div class="form-group">
					{!! Form::submit('Add to clients list', ['class' => 'btn btn-info']) !!}
				</div>
				{!! Form::close() !!}
				{!! Form::open([ 'method' => 'DELETE', 'action' =>['TempController@destroy', $client->id] ]) !!}
				<div class="form-group">
					{!! Form::submit('Delete Record', ['class' => 'btn btn-danger']) !!}
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop