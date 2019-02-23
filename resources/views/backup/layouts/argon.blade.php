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
	<!-- Core -->
	<script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
	<script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	{{-- animate --}}
	<link rel="stylesheet" href="/assets/css/animate.css">
	{{-- style --}}
	@yield('style')
</head>

<body>
	<!-- Sidenav -->
	@include('layouts.collapse')
	<!-- Main content -->
	<div class="main-content">
		<!-- Top navbar -->
		@include('layouts.navbar')
		<!-- Header -->
		<div class="header bg-gradient-@yield('header-color','primary') pb-8 pt-5 pt-md-8">
			<div class="container-fluid">
				<div class="header-body">
					<!-- Card stats -->
					@yield('card')
				</div>
			</div>
		</div>
		<!-- Page content -->
		<div class="container-fluid mt--7">
			{{-- Content --}}
			@yield('content')
			<!-- Footer -->
			<footer class="footer">
				<div class="row align-items-center justify-content-xl-between">
					<div class="col-xl-6">
						<div class="copyright text-center text-xl-left text-muted">
							&copy; 2019 <a href="#" class="font-weight-bold ml-1">ISR4B</a>
						</div>
					</div>
					<div class="col-xl-6">
						<ul class="nav nav-footer justify-content-center justify-content-xl-end">
							{{-- <li class="nav-item">
								<a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
							</li> --}}
							{{-- <li class="nav-item">
								<a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
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
			</footer>
		</div>
	</div>

	{{-- alert --}}
	<div style="position:fixed; bottom: 0; right: 0; margin: 20px">
		@if (session()->has('alert_text'))
		<div class="text-center alert alert-{{ session()->get('alert_color') }}" style="margin-bottom: 0;" role="alert" id="alert">{{
			session()->get('alert_text') }}</div>
		@endif
	</div>

	{{-- submit_alert --}}
	<div style="position:fixed; bottom: 0; right: 0; margin: 20px; display: none" id="submit_alert">
		<div class="text-center alert alert-primary animated pulse" style="margin-bottom: 0;" role="alert">👇🏻
			กรุณากดบันทึกทุกครั้งที่มีการแก้ไข</div>
	</div>

	<!-- Argon Scripts -->
	<!-- Optional JS -->
	<script src="/assets/vendor/chart.js/dist/Chart.min.js"></script>
	<script src="/assets/vendor/chart.js/dist/Chart.extension.js"></script>
	<!-- Argon JS -->
	<script src="/assets/js/argon.js?v=1.0.0"></script>
	{{-- script --}}
	<script>
		$(window).ready(function () {
			$("#alert").fadeTo(4000, 500).slideUp(500, function () {
				$("#alert").slideUp(500);
			});
		})
	</script>
</body>

</html>