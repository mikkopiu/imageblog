@extends('admin._layouts.default')

@section('main')

@include('admin._partials.category-modal')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Categories <a href="{{ URL::route('admin.categories.create') }}" class="btn btn-success"><i class="fa fa-plus-square-o fa-fw"></i> Add new category</a></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		{{ Notification::showAll() }}
	@if (count($categories) > 0)
		<table class="table table-striped table-hover" id="categoryTable">
			<thead>
				<tr>
					<th>Name</th>
					<th>Created</th>
					<th class="col-md-1">Posts</th>
					<th class="col-md-2"><i class="fa fa-cog fa-fw"></i></th>
				</tr>
			</thead>
			<tbody>
				{{-- Create table data for all categories --}}
				@foreach ($categories as $i => $category)
					<tr>
						<td><a data-toggle="modal" data-target="#myModal{{$i}}">{{ $category->category }}</a></td>
						<td>{{ $category->created_at }}</td>
						<td>{{ count($category->articles) }}</td>
						<td>
							<a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal{{$i}}">Edit</a>

							{{-- Delete needs to be inside form, as it is POST --}}
							{{ Form::open(array('route' => array('admin.categories.destroy', $category->id), 'method' => 'delete', 'style'=>'display:inline;')) }}

								<button class="btn btn-danger btn-sm" type="submit" data-container="body" data-toggle="popover" data-placement="top" data-content="By deleting a category, you only clear the category fields of the corresponding posts."><i class="fa fa-times-circle fa-fw"></i>Delete</button>
								
							{{ Form::close() }}
							
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="well">
			<h5 class="text-center">
				No categories yet, create one!
				<hr>
				<a href="{{ URL::route('admin.categories.create') }}" class="btn btn-success"><i class="fa fa-plus-square-o fa-fw"></i> Create a new category</a>
			</h5>
		</div>
	@endif
	</div>
</div>
@stop
@if (count($categories) > 0)
	@section('scripts')
	<!-- Init for table pagination -->
	<script type="text/javascript">
		var asInitVals = new Array();

		/* Table initialisation */
		$(document).ready(function() {
			var oTable = $('#categoryTable').dataTable( {
				"oLanguage": {
					"sSearch": "Search all columns:"
				},
				"bSort": true,			// Disable sorting
				"aoColumnDefs": [
					{ "bSortable": false, "aTargets": [ 3 ] } 
				],
				"iDisplayLength": 10,	//records per page
				"sDom": "t<'row'<'col-md-12 pull-right'ip>>",
				"sPaginationType": "bootstrap",
			});

			$('[data-toggle="popover"]').popover({
				trigger: 'hover',
				html: 'true',
				title : '<span class="text-info"><strong>Are you sure?</strong></span>'
			});
		} );
	</script>
	@stop
@endif