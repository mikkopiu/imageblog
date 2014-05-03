@extends('admin._layouts.default')

@section('main')
<!-- Modals -->
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
					<hr>
				@endif
				{{ $article->body }}
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
<!-- Data table -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Articles <a href="{{ URL::route('admin.articles.create') }}" class="btn btn-success"><i class="fa fa-plus-square-o fa-fw"></i> Add new article</a></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		{{ Notification::showAll() }}

		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>When</th>
					<th><i class="fa fa-cog fa-fw"></i></th>
				</tr>
			</thead>
			<tbody>
				{{-- Create table data for all pages --}}
				@foreach ($articles as $i => $article)
					<tr>
						<td>{{ $article->id }}</td>
						{{-- Creates URL to the specific article --}}
						<td><a data-toggle="modal" data-target="#myModal{{$i}}">{{ $article->title }}</a></td>
						<!--<td><a href="{{ URL::route('admin.articles.show', $article->id) }}">{{ $article->title }}</a></td>-->
						<td>{{ $article->created_at }}</td>
						<td>
							<a href="{{ URL::route('admin.articles.edit', $article->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
							{{-- Editing options --}}
							{{-- Delete needs to be inside form, as it is POST --}}
							{{ Form::open(array('route' => array('admin.articles.destroy', $article->id), 'method' => 'delete')) }}

								<button type="submit" href="{{ URL::route('admin.articles.destroy', $article->id) }}" class="btn btn-danger btn-mini" onclick="if(!confirm('Are you sure you want to delete this item?')){return false;};">Delete</button>
								
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop