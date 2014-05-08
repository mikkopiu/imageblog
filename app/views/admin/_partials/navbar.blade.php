<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="{{ URL::route('admin.dashboard') }}">Demo blog - Control Panel</a>
	</div>
	<!-- /.navbar-header -->

	<ul class="nav navbar-top-links navbar-right">
		<li>
			<a href="{{ URL('/') }}">
				<i class="fa fa-desktop fa-fw"></i> Site</i>
			</a>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="fa fa-user fa-fw"></i> User <i class="fa fa-caret-down"></i>
			</a>
			<ul class="dropdown-menu dropdown-user">
			<!--
				<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
				</li>
				<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
				</li>
				<li class="divider"></li>
			-->
				<li><a href="{{ URL::route('admin.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
				</li>
			</ul>
			<!-- /.dropdown-user -->
		</li>
		<!-- /.dropdown -->
	</ul>
	<!-- /.navbar-top-links -->

	<div class="navbar-default navbar-static-side" role="navigation">
		<div class="sidebar-collapse">
			<ul class="nav" id="side-menu">
				</li>
				<li class="{{ Request::is('admin/dashboard') ? 'active' : null }}">
					<a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
				</li>
				<li class="{{ Request::is('admin/articles*') ? 'active' : null }}">
					<a href="{{ URL::route('admin.articles.index') }}"><i class="fa fa-edit fa-fw"></i> Posts</a>
				</li>
				<li class="{{ Request::is('admin/categories*') ? 'active' : null }}">
					<a href="{{ URL::route('admin.categories.index') }}"><i class="fa fa-inbox fa-fw"></i> Categories</a>
				</li>
				<!--
				<li>
					<a href="tables.html"><i class="fa fa-comments-o fa-fw"></i> Comments</a>
				</li>
				-->
				<li class="{{ Request::is('admin/pages*') ? 'active' : null }}">
					<a href="{{ URL::route('admin.pages.index') }}"><i class="fa fa-files-o fa-fw"></i> Pages</a>
				</li>
				<!--
				<li>
					<a href="forms.html"><i class="fa fa-eye fa-fw"></i> Appearance</a>
				</li>
				<li>
					<a href="forms.html"><i class="fa fa-cog fa-fw"></i> Settings</a>
				</li>
				-->
			</ul>
			<!-- /#side-menu -->
		</div>
		<!-- /.sidebar-collapse -->
	</div>
	<!-- /.navbar-static-side -->
</nav>