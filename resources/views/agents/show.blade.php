@extends('app')

@section('content')
	<h1> {{$user->name }} </h1>
		
	<article>
		<h2>Role</h2>
		<div class="body">{{ $user->role }}</div>
		<h2>E-mail</h2>
		<div class="body">{{ $user->email }}</div>
	</article>
@stop