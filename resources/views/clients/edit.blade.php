@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('errors.list')
			<div class="panel panel-default">
				<div class="panel-heading"> {{$client->lname}}, {{$client->fname}}</div>
					{!! Form::model($client, ['method' => 'PATCH', 'action' => ['ClientController@update', $client->id]]) !!}
					@include('partials.client', ['submitButton' => 'Update Client', 'programs' => App\Program::lists('name')])
					
					{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>	
@stop