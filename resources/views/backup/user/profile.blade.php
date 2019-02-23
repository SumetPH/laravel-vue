@extends('layouts.argon')

@section('title-text','ย้อนกลับ') 
@section('title-link','/home')   

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card shadow">
				<div class="card-header">
					<h3 class="card-title text-muted mb-0">แก้ไขข้อมูลประจำตัว</h3>
				</div>
				<div class="card-body">
					<form method="POST" action="/user/profile/{{$profile->id}}">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
						{{-- <div class="form-group">
							<label for="email" class="col-md-4 control-label">อีเมล</label>
							<input class="form-control" type="text" name="email" value="{{$profile->email}}" disabled>
						</div> --}}

						<div class="form-group">
							<label for="firstname" class="col-md-4 control-label">ชื่อ</label>
							<input type="text" class="form-control" name="firstname" required value="{{$profile->firstname}}">
						</div>

						<div class="form-group">
							<label for="lastname" class="col-md-4 control-label">นามสกุล</label>
							<input type="text" class="form-control" name="lastname" required value="{{$profile->lastname}}">
						</div>

						<div class="form-group">
							<label for="education" class="col-md-4 control-label">วุฒิ</label>
							<input type="text" class="form-control" name="education" required value="{{$profile->education}}">
						</div>

						<div class="form-group">
							<label for="position" class="col-md-4 control-label">ตำแหน่ง</label>
							<input type="text" class="form-control" name="position" required value="{{$profile->position}}">
						</div>

						<div class="form-group">
							<label for="branch" class="col-md-4 control-label">สาขา</label>
							<input type="text" class="form-control" name="branch" required value="{{$profile->branch}}">
						</div>

						<div class="form-group">
							<label for="faculty" class="col-md-4 control-label">คณะ</label>
							<input type="text" class="form-control" name="faculty" required value="{{$profile->faculty}}">
						</div>
						<div class="form-group">
							<label for="university" class="col-md-4 control-label">มหาวิทยาลัย</label>
							<input type="text" class="form-control" name="university" required value="{{$profile->university}}">
						</div>
						<div class="form-group">
							<label for="campus" class="col-md-4 control-label">วิทยาเขต</label>
							<input type="text" class="form-control" name="campus" required value="{{$profile->campus}}">
						</div>
						<div class="form-group">
							<label for="number" class="col-md-4 control-label">เบอร์โทรศัพท์</label>
							<input type="text" class="form-control" name="number" required value="{{$profile->number}}">
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">บันทึก</button>
								<button type="reset" class="btn btn-danger">ยกเลิก</button>
							</div>
						</div>
					</form>				
				</div>
			</div>				
		</div>
	</div>
</div>
@endsection