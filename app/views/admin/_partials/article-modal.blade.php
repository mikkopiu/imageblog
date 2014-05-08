<!-- Article View Modal -->
@foreach ($articles as $i => $article)
<div class="modal fade" id="myModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">{{ $article->title }}</h4>
			</div>
			<!-- /.modal-header -->
			<div class="modal-body">
				@if ($article->image)
					<img class="img-responsive" src="{{ Image::resize($article->image, 858, 643.5) }}" alt="">
				@endif
				@if ($article->body)
					<hr>
					{{ $article->body }}
				@endif
			</div>
			<!-- /.modal-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<a href="{{ URL::route('admin.articles.edit', $article->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
			</div>
			<!-- /.modal-footer -->
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach