@extends('app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading"> Clients to be added</div>
						<div class="panel-body">
						@foreach ($temps as $temp)
							<article>
								<h2>
									<a href=" {{ action('TempController@show', [$temp->id]) }} ">{{ $temp->fname }} {{ $temp->lname }} </a>
								</h2>
							</article>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@stop