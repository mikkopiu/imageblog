@extends('admin._layouts.default')

@section('main')

@include('admin._partials.article-modal')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<!-- Greeting panel -->
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Welcome to the Dashboard!</h4>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<p>Make a quick post below or edit your existings posts and pages.</p>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-8">
		<!-- Quick post panel -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-plus fa-fw"></i> Quick Post
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						@include('admin._partials.notifications')

						@include('admin._partials.article-form')
					</div>
				</div>
				<!-- /.row (nested) -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-8 -->
	
	<div class="col-lg-4">
		<!-- Notifications panel 
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-bell fa-fw"></i> Notifications Panel
			</div>
			<div class="panel-body">
				<div class="list-group">
					<a href="#" class="list-group-item">
						<i class="fa fa-comment fa-fw"></i> New Comment
						<span class="pull-right text-muted small"><em>4 minutes ago</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-twitter fa-fw"></i> 3 New Followers
						<span class="pull-right text-muted small"><em>12 minutes ago</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-envelope fa-fw"></i> Message Sent
						<span class="pull-right text-muted small"><em>27 minutes ago</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-tasks fa-fw"></i> New Task
						<span class="pull-right text-muted small"><em>43 minutes ago</em>
						</span>
					</a>
				</div>
				<a href="#" class="btn btn-default btn-block">View All Alerts</a>
			</div>
		</div>
		 -->
		<!-- Newest posts panel -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-edit fa-fw"></i> Newest Posts
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
				@if (count($articles) > 0)
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Updated</th>
								<th><i class="fa fa-cog fa-fw"></i></th>
							</tr>
						</thead>
						<tbody>
							{{-- Create table data for all posts --}}
							@foreach ($articles as $i => $article)
								<tr>
									<td>{{ $article->id }}</td>
									{{-- Creates URL to the specific post --}}
									<td><a data-toggle="modal" data-target="#myModal{{$i}}">{{ $article->title }}</a></td>
									<td>{{ $article->updated_at }}</td>
									<td>
										<a class="btn btn-success btn-xs" href="{{ URL::route('admin.articles.edit', $article->id) }}">Edit</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<div class="well">
						<h5 class="text-center">
							No posts yet, create one!
							<hr>
							<a href="{{ URL::route('admin.articles.create') }}" class="btn btn-success"><i class="fa fa-plus-square-o fa-fw"></i> Add new post</a>
						</h5>							
					</div>
				@endif
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
		<!-- Pages panel -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-files-o fa-fw"></i> Pages
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
				@if (count($pages) > 0)
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Updated</th>
								<th><i class="fa fa-cog fa-fw"></i></th>
							</tr>
						</thead>
						<tbody>
							{{-- Create table data for all pages --}}
							@foreach ($pages as $page)
								<tr>
									<td>{{ $page->id }}</td>
									{{-- Creates URL to the specific page --}}
									<td><a href="{{ URL::route('admin.pages.show', $page->id) }}">{{ $page->title }}</a></td>
									<td>{{ $page->updated_at }}</td>
									<td>
										<a class="btn btn-success btn-xs" href="{{ URL::route('admin.pages.edit', $page->id) }}">Edit</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<div class="well">
						<h5 class="text-center">
							No pages yet, create one!
							<hr>
							<a href="{{ URL::route('admin.pages.create') }}" class="btn btn-success"><i class="fa fa-plus-square-o fa-fw"></i> Create a new page</a>
						</h5>							
					</div>
				@endif
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-4 -->
</div>
<!-- /.row -->
@stop