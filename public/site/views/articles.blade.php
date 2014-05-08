@extends('site::_layouts.default')

@section('main')

<div class="blog-header">
	<h1 class="blog-title">Default Photo Blog</h1>
	<p class="lead blog-description">An example blog for photo-bloggers.</p>
</div>

<div class="row">

	<div class="col-sm-9 blog-main">
	@foreach ($entries as $i => $entry)
		<div class="blog-post col-sm-5 {{ (($i+1) % 2 === 0) ? 'col-sm-offset-2' : null }}">
			<h2 class="blog-post-title">{{ Str::limit($entry->title, 10) }}</h2>
			<p class="blog-post-meta small">
				{{ date('l jS \of F Y h:i:s A', strtotime($entry->created_at)) }} by {{ $entry->author->first_name }} {{ $entry->author->last_name }}
			</p>
		@if ($entry->image)
			<a href="{{ route('article', $entry->slug) }}"><img class="img-responsive img-rounded" src="{{ Image::thumb($entry->image, 300) }}"></a>
		@endif
			<p>{{ Str::limit($entry->body, 100) }}</p>
			<p><a href="{{ route('article', $entry->slug) }}" class="more">Read more</a></p>
		</div>
		<!-- /.blog-post -->
	@endforeach
		<div class="col-sm-12">
			<!-- Pagination -->
			{{ $entries->links() }}
		</div>
	</div>
	<!-- /.blog-main -->

	<div class="col-sm-3 blog-sidebar well">
		<div class="sidebar-module">
			<h4>Categories</h4>
			<ol class="list-unstyled">
			@foreach ($categories as $category)
				@if (count($category->articles) > 0)
				<li>
					<a href="{{ route('category.list', $category->id) }}">{{ $category->category }} ({{ count($category->articles) }} posts)</a>
				</li>
				@endif
			@endforeach
			</ol>
		</div>
	</div>
	<!-- /.blog-sidebar -->

</div>

@stop
@section('scripts')

<script>
	var paginationUl = $('div.pagination').children('ul')[0];
	$(paginationUl).addClass('pagination');
</script>

@stop