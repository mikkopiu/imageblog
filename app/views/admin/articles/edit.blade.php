@extends('admin._layouts.default')

@section('main')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit post - {{ $article->title }}</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		@include('admin._partials.notifications')
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-8">
		{{ Form::model($article, array('method' => 'put', 'route' => array('admin.articles.update', $article->id), 'files' => true)) }}

			<div class="form-group">
				{{ Form::label('title', 'Title') }}
				{{ Form::text('title', null, array('class'=>'form-control','placeholder'=>'Enter title')) }}
			</div>
			<div class="form-group">
				{{ Form::label('image', 'Image') }}
				<div class="fileupload fileupload-new" data-provides="fileupload">
					<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
						@if ($article->image)
							<a href="<?php echo $article->image; ?>"><img src="<?php echo Image::resize($article->image, 200, 150); ?>" alt=""></a>
						@else
							<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">
						@endif
					</div>
					<div>
						<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>{{ Form::file('image') }}</span>
						<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
					</div>
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('body', 'Description') }}
				{{ Form::textarea('body', null, array('class'=>'form-control','rows'=>'3')) }}
			</div>
			<div class="form-group">
				{{ Form::label('category', 'Category') }}
				{{ Form::select('category', array(
					'1' => 'Category 1',
					'2' => 'Category 2',
					'3' => 'Category 3',
					'4' => 'Category 4',
					'5' => 'Category 5',), null, array('class' => 'form-control')); }}
			</div>
			{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
			<a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>

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
				<p>Select a suitable title for your post and select an image.
				<hr>After that you can choose a category and write a short description.</p>
			</div>
		</div>
	</div>
	<!-- /.col-lg-4 -->
</div>
<!-- /.row -->
@stop