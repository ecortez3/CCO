<div class="panel-body">
	<div class="form-group">
		{!! Form::label('fname', 'First Name:') !!}
		{!! Form::text('fname', null, ['class' => 'form-control']) 
		!!}
	</div>

	<div class="form-group"> 
		{!! Form::label('lname', 'Last Name:') !!}
		{!! Form::text('lname', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group"> 
		{!! Form::label('DOB', 'Date of Birth:') !!}
		{!! Form::input('date', 'DOB', date('Y-m-d'), ['class' => 'form-control']) !!}
	</div>

	<div class="form-group"> 
		{!! Form::label('HMISID', 'HMISID:') !!}
		{!! Form::text('HMISID', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group"> 
		{!! Form::label('intake_date', 'Intake Date:') !!}
		{!! Form::input('date', 'intake_date', date('Y-m-d'), ['class' => 'form-control']) !!}
	</div>

	<div class="form-group"> 
		{!! Form::label('programs','Programs: ', ['class' => 'col-md-4 control-label']) !!}
		{!! Form::select('programs', $programs, null, ['class' => 'form-control']) !!}
		
	</div>

	<div class="form-group"> 
		{!! Form::label('gender','Gender: ',array('id'=>'','class'=>'')) !!}
		{!! Form::radio('gender', 'Male') !!} Male
		{!! Form::radio('gender', 'Female') !!} Female
	</div>

	<div class="form-group">
		{!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
	</div>
</div>