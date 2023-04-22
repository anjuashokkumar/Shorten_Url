<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">


	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ asset('images/icon-48x48.png') }}" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Shorten URLs</title>

	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-link" href="{{route('home')}}">
          			<span class="align-middle">AdminKit</span>
        		</a>

				<ul class="sidebar-nav">
					<li class="sidebar-item {{ Route::is('home') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('home')}}">
              				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            			</a>
					</li>

					<li class="sidebar-item {{ Route::is('url') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('url')}}">
                        	<i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Shorten URLS</span>
            			</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          			<i class="hamburger align-self-center"></i>
        		</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                				<span class="text-dark">{{ Auth::user()->name }}</span>
              				</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="{{ route('logout') }}"
                                	onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="align-middle" data-feather="log-out"></i> Logout
								</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

                	@yield('content')

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-12 text-end">
                        	<p class="text-muted"><strong>Admin</strong> &copy;2023 </p>							
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	@yield('scripts')



</body>

</html>