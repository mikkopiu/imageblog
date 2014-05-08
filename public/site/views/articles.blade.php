@include('site::_partials/header')

<h2>Posts</h2>

<hr>

<ul class="categories">
@foreach ($categories as $category)
	<li><a href="{{ route('category.list', $category->id) }}">{{ $category->category }}</a></li>
@endforeach
</ul>

<ul class="articles">
@foreach ($entries as $entry)
	<li>
		<article>
			@if ($entry->image)
				<figure><a href="{{ route('article', $entry->slug) }}"><img src="{{ Image::thumb($entry->image, 150) }}" alt=""></a></figure>
			@endif

			<h3><a href="{{ route('article', $entry->slug) }}">{{ $entry->title }}</a></h3>
			<p>Category:
			@if ($entry->category)
				{{ $entry->category->category }}
			@else
				(not set)
			@endif</p>
			<h5>Created at {{ $entry->created_at }} &bull; by {{ $entry->author->first_name }} {{ $entry->author->last_name }}</h5>
			<p>{{ Str::limit($entry->body, 100) }}</p>
			<p><a href="{{ route('article', $entry->slug) }}" class="more">Read more</a></p>
		</article>
	</li>
@endforeach
</ul>

@include('site::_partials/footer')