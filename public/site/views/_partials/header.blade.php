<div class="blog-masthead">
	<div class="container">
		<nav class="blog-nav">
			<a class="blog-nav-item {{ (Route::is('article.list') or Route::is('article')) ? 'active' : null }}" href="{{ route('article.list') }}">Blog</a>
		@foreach ($pages as $page)
			<a class="blog-nav-item {{ (Route::is('page') and Request::segment(1) == $page->slug) ? 'active' : null }}" href="{{ route('page', $page->slug) }}">{{ $page->title }}</a>
		@endforeach
			<a class="blog-nav-item btn btn-primary pull-right" href="{{ URL::route('admin.dashboard') }}">Control Panel</a>
		</nav>
	</div>
</div>