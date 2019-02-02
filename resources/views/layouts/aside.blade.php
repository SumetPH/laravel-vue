<ul class="navbar-nav">
	@if (auth()->user()->firstname == 'Admin')
	<li class="nav-item">
		<a class="nav-link" href="/admin">
			<i class="ni ni-tv-2 text-danger"></i>
			หน้าแรก
		</a>
	</li>
	@else
	<li class="nav-item">
		<a class="nav-link" href="/home">
			<i class="ni ni-tv-2 text-primary"></i>
			หน้าแรก
		</a>
	</li>
	@endif
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">เมนู</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
		@if (auth()->user()->firstname == 'Admin')
		<li class="nav-item">
			<a class="nav-link" href="/admin/user">
				<i class="ni ni-planet text-danger"></i>
				จัดการผู้ใช้งาน
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/admin/changepassword">
				<i class="ni ni-key-25 text-danger"></i>
				 เปลี่ยนรหัสผ่าน
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-admin').submit();">
				<i class="ni ni-user-run text-danger"></i>
				ออกจากระบบ
			</a>
			<form id="logout-form-admin" action="/admin/logout" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
		</li>
		@else
		<li class="nav-item">
			<a class="nav-link" href="/user/profile/{{ Auth::user()->id }}">
				<i class="ni ni-single-02 text-primary"></i>
				ข้อมูลประจำตัว
			</a>
		</li>
		<li class="nav-item">
				<a class="nav-link" href="/user/changepassword">
					<i class="ni ni-key-25 text-primary"></i>
					 เปลี่ยนรหัสผ่าน
				</a>
			</li>
		<li class="nav-item">
			<a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-user').submit();">
				<i class="ni ni-user-run text-primary"></i>
				ออกจากระบบ
			</a>
			<form id="logout-form-user" action="/user/logout" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
		</li>
		@endif

	{{-- <li class="nav-item">
		<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
			<i class="ni ni-spaceship"></i> Getting started
		</a>
	</li>

	{{-- <li class="nav-item">
		<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
			<i class="ni ni-spaceship"></i> Getting started
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
			<i class="ni ni-palette"></i> Foundation
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
			<i class="ni ni-ui-04"></i> Components
		</a>
	</li> --}}
</ul>