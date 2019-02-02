@extends('layouts.argon')

@section('header-color','danger')
@section('title-text','ย้อนกลับ')
@section('title-link','/admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title mb-0 text-muted">จักการผู้ใช้งาน</h3>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table align-items-center table-flush">
							<thead>
								<tr>
									<th scope="col">ชื่อ</th>
									<th scope="col">นามสกุล</th>
									<th scope="col">อีเมล</th>
									<th scope="col">เพิ่มเติม</th>
									{{-- <th scope="col">วุฒิ</th>
									<th scope="col">ตำแหน่ง</th>
									<th scope="col">สาขา</th>
									<th scope="col">คณะ</th>
									<th scope="col">เบอร์โทรศัพท์</th> --}}
									<th>สถานะ</th>
									<th>การใช้งาน</th>
									<th>ลบ</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
								<tr>
									<td>{{$user->firstname}}</td>
									<td>{{$user->lastname}}</td>
									<td>{{$user->email}}</td>
									<td>
										<a href="/admin/user/{{$user->id}}">รายละเอียดเพิ่มเติม</a>
									</td>
									{{-- <td>{{$user->education}}</td>
									<td>{{$user->position}}</td>
									<td>{{$user->branch}}</td>
									<td>{{$user->faculty}}</td>
									<td>{{$user->number}}</td> --}}
									<td>
										@if ($user->active == 0)
										ยังไม่ได้รับการอนุมัติ
										@else
										ได้รับการอนุมัติแล้ว
										@endif
									</td>
									<td class="p-2">
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
									</td>
									<td class="p-2">
										<form action="/admin/user/{{$user->id}}" method="post" onclick="return confirm('คุณต้องการลบบัญชีนี้ใช่หรือไม่?')">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="_method" value="delete">
											<button class="btn btn-danger">ลบ</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection