@extends('admin._layouts.default')

@section('main')

@include('admin._partials.article-modal')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Posts <a href="{{ URL::route('admin.articles.create') }}" class="btn btn-success"><i class="fa fa-plus-square-o fa-fw"></i> Add new post</a></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<!-- Data table -->
<div class="row">
	<div class="col-lg-12">
	{{ Notification::showAll() }}
	@if (count($articles) > 0)
		<div class="form-group col-lg-3" style="padding-left:0;">
			<label class="control-label">Filter by title</label>
			<div class="input-group">
				<span class="input-group-addon"><span id="searchIcon" class="glyphicon glyphicon-search"></span></span>
				<input id="titleFilter" class="form-control" type="text" name="search_title" placeholder="e.g. {{ $articles[0]->title }}" />
			</div>
		</div>
		<div class="form-group col-lg-2" style="padding-left:0;">
			<label class="control-label">Filter by category</label>
			<div class="input-group">
				<span class="input-group-addon"><span id="searchIcon" class="glyphicon glyphicon-search"></span></span>
				<select id="categoryFilter" class="form-control" name="search_category">
					<option value="" selected>Select a category</option>
					@foreach ($categories as $category)
						<option value="{{ $category }}">{{ $category }}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<table class="table table-striped table-hover" id="articleTable">
			<thead>
				<tr>
					<th class="col-md-3">Title</th>
					<th class="col-md-2">Category</th>
					<th>Posted</th>
					<th>Updated</th>					
					<th>Comments</th>
					<th><i class="fa fa-cog fa-fw"></i></th>
				</tr>
			</thead>
			<tbody>
				{{-- Create table data for all pages --}}
				@foreach ($articles as $i => $article)
					<tr>
						{{-- Creates URL to the specific article --}}
						<td><a data-toggle="modal" data-target="#myModal{{$i}}">{{ $article->title }}</a></td>
						{{-- First category refers to method, second to property --}}
						<td>
						@if ($article->category)
							{{ $article->category->category }}
						@else
							No category set
						@endif
						</td>
						<td>{{ $article->created_at }}</td>
						<td>{{ $article->updated_at }}</td>
						<td>
							@if (count($article->comments) > 0)
								<a class="btn btn-info btn-sm" href="{{ URL::route('admin.articles.show', $article->id) }}">({{ count($article->comments) }}) comments</a>
							@else
								<button type="button" class="btn btn-info btn-sm" disabled="disabled">(0) comments</button>
							@endif
						</td>
						<td>
							<a class="btn btn-primary btn-sm" href="{{ URL::route('article', $article->slug) }}">View</a>
							<a class="btn btn-success btn-sm" href="{{ URL::route('admin.articles.edit', $article->id) }}">Edit</a>
							{{-- Delete needs to be inside form, as it is POST --}}
							{{ Form::open(array('route' => array('admin.articles.destroy', $article->id), 'method' => 'delete', 'style'=>'display:inline;')) }}

								<button class="btn btn-danger btn-sm" type="submit" href="{{ URL::route('admin.articles.destroy', $article->id) }}"  onclick="if(!confirm('Are you sure you want to delete this item?')){return false;};"><i class="fa fa-times-circle fa-fw"></i>Delete</button>
								
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="well">
			<h5 class="text-center">
				No posts yet, create one now!
				<hr>
				<a href="{{ URL::route('admin.articles.create') }}" class="btn btn-success"><i class="fa fa-plus-square-o fa-fw"></i> Add new post</a>
			</h5>
		</div>
	@endif
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop
@if (count($articles) > 0)
	@section('scripts')
	<!-- Init for table pagination -->
	<script type="text/javascript">
		var asInitVals = new Array();

		/* Table initialisation */
		$(document).ready(function() {
			var oTable = $('#articleTable').dataTable( {
				"oLanguage": {
					"sSearch": "Search all columns:"
				},
				"bSort": true,
				"aoColumnDefs": [
					{ "bSortable": false, "aTargets": [ 5 ] }
				],
				"aaSorting": [[3, "desc"], [0, "desc"]],
				"iDisplayLength": 10,	//records per page
				"sDom": "t<'row'<'col-md-12 pull-right'ip>>",
				"sPaginationType": "bootstrap",
			});

			
			$("#titleFilter").keyup( function () {
				/* Filter the name column (index = 1) */
				oTable.fnFilter( this.value, 0 );
			});

			$("#categoryFilter").change( function () {
				/* Filter the name column (index = 1) */
				oTable.fnFilter( this.value, 1 );
			});

		} );
	</script>
	@stop
@endif