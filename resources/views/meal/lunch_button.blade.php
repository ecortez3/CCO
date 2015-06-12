@extends('app')

@section('content')
<div id="top-navigation" >
	<center><h2>Lunch</h2>
		<a href="{{ action('MealController@meal') }}">Change Meal Time</a>
		<br>
		<a href="{{ action('MealController@btnClickLunch', [$client->id]) }}"><img src="\button.jpg" alt="Meal Button" height="215" width="215" ></a>

		<figcaption>{{ $client->lname }} {{ $client->fname }}</figcaption>
		</center>
</div>
@endsection