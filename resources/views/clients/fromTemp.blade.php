@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			@include('errors.list')

			<div class="panel panel-default">
				<div class="panel-heading">Add A New Client</div>
				
				{!! Form::model($client, array('action' => 'ClientController@store')) !!}	

				@include('partials.client', ['submitButton' => 'Add Client'])

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@stop