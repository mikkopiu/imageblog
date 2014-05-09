@extends('admin._layouts.default')

@section('main')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit your personal information <a href="{{ URL::route('admin.dashboard') }}" class="btn btn-default">Return</a></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		@include('admin._partials.notifications')

		{{ Form::model($user, ['method' => 'put', 'route' => 'admin.user.update']) }}
			<div class="form-group">
				{{ Form::label('first_name', 'First name *') }}
				{{ Form::text('first_name', null, array('class'=>'form-control','placeholder'=>'Enter your first name')) }}
			</div>
			<div class="form-group">
				{{ Form::label('last_name', 'Surname *') }}
				{{ Form::text('last_name', null, array('class'=>'form-control','placeholder'=>'Enter your surname')) }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email *') }}
				{{ Form::email('email', null, array('class'=>'form-control','placeholder'=>'Enter your surname')) }}
			</div>
			<p class="text-muted">* required fields</p>
			{{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
			<a href="{{ URL::route('admin.dashboard') }}" class="btn btn-danger"><i class="fa fa-times-circle fa-fw"></i> Cancel</a>
		{{ Form::close() }}

	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

@stop