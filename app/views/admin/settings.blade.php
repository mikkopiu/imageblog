@extends('admin._layouts.default')

@section('main')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit your personal info <a href="{{ URL::route('admin.dashboard') }}" class="btn btn-default">Return</a></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		@include('admin._partials.notifications')

		{{ Form::model($user, array('route'=>'admin.settings.updateInfo')) }}
			<div class="form-group">
				{{ Form::label('first_name', 'First name *') }}
				{{ Form::text('first_name', $user->first_name, array('class'=>'form-control','placeholder'=>'Enter your first name')) }}
			</div>
			<div class="form-group">
				{{ Form::label('last_name', 'Surname *') }}
				{{ Form::text('last_name', $user->last_name, array('class'=>'form-control','placeholder'=>'Enter your surname')) }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email *') }}
				{{ Form::text('email', $user->email, array('class'=>'form-control','placeholder'=>'Enter your surname')) }}
			</div>
			<p class="text-muted">* required fields</p>
			{{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
			{{ Form::reset('Reset', ['class' => 'btn btn-default']) }}
		{{ Form::close() }}
		
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

@stop