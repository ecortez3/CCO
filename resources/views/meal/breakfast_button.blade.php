@extends('app')

@section('content')
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>

</script>
<div id="top-navigation" >
	<center><h2>Breakfast</h2>
		<a href="{{ action('MealController@meal') }}">Change Meal Time</a> 
		<br>	
		<a href="{{ action('MealController@btnClickBreakfast', [$client->id]) }}"><img src="\button.jpg" alt="Meal Button" height="215" width="215"  id="button"></a>	
			<figcaption>{{ $client->lname }} {{ $client->fname }}</figcaption>
			</center>
</div>
@endsection