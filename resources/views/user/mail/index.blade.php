@extends('layouts.auth')

@section('what','ลืมรหัสผ่าน')
@section('who','สำหรับบุคลากร')

@section('form')
	<form action="/forgotpassword" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group mb-3">
			<div class="text-center mb-3" for="email">อีเมลของคุณ</div>
			<div class="input-group input-group-alternative">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="ni ni-email-83"></i></span>
				</div>
				<input class="form-control" name="email" placeholder="อีเมล" type="email" required>
			</div>
		</div>
		<div class="text-center">
			<button class="btn btn-primary" type="submit">ส่ง</button>
		</div>
	</form>
@endsection