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
		<div class="form-group">
			<label class="control-label">Filter by title</label>
			<div class="input-group">
				<span class="input-group-addon"><span id="searchIcon" class="glyphicon glyphicon-search"></span></span>
				<input id="titleFilter" class="form-control" type="text" name="search_name" placeholder="e.g. {{ $articles[0]->title }}" />
			</div>
		</div>

		<table class="table table-striped" id="articleTable">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Posted</th>
					<th>Updated</th>
					<th>Category</th>
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
						<td>{{ $article->updated_at }}</td>
						<td>{{ $article->category }}</td>
						<td>
							<a class="btn btn-success" href="{{ URL::route('admin.articles.edit', $article->id) }}">Edit</a>
							{{-- Delete needs to be inside form, as it is POST --}}
							{{ Form::open(array('route' => array('admin.articles.destroy', $article->id), 'method' => 'delete', 'style'=>'display:inline;')) }}

								<button class="btn btn-danger" type="submit" href="{{ URL::route('admin.articles.destroy', $article->id) }}"  onclick="if(!confirm('Are you sure you want to delete this item?')){return false;};"><i class="fa fa-times-circle fa-fw"></i>Delete</button>
								
							{{ Form::close() }}
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
				"bSort": true,			// Disable sorting
				"aoColumnDefs": [
					{ "bSortable": false, "aTargets": [ 5 ] } 
				],
				"iDisplayLength": 10,	//records per page
				"sDom": "t<'row'<'col-md-12 pull-right'ip>>",
				"sPaginationType": "bootstrap",
			});

			
			$("#titleFilter").keyup( function () {
				/* Filter the name column (index = 1) */
				oTable.fnFilter( this.value, 1 );
			});

			$("#categoryFilter").keyup( function () {
				/* Filter the name column (index = 1) */
				oTable.fnFilter( this.value, 4 );
			});

		} );
	</script>
	@stop
@endif