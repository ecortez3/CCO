<!-- TO DO

1st.  -> Alphabetize  			done
2. -> Breakfast/lunch/supper	done
3. -> Search box  				done
4. -> rotation between monthly, quarterly, and annually 
5. -> links to print out monthly/weekly/annually reports
-->

@extends('app')

@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>

</script>
		<div id="top-navigation">
			<span class="floatleft">
				<h1> Clients - Breakfast </h1></br>
				<a href="{{ url('/meal') }} ">Back</a>
			</span>
		
		
			<span class="floatright">
				<a href="{{action('TempController@create')}}">Add New Client</a></br>
				<p></p>
				<a href="">Men |</a> 
				<a href="">Women |</a> 
				<a href="">Families</a></br>
				<p></p>
				<form > <!-- place action link here .. example action="action_page.php" -->
					  <input type="search"  placeholder="Search here" name="searchDatabase">
					  <input type="submit">
				</form>
			</span>
		</div>

		<table class="table-striped">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
					<th scope="col">Gender</th>
					<th scope="col">Fed</th>
				</tr>
			</thead>
			
			@foreach ($clients as $client)
			
				<tr class="alt">
					<td align="center" width = "10.0%"><a href = "{{ action('MealController@breakfastButton', [$client->id]) }}">{{ $client->id }}</a></td>
					<td align="center" width = "60.0%"><a href = "{{ action('MealController@breakfastButton', [$client->id]) }}">{{ $client->lname }}, {{ $client->fname }}</a></td>
					<td align="center" width = "10.0%">{{ $client->gender }}</a></td>
					<td align="center" width = "10.0%">{{ $client->meal->last()->breakfast }}</a></td>
				</tr>	
			@endforeach
		</table>
@stop