@extends('app')

@section('content')
	<div class="container-fluid">
		<div class="nick-header">
			<h1> Quarter {{ $cur }} </h1>
		</div>
		<div style="padding-left:auto;padding-right:auto">
			<table style="width:32%;display:inline-block;border:none">
				<caption><h3>Hannah</h3></caption>
				<thead>
					<tr>
						<th scope="col">Clients</th>
						<th scope="col">HMIS ID</th>
						<th scope="col">Meals</th>

					</tr>
				</thead>
				@foreach ($hannah_clients as $client)
					<tr class="alt">
						<td align="center" width = "50%">{{ $client->lname }} {{ $client->fname }}</td>
                        <td align="center" width = "20%">{{ $client->HMISID }}</td>
                        <td align="center" width = "20%">{{ $mealsTotal[$client->id] }}</td>
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

					</tr>
				</thead>
				@foreach ($sylvia_clients as $client)
					<tr class="alt">
						<td align="center" width = "50%">{{ $client->lname }} {{ $client->fname }}</td>
                        <td align="center" width = "20%">{{ $client->HMISID }}</td>
                        <td align="center" width = "20%">{{ $mealsTotal[$client->id] }}</td>
					</tr>
				@endforeach
			</table>
            &nbsp; &nbsp;
            <table style="width:32%;display:inline-block;border:none">
                <caption><h3>Naomi(M)</h3></caption>
                <thead>
                <tr>
                    <th scope="col">Clients</th>
                    <th scope="col">HMIS ID#</th>
                    <th scope="col">Meals</th>

                </tr>
                </thead>
                @foreach ($naomi_clients as $client)
                    <tr class="alt">
                        <td align="center" width = "50%">{{ $client->lname }} {{ $client->fname }}</td>
                        <td align="center" width = "20%">{{ $client->HMISID }}</td>
                        <td align="center" width = "20%">{{ $mealsTotal[$client->id] }}</td>
                    </tr>
                @endforeach
            </table>
            &nbsp; &nbsp;
            <table style="width:32%;display:inline-block;border:none">
                <caption><h3>Naomi(W)</h3></caption>
                <thead>
                <tr>
                    <th scope="col">Clients</th>
                    <th scope="col">HMIS ID#</th>
                    <th scope="col">Meals</th>

                </tr>
                </thead>
                @foreach ($wnaomi_clients as $client)
                    <tr class="alt">
                        <td align="center" width = "50%">{{ $client->lname }} {{ $client->fname }}</td>
                        <td align="center" width = "20%">{{ $client->HMISID }}</td>
                        <td align="center" width = "20%">{{ $mealsTotal[$client->id] }}</td>
                    </tr>
                @endforeach
            </table>
            &nbsp; &nbsp;
            <table style="width:32%;display:inline-block;border:none">
                <caption><h3>Outreach</h3></caption>
                <thead>
                <tr>
                    <th scope="col">Clients</th>
                    <th scope="col">HMIS ID#</th>
                    <th scope="col">Meals</th>

                </tr>
                </thead>
                @foreach ($outreach_clients as $client)
                    <tr class="alt">
                        <td align="center" width = "50%">{{ $client->lname }} {{ $client->fname }}</td>
                        <td align="center" width = "20%">{{ $client->HMISID }}</td>
                        <td align="center" width = "20%">{{ $mealsTotal[$client->id] }}</td>
                    </tr>
                @endforeach
            </table>
		</div>
	</div>
@stop