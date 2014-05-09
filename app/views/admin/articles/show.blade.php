@extends('admin._layouts.default')

@section('main')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">{{ $article->title}} - Comments <a href="{{ URL::route('admin.articles.index') }}" class="btn btn-default">Return</a></h1>
		@include('admin._partials.notifications')
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		@if (count($comments) > 0)
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="col-md-6">Comment</th>
						<th class="col-md-1">Commenter</th>
						<th class="col-md-1">Posted</th>
						<th class="col-md-1">Options</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($comments as $comment)
					<tr>
						<td>{{ $comment->body }}</td>
						<td>{{ $comment->commenter }}</td>
						<td>{{ $comment->created_at }}</td>
						<td>
							{{-- Delete needs to be inside form, as it is POST --}}
							{{ Form::open(array('route' => array('comments.destroy', $comment->id), 'method' => 'delete', 'style'=>'display:inline;')) }}
								@if (Sentry::getUser()->hasAnyAccess(['admin.comments.destroy']))
									<button class="btn btn-danger btn-mini" type="submit" href="{{ URL::route('comments.destroy', $comment->id) }}" onclick="if(!confirm('Are you sure you want to delete this comment?')){return false;};"><i class="fa fa-times-circle fa-fw"></i>Delete</button>
								@else
									<button class="btn btn-default" type="button" disabled>Only admins can delete comments</button>
								@endif
								
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		@else
			<div class="well">
				<p class="text-muted">No comments found</p>
			</div>
		@endif
	</div>
</div>
<!-- /.row -->
@stop