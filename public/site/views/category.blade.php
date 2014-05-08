@include('site::_partials/header')

<h2>Category: {{ $category->category }}</h2>
<a href="{{ route('article.list') }}">&laquo; Back to articles</a>	

@if (count($entries) > 0)
	<ul class="articles">
	@foreach ($entries as $entry)
		<li>
			<article>
				@if ($entry->image)
					<figure><a href="{{ route('article', $entry->slug) }}"><img src="{{ Image::thumb($entry->image, 150) }}" alt=""></a></figure>
				@endif

				<h3><a href="{{ route('article', $entry->slug) }}">{{ $entry->title }}</a></h3>
				<h5>Created at {{ $entry->created_at }} &bull; by {{ $entry->author->first_name }} {{ $entry->author->last_name }}</h5>
				<p>{{ Str::limit($entry->body, 100) }}</p>
				<p><a href="{{ route('article', $entry->slug) }}" class="more">Read more</a></p>
			</article>
		</li>
	@endforeach
	</ul>
	
	<a href="{{ route('article.list') }}">&laquo; Back to articles</a>	
@else
	<br><br>
	<p>No posts found for this category.</p>
@endif

@include('site::_partials/footer')