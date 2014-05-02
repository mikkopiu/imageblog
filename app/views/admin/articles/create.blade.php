@extends('admin._layouts.default')

@section('main')

	<h2>Create new article</h2>

	@include('admin._partials.notifications')

	{{-- Open Form to prepare for saving new page --}}
	{{-- Don't need to define HTTP method, Form functions via POST --}}
	{{ Form::open(array('route' => 'admin.articles.store')) }}

		<div class="control-group">
			{{ Form::label('title', 'Title') }}
			<div class="controls">
				{{ Form::text('title') }}
			</div>
		</div>

		<div class="control-group">
			{{ Form::label('body', 'Description') }}
			<div class="controls">
				{{ Form::textarea('body') }}
			</div>
		</div>

		<div class="form-actions">
			{{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
			<a href="{{ URL::route('admin.articles.index') }}" class="btn btn-large">Cancel</a>
		</div>

	{{ Form::close() }}

@stop