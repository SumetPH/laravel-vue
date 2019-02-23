<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title>ระบบส่งเอกสารเพื่อขอกำหนดแต่งตั้งตำแหน่งทางวิชาการ</title>
	<!-- Favicon -->
	<link href="/assets/img/brand/favicon.png" rel="icon" type="image/png">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Icons -->
	<link href="/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
	<link href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
	<!-- Argon CSS -->
	<link type="text/css" href="/assets/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body class="bg-default">
	<div class="main-content">
		<!-- Navbar -->
		<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
			<div class="container px-4">
				<a class="navbar-brand" href="/">
					<img src="/assets/img/brand/logo-white.png" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main"
				 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar-collapse-main">
					<!-- Collapse header -->
					<div class="navbar-collapse-header d-md-none">
						<div class="row">
							<div class="col-6 collapse-brand">
								<a href="#">
									<img src="/assets/img/brand/logo-primary.png">
								</a>
							</div>
							<div class="col-6 collapse-close">
								<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main"
								 aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
									<span></span>
									<span></span>
								</button>
							</div>
						</div>
					</div>
					<!-- Navbar items -->
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link nav-link-icon" href="/register">
								<i class="ni ni-circle-08"></i>
								<span class="nav-link-inner--text">สมัครสมาชิก</span>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown"
							 aria-haspopup="true" aria-expanded="false">
								<i class="ni ni-key-25"></i>
								<span class="nav-link-inner--text">เข้าสู่ระบบ</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
								<a class="dropdown-item" href="/login">สำหรับบุคลากร</a>
								<a class="dropdown-item" href="/admin/login">สำหรับผู้ดูแล</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Header -->
		<div class="header bg-gradient-@yield('header-color','primary') py-7 py-lg-8">
			<div class="container">
				<div class="header-body text-center mb-7">
					<div class="row justify-content-center">
						<div class="col-lg-5 col-md-6">
							<h1 class="text-white">@yield('what')</h1>
							<p class="text-lead" style="color: white">@yield('who')</p>
						</div>
					</div>
				</div>
			</div>
			<div class="separator separator-bottom separator-skew zindex-100">
				<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
					<polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
				</svg>
			</div>
		</div>
		<!-- Page content -->
		<div class="container mt--8 pb-5">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-7">
					<div class="card bg-secondary shadow border-0">
						<div class="card-body px-lg-5 py-lg-5">
							<div class="text-center text-muted mb-4">
								<h3></h3>
							</div>

							@yield('form')

						</div>
					</div>
					<div class="row mt-3">
						<div class="col-6">
							{{-- <a href="#" class="text-light"><small>Forgot password?</small></a> --}}
						</div>
						<div class="col-6 text-right">
							@if (Request::path() == 'login')
							<a id="register" href="/forgotpassword" class="text-light mr-4"><small>ลืมรหัสผ่าน</small></a>
							<a id="register" href="/register" class="text-light"><small>สมัครสมาชิก</small></a>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="py-5">
		<div class="container">
			<div class="row align-items-center justify-content-xl-between">
				<div class="col-xl-6">
					<div class="copyright text-center text-xl-left text-muted">
						&copy; 2019 <a href="#" class="font-weight-bold ml-1">ISR4B</a>
					</div>
				</div>
				<div class="col-xl-6">
					<ul class="nav nav-footer justify-content-center justify-content-xl-end">
						{{-- <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
						</li>
						<li class="nav-item">
							<a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
						</li> --}}
						<li class="nav-item">
							<a href="https://www.skc.rmuti.ac.th/" class="nav-link" target="_blank">RMUTI Skc</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	{{-- alert --}}
	<div style="position:fixed; bottom: 0; right: 0; margin: 10px">
		@if (session()->has('alert_text'))
		<div class="text-center alert alert-{{ session()->get('alert_color') }}" style="margin-bottom: 0;" role="alert" id="alert">{{
			session()->get('alert_text') }}</div>
		@endif
	</div>

	<!-- Argon Scripts -->
	<!-- Core -->
	<script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
	<script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Argon JS -->
	<script src="/assets/js/argon.js?v=1.0.0"></script>

	{{-- script --}}
	<script>
		$(window).ready(function () {
			$("#alert").fadeTo(4000, 500).slideUp(500, function () {
				$("#alert").slideUp(500);
			});
			if (window.location.href.includes('register')) {
				$('#register').hide()
			}
		})
	</script>
</body>

</html>