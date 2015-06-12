@extends('app')

@section('content')
	<div class="container-fluid">
		<div class="nick-header">
			<h1> Annual - {{ $year }} </h1>
		</div>
		<div style="padding-left:auto;padding-right:auto">
			<table style="width:32%;display:inline-block;border:none">
				<caption><h3>Hannah</h3></caption>
				<thead>
					<tr>
						<th scope="col">Clients</th>
						<th scope="col">HMIS ID</th>
						<th scope="col">Meals</th>
						<th scope="col">Eligibility</th>

					</tr>
				</thead>
				@foreach ($clients as $client)
					<tr class="alt">
						<td align="center" width = "50%">{{ $client->lname }} {{ $client->fname }}</td>
						<td align="center" width = "20%">-</td>
						<td align="center" width = "20%">-</td>
						<td align="center" width = "10%">-</td>
					</tr>	
				@endforeach
			</table>
			&nbsp; &nbsp;
			<table style="width:32%;display:inline-block;border:none">
				<caption><h3>Sylvia</h3></caption>
				<thead>
					<tr>
						<th scope="col">Clients</th>
						<th scope="col">HMIS ID#</th>
						<th scope="col">Meals</th>
						<th scope="col">Eligibility</th>

					</tr>
				</thead>
				@foreach ($clients as $client)
					<tr class="alt">
						<td align="center" width = "50%">{{ $client->lname }} {{ $client->fname }}</td>
						<td align="center" width = "20%">-</td>
						<td align="center" width = "20%">-</td>
						<td align="center" width = "10%">-</td>
					</tr>	
				@endforeach
			</table>
			&nbsp; &nbsp;
			<table style="width:32%;display:inline-block;border:none">
				<caption><h3>Naomi</h3></caption>
				<thead>
					<tr>
						<th scope="col">Clients</th>
						<th scope="col">HMIS ID#</th>
						<th scope="col">Meals</th>
						<th scope="col">Eligability</th>

					</tr>
				</thead>
				@foreach ($clients as $client)
					<tr class="alt">
						<td align="center" width = "50%">{{ $client->lname }} {{ $client->fname }}</td>
						<td align="center" width = "20%">-</td>
						<td align="center" width = "20%">-</td>
						<td align="center" width = "10%">-</td>
					</tr>	
				@endforeach
			</table>
		</div>
	</div>
@stop