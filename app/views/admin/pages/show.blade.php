@extends('admin._layouts.default')

@section('main')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Preview page <a href="{{ URL::previous() }}" class="btn btn-default">Return</a></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row well">
	<div class="col-lg-12">
		<h2 class="page-header">{{ $page->title }}</h2>
	</div>
	<!-- /.col-lg-12 -->
	<div class="col-lg-12">
		{{ $page->body }}
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop