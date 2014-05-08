@extends('admin._layouts.default')

@section('main')
@include('admin._partials.category-create-modal')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Edit post - {{ $article->title }}
			{{-- Delete needs to be inside form, as it is POST --}}
			{{ Form::open(array('route' => array('admin.articles.destroy', $article->id), 'method' => 'delete', 'style'=>'display:inline;')) }}

				<button class="btn btn-danger" type="submit" href="{{ URL::route('admin.articles.destroy', $article->id) }}"  onclick="if(!confirm('Are you sure you want to delete this item?')){return false;};"><i class="fa fa-times-circle fa-fw"></i>Delete</button>
				
			{{ Form::close() }}
		</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-8">
		@include('admin._partials.notifications')

		{{-- ::model fills form with existing information --}}
		{{ Form::model($article, array('method' => 'put', 'route' => array('admin.articles.update', $article->id), 'files' => true)) }}

			<div class="form-group">
				{{ Form::label('title', 'Title *') }}
				{{ Form::text('title', null, array('class'=>'form-control','placeholder'=>'Enter title')) }}
			</div>
			<div class="form-group">
				{{ Form::label('image', 'Image') }}<br>

				{{-- fileinput from Jasny's Bootstrap --}}
			@if ($article->image)
				<div class="fileinput fileinput-exists" data-provides="fileinput">
			@else
				<div class="fileinput fileinput-new" data-provides="fileinput">
			@endif
					<div class="fileinput-new thumbnail" style="width: 200px;">
						<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">
					</div>
					<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px;">
						@if ($article->image)
							<a href="<?php echo $article->image; ?>"><img class="img-responsive" src="<?php echo Image::resize($article->image, 200, 150); ?>" alt="Post image"></a>
						@endif
					</div>
					<div>
						<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{{ Form::file('image') }}</span>
						<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
					</div>
				</div>
				<!-- /.fileinput -->

			</div>
			<div class="form-group">
				{{ Form::label('body', 'Description') }}
				{{ Form::textarea('body', null, array('class'=>'form-control','rows'=>'4')) }}
			</div>
			<div class="form-group">
				{{ Form::label('category', 'Category *') }}
				{{ Form::select('category', $categories, $article->category, array('class' => 'form-control')); }}
				<br>
				<a class="btn btn-default" data-toggle="modal" data-target="#categoryModal">Add new category</a>
			</div>
			<p class="text-muted">* required fields</p>
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
				<p>Select a suitable title for your post and select an image.</p>
				<hr>
				<p>After that you can choose a category and write a short description.</p>
			</div>
		</div>
	</div>
	<!-- /.col-lg-4 -->
</div>
<!-- /.row -->
@stop