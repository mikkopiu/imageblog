<!doctype html>
<html lang="en-US">
<!-- Default template -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Demo blog - Control panel</title>

	@include('admin._partials.assets.corecss')
	@include('admin._partials.assets.sb-admin_css')
</head>
<body>
	<div id="wrapper" class="clearfix">
		{{-- Navigation sidebar --}}
		@include('admin._partials.navbar')
		{{-- Actual content here --}}
		<div id="page-wrapper">
			@yield('main')
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	@include('admin._partials.assets.corejs')
	{{-- Custom Scripts --}}
	@yield('scripts')
</body>
</html>