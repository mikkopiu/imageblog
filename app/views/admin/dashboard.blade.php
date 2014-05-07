@extends('admin._layouts.default')

@section('main')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-edit fa-fw"></i> Newest Posts
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
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
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-plus-square-o fa-fw"></i> Quick Post
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						@include('admin._partials.notifications')

						{{ Form::open(array('route' => 'admin.articles.store')) }}
							<div class="form-group">
								{{ Form::label('title', 'Title') }}
								{{ Form::text('title', null, array('class'=>'form-control','placeholder'=>'Enter title')) }}
							</div>
							<div class="form-group">
								{{ Form::label('image', 'Image') }}
								{{ Form::file('image') }}
							</div>
							<div class="form-group">
								{{ Form::label('body', 'Description') }}
								{{ Form::textarea('body', null, array('class'=>'form-control','rows'=>'3')) }}
							</div>
							<div class="form-group">
								{{ Form::label('category', 'Category') }}
								{{ Form::select('category', array(
									'1' => 'Category 1',
									'2' => 'Category 2',
									'3' => 'Category 3',
									'4' => 'Category 4',
									'5' => 'Category 5',), null, array('class' => 'form-control')); }}
							</div>
							{{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
							{{ Form::reset('Reset', ['class' => 'btn btn-default']) }}
						{{ Form::close() }}
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
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-bell fa-fw"></i> Notifications Panel
			</div>
			<!-- /.panel-heading -->
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
				<!-- /.list-group -->
				<a href="#" class="btn btn-default btn-block">View All Alerts</a>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-files-o fa-fw"></i> Pages
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Username</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Jacob</td>
								<td>Thornton</td>
								<td>@fat</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Larry</td>
								<td>the Bird</td>
								<td>@twitter</td>
							</tr>
						</tbody>
					</table>
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