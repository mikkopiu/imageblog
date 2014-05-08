@extends('admin._layouts.default')

@section('main')
@include('admin._partials.category-create-modal')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add new post <a href="{{ URL::route('admin.articles.index') }}" class="btn btn-default">Return</a></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-8">
		@include('admin._partials.notifications')

		@include('admin._partials.article-form')

	</div>
	<!-- /.col-lg-12 -->
	<div class="col-lg-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				Info Panel
			</div>
			<div class="panel-body">
				<p>Select a suitable title for your post and select an image.</p>
				<hr>
				<p>After that you can choose a category and write a short description.</p>
			</div>
		</div>
	</div>
	<!-- /.col-lg-4 -->
</div>
<!-- /.row -->
	
@stop
@section('scripts')

<script src="{{ URL::asset('ckeditor/ckeditor.js') }}"></script>
<script>
	// Replace the <textarea id="editor-area"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace( 'editor-area', {
		toolbar: 'Basic',
		uiColor: '#DDDDDD'
	});
</script>
@stop