@extends('site::_layouts.default')

@section('main')
	<div class="blog-header">
		<h1 class="blog-title">Default Photo Blog</h1>
		<p class="lead blog-description">An example blog for photo-bloggers.</p>
	</div>

	<div class="row">

		<div class="col-sm-8 blog-main">
		@foreach ($entries as $entry)
			<div class="blog-post">
				<h2 class="blog-post-title">{{ $entry->title }}</h2>
				<p class="blog-post-meta small">
					{{ date('l jS \of F Y h:i:s A', strtotime($entry->created_at)) }} by {{ $entry->author->first_name }} {{ $entry->author->last_name }}
				</p>
			@if ($entry->image)
				<figure><a href="{{ route('article', $entry->slug) }}"><img src="{{ Image::thumb($entry->image, 300) }}"></a></figure>
			@endif
				<p>{{ Str::limit($entry->body, 100) }}</p>
				<p><a href="{{ route('article', $entry->slug) }}" class="more">Read more</a></p>
			</div><!-- /.blog-post -->
		@endforeach
			<!-- Pagination -->
			{{ $entries->links() }}

		</div><!-- /.blog-main -->

		<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
			<div class="sidebar-module">
				<h4>Categories</h4>
				<ol class="list-unstyled">
				@foreach ($categories as $category)
					<li><a href="{{ route('category.list', $category->id) }}">{{ $category->category }}</a></li>
				@endforeach
				</ol>
			</div>
		</div><!-- /.blog-sidebar -->

	</div><!-- /.row -->
@stop
@section('scripts')

	<script>
		var paginationUl = $('div.pagination').children('ul')[0];
		$(paginationUl).addClass('pagination');
	</script>

@stop