@extends('site::_layouts.default')

@section('main')

<div class="blog-header">
	<h1 class="blog-title">404</h1>
</div>
<!-- /.blog-header -->

<div class="row">
	<div class="col-sm-12 blog-main">
		@include('admin._partials.notifications')
		<p>Whoops, something went wrong and the page you requested couldn't be found.</p>
	</div>
	<!-- /.col-sm-12 -->
</div>
<!-- /.row -->

@stop