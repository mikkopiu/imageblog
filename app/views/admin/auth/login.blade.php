@extends('admin._layouts.auth')

{{-- Layout for login --}}
@section('main')
	<div class="container" style="margin-top: 5rem;">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Please Sign In</h3>
					</div>
					<div class="panel-body">
						@include('admin._partials.notifications')
						{{-- Open Form to create Form-elements --}}
						{{ Form::open() }}

						{{-- Prepare a space for errors --}}
						@if($errors->has('login'))
							<div class="alert alert-danger">{{ $errors->first('login', ':message') }}</div>
						@endif

						<div class="form-group">
							{{ Form::label('email', 'Email') }}
							<div class="controls">
								{{-- Form::text('email', null, array('class'=>'form-control','placeholder'=>'user@email.com','autofocus','type'=>'email')) --}}
								{{ Form::email('email', null, array('class'=>'form-control','placeholder'=>'user@email.com','autofocus','type'=>'email')); }}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('password', 'Password') }}
							<div class="controls">
								{{ Form::password('password', array('class'=>'form-control','placeholder'=>'Password')) }}
							</div>
						</div>

						<div class="form-actions">
							{{ Form::submit('Login', ['class' => 'btn btn-lg btn-success btn-login']) }}
						</div>

						{{-- Close Form --}}
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop