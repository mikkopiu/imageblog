<div class="blog-masthead">
	<div class="container">
		<nav class="blog-nav">
			<a class="blog-nav-item {{ (Route::is('article.list') or Route::is('article')) ? 'active' : null }}" href="{{ route('article.list') }}">Blog</a>
			<a class="blog-nav-item {{ (Route::is('page') and Request::segment(1) == 'about-us') ? 'active' : null }}" href="{{ route('page', 'about-us') }}">About us</a>
			<a class="blog-nav-item {{ (Route::is('page') and Request::segment(1) == 'contact') ? 'active' : null }}" href="{{ route('page', 'contact') }}">Contact</a>
			<a class="blog-nav-item btn btn-primary pull-right" href="{{ URL::route('admin.dashboard') }}">Control Panel</a>
		</nav>
	</div>
</div>