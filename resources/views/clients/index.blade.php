<!-- TO DO

1st.  -> Alphabetize  			done
2. -> Breakfast/lunch/supper	done
3. -> Search box  				done
4. -> rotation between monthly, quarterly, and annually 
5. -> links to print out monthly/weekly/annually reports
-->

@extends('app')

@section('content')
	<h1> Clients </h1>
	
	<div id="top-navigation">
		<span class="floatleft">
		<table>
		<tr>
			<td><a href="{{ url('/home') }} ">Back to previous page</a></td>
	
			<!-- <td><a href="">Edit</a></td> 
			<td><a href="">Print Quarter</a></td>
			<td><a href="">Print Annual</a></td>
			<td><a href="">Current Page</a></td> -->
		<tr>
		</table>
		
		</span>
		
	<!--	<span class="floatright"><a href="">Breakfast</a> 
		<a href="">Lunch</a> 
		<a href="">Supper</a> -->
		<a href="">Men</a> 
		<a href="">Women</a> 
		<a href="">Families</a>
		</span>
	</div>
	<div id="mid-navigation">
		<table>
		<tr>
			<td><form > <!-- place action link here .. example action="action_page.php" -->
			  <input type="search"  value="Search here" name="searchDatabase">
			  <input type="submit">
			 </td>
		<!--	<td>Total Meals = <a href=""> total here</a></td>
			<td>Total Eligible = <a href=""> total here</a></td>
			<td>Total Ineligible = <a href=""> total here</a></td> -->
		  </tr>
		  </table>
</form>
	</div>
	
	<div>

		<table style="width: 100%">
			<thead>
				<tr>
					<th scope="col">Clients</th>
					<th scope="col">HMIS ID#</th>
					<th scope="col">Gender</th>
					<th scope="col">DOB</th>
					
					<th scope="col">Age</th>
					<th scope="col">Intake Date</th>
					
					<th scope="col">CW</th>
				</tr>
			</thead>
			@foreach ($clients as $client)

				<tr class="alt">
					<td><a href=" {{ action('ClientController@show', [$client->id]) }} ">{{ $client->lname }} {{ $client->fname }} </a> </td>
					<td align="center" width = "1.0%"><a href = "">{{ $client->HMISID }}</a></td>
					<td align="center" width = "5.2%"><a href = "">{{ $client->gender }}</a></td>
					<td align="center" width = "5.2%"><a href = "">{{ $client->DOB }}</a></td>
	
					<td align="center" width = "5.2%"><a href = "">-</a></td>
					<td align="center" width = "5.2%"><a href = "">{{ $client->intake_date }}</a></td>

					<td align="center" width = "10.2%"><a href = "">{{ $client->agent_id }}</a></td>
	
				</tr>	
			@endforeach

		</table>
		
	</div>
	
@stop