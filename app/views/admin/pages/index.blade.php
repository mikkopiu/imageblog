@extends('admin._layouts.default')

@section('main')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Pages <a href="{{ URL::route('admin.pages.create') }}" class="btn btn-success"><i class="fa fa-plus-square-o fa-fw"></i> Add new page</a></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		{{ Notification::showAll() }}
	@if (count($pages) > 0)
		<table class="table table-striped table-hover" id="pageTable">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Created</th>
					<th>Updated</th>
					<th><i class="fa fa-cog fa-fw"></i></th>
				</tr>
			</thead>
			<tbody>
				{{-- Create table data for all pages --}}
				@foreach ($pages as $page)
					<tr>
						<td class="text-muted">{{ $page->id }}</td>
						{{-- Creates URL to the specific page --}}
						<td><a href="{{ URL::route('admin.pages.show', $page->id) }}">{{ $page->title }}</a></td>
						<td>{{ $page->created_at }}</td>
						<td>{{ $page->updated_at }}</td>
						<td>
							<a class="btn btn-success btn-sm" href="{{ URL::route('admin.pages.edit', $page->id) }}">Edit</a>
							{{-- Delete needs to be inside form, as it is POST --}}
							{{ Form::open(array('route' => array('admin.pages.destroy', $page->id), 'method' => 'delete', 'style'=>'display:inline;')) }}

								<button class="btn btn-danger btn-sm" type="submit" href="{{ URL::route('admin.pages.destroy', $page->id) }}" onclick="if(!confirm('Are you sure you want to delete this item?')){return false;};"><i class="fa fa-times-circle fa-fw"></i>Delete</button>
								
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
</div>
@stop
@if (count($pages) > 0)
	@section('scripts')
	<!-- Init for table pagination -->
	<script type="text/javascript">
		var asInitVals = new Array();

		/* Table initialisation */
		$(document).ready(function() {
			var oTable = $('#pageTable').dataTable( {
				"oLanguage": {
					"sSearch": "Search all columns:"
				},
				"bSort": true,
				"aoColumnDefs": [
					{ "bSortable": false, "aTargets": [ 4 ] } 
				],
				"iDisplayLength": 10,	//records per page
				"sDom": "t<'row'<'col-md-12 pull-right'ip>>",
				"sPaginationType": "bootstrap",
			});

		} );
	</script>
	@stop
@endif