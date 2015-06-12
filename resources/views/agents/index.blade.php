@extends('app')

@section('content')
	<h1> Agents </h1>

	@foreach ($agents as $agent)
		
		<article>
			<h2>
				<a href=" {{ action('AgentController@show', [$agent->id]) }} ">{{ $agent->name }} </a>
			</h2>
		</article>
	@endforeach
@stop