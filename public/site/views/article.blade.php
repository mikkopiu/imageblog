@extends('site::_layouts.default')

@section('main')

<div class="blog-header">
	<h1 class="blog-title">{{ $entry->title }}</h1>
	<p class="lead blog-description">Published at {{ $entry->created_at }} by {{ $entry->author->email }}</p>
</div>

<div class="row">
	<div class="col-sm-12 blog-main">
		@include('admin._partials.notifications')

	@if ($entry->image)
		<img class="img-responsive img-rounded center-block" src="{{ Image::resize($entry->image, 800, 600) }}">
		<hr>
	@endif

		<div>
			{{ $entry->body }}
		</div>
		<br>

	@if (count($comments) > 0)
		<div>
			<h2>Comments</h2>
		@foreach ($comments as $comment)
			<div class="well">
				<span class="small text-muted">{{ date('l jS \of F Y h:i:s A', strtotime($comment->updated_at)) }}</span>
				<p>{{ $comment->body }}</p>
				<span class="text-muted">- {{ $comment->commenter }}</span>
			</div>
		@endforeach
		</div>
	@else
		<p>No comments yet</p>
	@endif

		{{-- Open Form to prepare for saving new page --}}
		{{-- Don't need to define HTTP method, Form functions via POST --}}
		{{ Form::open(array('route'=>'comments.store')) }}
			<div class="form-group">
				{{ Form::label('commenter', 'Name') }}
				{{ Form::text('commenter', null, array('class'=>'form-control','placeholder'=>'Enter your name')) }}
			</div>
			<div class="form-group">
				{{ Form::label('body', 'Comment') }}
				{{ Form::textarea('body', null, array('class'=>'form-control','rows'=>'3','placeholder'=>'Type in your comment')) }}
			</div>
			{{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
			{{ Form::reset('Reset', ['class' => 'btn btn-default']) }}
		{{ Form::close() }}

		<hr>
		<a class="btn btn-default" href="{{ route('article.list') }}">&laquo; Back to articles</a>
	</div>
	<!-- /.col-sm-12 -->
</div>
<!-- /.row -->

@stop