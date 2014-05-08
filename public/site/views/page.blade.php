@extends('site::_layouts.default')

@section('main')

<div class="blog-header">
	<h1 class="blog-title">{{ $entry->title }}</h1>
</div>

<div class="row">
	<div class="col-sm-12 blog-main">
		{{ $entry->body }}
	</div>
	<!-- /.col-sm-12 -->
</div>
<!-- /.row -->

@stop