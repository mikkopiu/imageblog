<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Default Photo Blog</title>

	@include('site::_partials.assets.corecss')
</head>
<body>
	@include('site::_partials.header')

	<div class="container">
		@yield('main')
	</div>
	<!-- /.container -->

	@include('site::_partials.footer')

	@include('site::_partials.assets.corejs')

	@yield('scripts')
</body>
</html>
