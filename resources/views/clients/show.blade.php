@extends('app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading"> {{$client->fname }} {{$client->lname}} </div>
					<div class="panel-body">
						<h4>Gender: {{ $client->gender }} </h4>
						<h4>Date of Birth: {{ $client->DOB }}</h4>
						<h4>Program: {{ App\Program::find($client->program_id)->name }}</h4>
						<h4>Intake Date: {{ $client->intake_date }}</h4>
						<h4>Case Manager: {{ App\Agent::find($client->agent_id)->name }}</h4>
						
						{{-- <h4>Family ID: {{ $client->familyID }}</h4> --}}
					</div>
				</div>
				{!! Form::open([ 'method' => 'GET', 'action' =>['ClientController@edit', $client->id] ]) !!}
				<div class="form-group">
					{!! Form::submit('Edit Record', ['class' => 'btn btn-info']) !!}
				</div>
				{!! Form::close() !!}
				{!! Form::open([ 'method' => 'DELETE', 'action' =>['ClientController@destroy', $client->id] ]) !!}
				<div class="form-group">
					{!! Form::submit('Delete Record', ['class' => 'btn btn-danger']) !!}
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop