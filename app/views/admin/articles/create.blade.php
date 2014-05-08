@extends('admin._layouts.default')

@section('main')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add new post <a href="{{ URL::route('admin.articles.index') }}" class="btn btn-default">Return</a></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		@include('admin._partials.notifications')

		@include('admin._partials.article-form')

	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
	
@stop