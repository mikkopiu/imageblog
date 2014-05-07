<!doctype html>
<html lang="en-US">
<!-- Default template -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Demo blog - Control panel</title>

	@include('admin._partials.assets.corecss')
</head>
<body>
	<div id="wrapper">
		{{-- Actual content here --}}
		<div id="page-wrapper">
			@yield('main')
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	@include('admin._partials.assets.corejs')
</body>
</html>