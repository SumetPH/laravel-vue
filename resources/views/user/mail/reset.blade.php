@extends('layouts.auth')

@section('what','ลืมรหัสผ่าน')
@section('who','สำหรับบุคลากร')

@section('form')
	<form action="/forgotpassword/reset" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="id" value="{{$id}}">
		<div class="form-group">
			<div class="text-center mb-3">รหัสผ่านใหม่</div>
			<div class="input-group input-group-alternative">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
				</div>
				<input class="form-control" name="password1" placeholder="รหัสผ่านใหม่" type="password" required>
			</div>
		</div>
		<div class="form-group">
			<div class="text-center mb-3">รหัสผ่านใหม่ (อีกครัง)</div>
			<div class="input-group input-group-alternative">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
				</div>
				<input class="form-control" name="password2" placeholder="รหัสผ่านใหม่ (อีกครัง)" type="password" required>
			</div>
		</div>
		<div class="text-center">
			<button class="btn btn-primary" type="submit">บันทึก</button>
		</div>
	</form>
@endsection