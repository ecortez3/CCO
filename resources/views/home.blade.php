@extends('app')
<?php
	$agent = Auth::user();
	//echo $agent->id;

	$roles = $agent->roles->first();
	$test = $roles->name;
		//echo $test;
	$admin = App\Role::find(1)->name;
	//echo $admin;
	$manager = App\Role::find(2)->name;
	//echo $manager;
?> 

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $test }}</div>
				@if($test == $admin)
					@include('partials.admin')
				@elseif($test == $manager)
					@include('partials.manager')
				@endif
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">Choose a different role</div>
				@if($test == $admin)
					@include('partials.adminOp')
				@elseif($test == $manager)
					@include('partials.managerOp')
				@endif				
			</div>
		</div>
	</div>
</div>
@endsection
<!--
	--This may potentially be the dashboard for both case manager and admin though only case manager can see add new agent and delete agent
	--Individual controller has been deleted so must be corrected in these hrefs
-->