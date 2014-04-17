<!doctype html>
<html lang="en">
<!-- Default template -->
<head>
	<meta charset="utf-8">
	<title>Demo blog</title>

	@include('admin._partials.assets')
</head>
<body>
<div class="container">
	@yield('admin._partials.header')
	{{-- Actual content here --}}
	@yield('main')
</div>
</body>
</html>