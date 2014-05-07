@include('site::_partials/header')

<article>
	<h3>{{ $entry->title }}</h3>
	<h5>Published at {{ $entry->created_at }} &bull; by {{ $entry->author->email }}</h5>
	{{ $entry->body }}

	<hr>

	@if ($entry->image)
		<figure><img src="{{ Image::resize($entry->image, 800, 600) }}" alt=""></figure>
		<hr>
	@endif
	
	@if (count($comments) > 0)
		<div>
			<h4>Comments</h4>
		@foreach ($comments as $comment)
			<p>{{ $comment->body }}</p>
			<footer>- {{ $comment->commenter }}</footer>
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

	<a href="{{ route('article.list') }}">&laquo; Back to articles</a>
</article>

@include('site::_partials/footer')