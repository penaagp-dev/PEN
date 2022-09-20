<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themekita.com/demo-atlantis-bootstrap/livepreview/examples/demo1/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jun 2022 15:19:56 GMT -->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Atlantis Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	@include('Layouts.Styles')
</head>
<body>
	@include('sweetalert::alert')
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header" data-background-color="blue">
				<a href="index-2.html" class="logo">
					<img src="https://themekita.com/demo-atlantis-bootstrap/livepreview/examples/assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-user"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			@include('Layouts.Navbar')
		</div>

		@include('Layouts.Sidebar')
		<div class="main-panel">
			<div class="container">
				@yield('content')
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="http://www.themekita.com/">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://www.themekita.com/">ThemeKita</a>
					</div>				
				</div>
			</footer>
		</div>
	</div>
</body>
@yield('js')
@include('Layouts.Scripts')
</html>