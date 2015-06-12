<!-- TO DO

1st.  -> Alphabetize  			done
2. -> Breakfast/lunch/supper	done
3. -> Search box  				done
4. -> rotation between monthly, quarterly, and annually 
5. -> links to print out monthly/weekly/annually reports
-->

@extends('app')

@section('content')
	<h1 align=center> Meal Time </h1>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Choose a meal:</div>
					<div class="panel-body">
						<a href="{{ action('MealController@mealRosterBreakfast') }}">Breakfast</a>
					</div>
					<div class="panel-body">
						<a href="{{ action('MealController@mealRosterLunch') }}">Lunch</a>
					</div>
					<div class="panel-body">
						<a href="{{ action('MealController@mealRosterDinner') }}">Dinner</a>
					</div>
				</div>
			</div>
		</div>
	</div>
		
@endsection