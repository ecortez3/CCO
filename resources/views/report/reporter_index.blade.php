
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
				Total Meals = {{ $dayGrandTotal }}
				Total Eligible = 0
				Total Ineligible = 0
			</span>
			
		</div>
		&nbsp;
		<div class="row">
			<table class="">
				<thead>
					<tr>
						<th scope="col">Last</th>
						<th scope="col">First</th>
                        @for($i=1;$i<=31;$i++)
                            <th scope="col">{{ $i }}</th>
                        @endfor
						<th style="color:red" scope="col">TOTAL</th>
					</tr>
				</thead>
				@foreach ($clients as $client)
					<tr class="alt">
                        <?php $id = $client->id; ?>
						<td>{{ $client->lname }} </td>
						<td>{{ $client->fname }} </td>
                            @for($i=1;$i<=31;$i++)
                                <td width = "3.22%">{{ $mealsDayTotal[$id][$i] }} </td>
                            @endfor
                            <td><a href = "">{{ $mealsTotal[$id] }}</a></td>
					</tr>
				@endforeach
				
				<tr style="color: red; font-weight: bold;">
						<td>TOTAL</td>
						<td><a href = ""></a></td>
                        @for($i=1;$i<=31;$i++)
                            <td><a href = "">{{ $dayTotal[$i] }}</a></td>
                        @endfor
						<td><a href = "">{{ $dayGrandTotal  }}</a></td>

				</tr>
			</table>	
		</div>
	</div>
@stop