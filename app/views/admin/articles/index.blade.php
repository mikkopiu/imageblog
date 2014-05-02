@extends('admin._layouts.default')

@section('main')
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
				@foreach ($articles as $article)
					<tr>
						<td>{{ $article->id }}</td>
						{{-- Creates URL to the specific article --}}
						<td><a href="{{ URL::route('admin.articles.show', $article->id) }}">{{ $article->title }}</a></td>
						<td>{{ $article->created_at }}</td>
						<td>
							<a href="{{ URL::route('admin.articles.edit', $article->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>

							{{-- Editing options --}}
							{{-- Delete needs to be inside form, as it is POST --}}
							{{ Form::open(array('route' => array('admin.articles.destroy', $article->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}

								<button type="submit" href="{{ URL::route('admin.articles.destroy', $article->id) }}" class="btn btn-danger btn-mini">Delete</button>
								
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop