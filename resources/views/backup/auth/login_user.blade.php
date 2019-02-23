@extends('layouts.auth')

{{-- @section('color','success') --}}

@section('what','เข้าสู่ระบบ')
@section('who','สำหรับบุคลากร')

@section('form')
<form role="form" action="/login" method="POST">
	{{ csrf_field() }}
	<div class="form-group mb-3">
		<div class="input-group input-group-alternative">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="ni ni-email-83"></i></span>
			</div>
			<input class="form-control" name="email" placeholder="อีเมล" type="email" required>
		</div>
	</div>
	<div class="form-group">
		<div class="input-group input-group-alternative">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
			</div>
			<input class="form-control" name="password" placeholder="รหัสผ่าน" type="password" required>
		</div>
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-primary my-4">เข้าสู่ระบบ</button>
	</div>
</form>
@endsection