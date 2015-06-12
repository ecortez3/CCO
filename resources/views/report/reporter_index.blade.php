
@extends('app')

@section('content')

	<div class="container-fluid">
		<div class="nick-header">
			<h1> Clients {{ $time->format('m/Y') }} </h1>
		</div>
		
		<div class="row">
				&nbsp;
				<a href = "{{action('ReportController@previousMonth', [$time] )}}"><img alt="Last Month" src="/leftarrow.jpg" title="Previous Month"></a>
				&nbsp;
				<a href = "{{action('ReportController@nextMonth', [$time] )}}"><img alt="Next Month" src="/rightarrow.jpg" title="Next Month"></a>
				&nbsp;
				<a href = "{{action('ReportController@printMonth', [$time] )}}"><img alt="Monthly Printing" src="/printerlightpink.png" title="Print Monthly"></a>
				&nbsp;
				<a href = "{{action('ReportController@printQuarter', [$time] )}}"><img alt="Quarter Printing" src="/printerlaguna.png" title="Print Quarterly"></a>
				&nbsp;
				<a href = "{{action('ReportController@printAnnual', [$time] )}}"><img alt="Annual Printing" src="/printerventura.png" title="Print Annual"></a>
				&nbsp;
				<a href="{{action('ReportController@printMonthReport', [$time] )}}"><img alt="Monthly Report" src="/1.jpg" height="15" width="15" title="Monthly Report"></a>
				&nbsp;
				<a href="{{action('ReportController@printQuarterReport', [$time] )}}"><img alt="Quarterly Report" src="/3.png" height="15" width="15" title="Quarterly Report"></a>
				&nbsp;
				<a href="{{action('ReportController@printAnnualReport', [$time] )}}"><img alt="Annual Report" src="/4.png" height="15" width="15" title="Annual Report"></a>
				
				<span class="floatright" style="right:0;">
					<a href="action('ReprotController@BreakfastReport')">Breakfast</a> |
					<a href="action('ReprotController@LunchReport')">Lunch </a> |
					<a href="action('ReprotController@DinnerReport')">Dinner</a>
					
				</span>
		</div>
		&nbsp;
		<div class="row">
			<span class="floatleft">
				<input type="search"  placeholder="Search here" name="searchDatabase">
				<input type="submit">
			</span>
			
			<span class="floatright">
				Total Meals =  0
				Total Eligible = 0
				Total Ineligible = 0
			</span>
			
		</div>
		&nbsp;
		<div class="row">
			<table class="table-striped">
				<thead>
					<tr>
						<th scope="col">Last</th>
						<th scope="col">First</th>
						<th scope="col">1</th>
						<th scope="col">2</th>
						<th scope="col">3</th>
						<th scope="col">4</th>
						<th scope="col">5</th>
						<th scope="col">6</th>
						<th scope="col">7</th>
						<th scope="col">8</th>
						<th scope="col">9</th>
						<th scope="col">10</th>
						<th scope="col">11</th>
						<th scope="col">12</th>
						<th scope="col">13</th>
						<th scope="col">14</th>
						<th scope="col">15</th>
						<th scope="col">16</th>
						<th scope="col">17</th>
						<th scope="col">18</th>
						<th scope="col">19</th>
						<th scope="col">20</th>
						<th scope="col">21</th>
						<th scope="col">22</th>
						<th scope="col">23</th>
						<th scope="col">24</th>
						<th scope="col">25</th>
						<th scope="col">26</th>
						<th scope="col">27</th>
						<th scope="col">28</th>
						<th scope="col">29</th>
						<th scope="col">30</th>
						<th scope="col">31</th>
						<th style="color:red" scope="col">TOTAL</th>
					</tr>
				</thead>
				@foreach ($clients as $client)

					<tr class="alt">
					
						<td>{{ $client->lname }} </td>
						<td>{{ $client->fname }} </td>
						<td width = "3.22%">{{ $client->meal->last()->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%">{{ $client->breakfast }} </td>
						<td width = "3.22%"><a href = "">0</td>

					</tr>	
				@endforeach
				
				<tr style="color: red; font-weight: bold;">
						<td>TOTAL</td>
						<td><a href = ""></a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						<td><a href = "">0</a></td>
						
				</tr>
			</table>	
		</div>
	</div>
@stop