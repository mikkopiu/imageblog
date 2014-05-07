@extends('admin._layouts.default')

@section('main')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Edit page - {{ $page->title }}
			{{-- Delete needs to be inside form, as it is POST --}}
			{{ Form::open(array('route' => array('admin.pages.destroy', $page->id), 'method' => 'delete', 'style'=>'display:inline;')) }}

				<button class="btn btn-danger" type="submit" href="{{ URL::route('admin.pages.destroy', $page->id) }}" onclick="if(!confirm('Are you sure you want to delete this item?')){return false;};"><i class="fa fa-times-circle fa-fw"></i>Delete page</button>
				
			{{ Form::close() }}
		</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-8">
		@include('admin._partials.notifications')

		{{ Form::model($page, array('method' => 'put', 'route' => array('admin.pages.update', $page->id))) }}

			<div class="form-group">
				{{ Form::label('title', 'Title') }}
				{{ Form::text('title', null, array('class'=>'form-control','placeholder'=>'Enter title')) }}
			</div>

			<div class="form-group">
				{{ Form::label('body', 'Content') }}
				{{ Form::textarea('body', null, array('class'=>'form-control','rows'=>'10')) }}
			</div>

			{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
			<a href="{{ URL::previous() }}" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Cancel</a>

		{{ Form::close() }}
		<hr>
	</div>
	<!-- /.col-lg-8 -->
	<div class="col-lg-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				Info Panel
			</div>
			<div class="panel-body">
				<p>Select a suitable title for your page.</p>
				<hr>
				<p>Type in the contents.</p>
			</div>
		</div>
	</div>
	<!-- /.col-lg-4 -->
</div>
<!-- /.row -->
@stop