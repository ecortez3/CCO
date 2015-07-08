@extends('app')

@section('content')

	<div class="container-fluid">
		<div class="nick-header">
			<h1> Report for {{ $time->format('m/Y') }} </h1>			
		</div>

		<div class="row">
			<table class="table-striped">
				<thead>
					<tr class="header">
						<th scope="col">Total Types</th>
						<th scope="col"></th>
						<th scope="col">Men</th>
						<th scope="col"></th>
						<th scope="col">Women</th>
						<th scope="col"></th>
						<th scope="col">Family</th>
						<th scope="col"></th>
						<th scope="col">Total</th>
					</tr>
				</thead>
				
				<tr class="body">
					<td width="30%">Total Eligible Breakfast</td><td width="5%"></td><td width="10%">{{ $emTotal['b'] }}</td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td>
				</tr>
				<tr class="body">
					<td>Total Eligible Lunch</td><td width="5%"></td><td width="10%">{{ $emTotal['l'] }}</td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td>
				</tr>
				<tr class="body">
					<td>Total Eligible Dinner</td><td width="5%"></td><td width="10%">{{ $emTotal['d'] }}</td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td>
				</tr>
				<tr class="body">
					<td>Total Eligible Meals</td><td width="5%"></td><td width="10%">{{ $emTotal['t'] }}</td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td>
				</tr>
				<tr class="body">
					<td>Total Ineligible Breakfast</td><td width="5%"></td><td width="10%">{{ $imTotal['b'] }}</td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td>
				</tr>
				<tr class="body">
					<td>Total Ineligible Lunch</td><td width="5%"></td><td width="10%">{{ $imTotal['l'] }}</td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td>
				</tr>
				<tr class="body">
					<td>Total Ineligible Dinner</td><td width="5%"></td><td width="10%">{{ $imTotal['d'] }}</td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td>
				</tr>
				<tr class="body">
					<td>Total Ineligible Meals</td><td width="5%"></td><td width="10%">{{ $imTotal['t'] }}</td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td>
				</tr>
				<tr class="body">
					<td>Total Meals</td><td width="5%"></td><td width="10%">{{ $emTotal['t'] + $imTotal['t'] }}</td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td><td width="5%"></td><td width="10%"></td>
				</tr>
			</table>	
		</div>
	</div>
@stop