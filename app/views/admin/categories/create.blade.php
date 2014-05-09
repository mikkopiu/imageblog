@extends('admin._layouts.default')

@section('main')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Create new category <a href="{{ URL::route('admin.categories.index') }}" class="btn btn-default">Return</a></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-8">
		@include('admin._partials.notifications')

		{{-- Open Form to prepare for saving new page --}}
		{{-- Don't need to define HTTP method, Form functions via POST --}}
		{{ Form::open(array('route'=>'admin.categories.store')) }}

			<div class="form-group">
				{{ Form::label('category', 'Name *') }}
				{{ Form::text('category', null, array('class'=>'form-control','placeholder'=>'Enter a name for the category')) }}
			</div>
			<p class="text-muted">* required fields</p> 
			{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
			<a href="{{ URL::route('admin.categories.index') }}" class="btn btn-danger">Cancel</a>

		{{ Form::close() }}

	</div>
	<!-- /.col-lg-8 -->
	<div class="col-lg-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				Info Panel
			</div>
			<div class="panel-body">
				<p>Select a name for your new category.</p>
				<hr>
				<p>The name may only contain letters, numbers, spaces, dashes and underscores.</p>
			</div>
		</div>
	</div>
	<!-- /.col-lg-4 -->
</div>
<!-- /.row -->
@stop