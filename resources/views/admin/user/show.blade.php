@extends('layouts.argon')

@section('header-color','danger')
@section('title-text','ย้อนกลับ')
@section('title-link','/admin/user')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title mb-0">รายละเอียดผู้ใช้งาน</h3>
				</div>
				<div class="card-body">

					<div class="row justify-content-center">
						<div class="col-md-9">
							<input type="hidden" name="_method" value="PUT">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group">
								<label for="firstname" class="col-md-4 control-label">ชื่อ</label>
								<input type="text" class="form-control" name="firstname" disabled value="{{$user->firstname}}">
							</div>

							<div class="form-group">
								<label for="lastname" class="col-md-4 control-label">นามสกุล</label>
								<input type="text" class="form-control" name="lastname" disabled value="{{$user->lastname}}">
							</div>

							<div class="form-group">
								<label for="email" class="col-md-4 control-label">อีเมล</label>
								<input class="form-control" type="text" name="email" value="{{$user->email}}" disabled>
							</div>

							<div class="form-group">
								<label for="education" class="col-md-4 control-label">วุฒิ</label>
								<input type="text" class="form-control" name="education" disabled value="{{$user->education}}">
							</div>

							<div class="form-group">
								<label for="position" class="col-md-4 control-label">ตำแหน่ง</label>
								<input type="text" class="form-control" name="position" disabled value="{{$user->position}}">
							</div>

							<div class="form-group">
								<label for="branch" class="col-md-4 control-label">สาขา</label>
								<input type="text" class="form-control" name="branch" disabled value="{{$user->branch}}">
							</div>

							<div class="form-group">
								<label for="faculty" class="col-md-4 control-label">คณะ</label>
								<input type="text" class="form-control" name="faculty" disabled value="{{$user->faculty}}">
							</div>
							<div class="form-group">
								<label for="university" class="col-md-4 control-label">มหาวิทยาลัย</label>
								<input type="text" class="form-control" name="university" disabled value="{{$user->university}}">
							</div>
							<div class="form-group">
								<label for="campus" class="col-md-4 control-label">วิทยาเขต</label>
								<input type="text" class="form-control" name="campus" disabled value="{{$user->campus}}">
							</div>
							<div class="form-group">
								<label for="number" class="col-md-4 control-label">เบอร์โทรศัพท์</label>
								<input type="text" class="form-control" name="number" disabled value="{{$user->number}}">
							</div>
							<div class="form-group">
								<div class="col-md-12 d-flex">
									<div class="mr-4">
										@if ($user->active == 0)
										<form action="/admin/user/{{$user->id}}" method="post">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="_method" value="put">
											<input type="hidden" name="active" value="1">
											<button class="btn btn-success" type="submit">ยืนยัน</button>
										</form>
										@else
										<form action="/admin/user/{{$user->id}}" method="post">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="_method" value="put">
											<input type="hidden" name="active" value="0">
											<button class="btn btn-warning" type="submit">ยกเลิกการยืนยัน</button>
										</form>
										@endif
									</div>
									<div>
										<form action="/admin/user/{{$user->id}}" method="post" onclick="return confirm('คุณต้องการลบบัญชีนี้ใช่หรือไม่?')">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="_method" value="delete">
											<button class="btn btn-danger">ลบ</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection