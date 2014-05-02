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
				@foreach ($pages as $page)
					<tr>
						<td>{{ $page->id }}</td>
						{{-- Creates URL to the specific page --}}
						<td><a href="{{ URL::route('admin.pages.show', $page->id) }}">{{ $page->title }}</a></td>
						<td>{{ $page->created_at }}</td>
						<td>
							<a href="{{ URL::route('admin.pages.edit', $page->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>

							{{-- Editing options --}}
							{{-- Delete needs to be inside form, as it is POST --}}
							{{ Form::open(array('route' => array('admin.pages.destroy', $page->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}

								<button type="submit" href="{{ URL::route('admin.pages.destroy', $page->id) }}" class="btn btn-danger btn-mini">Delete</button>
								
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop