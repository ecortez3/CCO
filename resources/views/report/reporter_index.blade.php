
@extends('app')

@section('content')
	<div class="container">
		<div class="nick-header">
			<h1> Clients {{ $time->format('m/Y') }} </h1>
            <h3> {{ $filter }} </h3>
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
				<a href="{{action('ReportController@viewIndex')}}">All</a> |
				<a href="{{action('ReportController@viewMealIndex', ['1'])}}">Breakfast</a> |
				<a href="{{action('ReportController@viewMealIndex', ['2'])}}">Lunch</a> |
				<a href="{{action('ReportController@viewMealIndex', ['3'])}}">Dinner</a>

				</span>
		</div>
		&nbsp;
		<div class="row">
			<span class="floatleft">
                <form action="/search" method="get">
                    <input type="query"  id="query" placeholder="Search here" name="query">
                    <input type="submit">
                </form>
			</span>
			
			<span class="floatright">
				Total Meals = {{ $dayGrandTotal }}
				Total Eligible = {{ $eligibleDayGrandTotal }}
				Total Ineligible = {{ $dayGrandTotal - $eligibleDayGrandTotal }}
			</span>
			
		&nbsp;
        </div>
        <br />
        <div class="row-container">
		<div class="row">
		<div class="col-md-21" >Last</div>
		<div class="col-md-21" >First</div>
        <div class="col-md-21" >&nbsp;</div>
         @for($i=1;$i<=31;$i++)
         <div class="col-md-1a" >{{ $i }}</div>
         @endfor
		<div class="col-md-21" style="color:red">TOTAL</div>
        </div>
				@foreach ($clients as $client)
                        <div class="row">
                        <?php $id = $client->id; ?>
						<div class="col-md-2">{{ $client->lname }} </div>
						<div class="col-md-2">{{ $client->fname }} </div>
                        <div class="col-md-2"></div>
                            @for($i=1;$i<=31;$i++)
                                <div class="col-md-1" width = "3.22%">{{ $mealsDayTotal[$id][$i] }} </div>
                            @endfor
                            <div class="col-md-2"><a href = "">{{ $mealsTotal[$id] }}</a></div>
                        </div>
				@endforeach
        <div class="row">
				<div class="col-md-22">TOTAL</div>
				<div class="col-md-22"><a href = ""></a></div>
                <div class="col-md-22"><a href = ""></a></div>
                @for($i=1;$i<=31;$i++)
                    <div class="col-md-1b"><a href = "">{{ $dayTotal[$i] }}</a></div>
                @endfor
					<div class="col-md-22"><a href = "">{{ $dayGrandTotal  }}</a></div>
		</div>
        </div> <!-- .row-container -->
	</div>
@stop