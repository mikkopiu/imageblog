<!doctype html>
<html lang="en">
<!-- Default template -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Demo blog - Control panel</title>

	@include('admin._partials.assets.corecss')
</head>
<body>
	<div id="wrapper">
		{{-- Navigation sidebar --}}
		@include('admin._partials.navbar')
		{{-- Actual content here --}}
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Control panel</h1>
					@yield('main')
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	@include('admin._partials.assets.corejs')
</body>
</html>