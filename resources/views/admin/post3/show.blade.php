@extends('layouts.argon')

@section('header-color','danger')

{{-- @section('style')
<style>
	.check{
		border: 3px solid #2dce89; 
		border-radius: 10px
	}
</style>
@endsection --}}

@section('title-text','ย้อนกลับ')
@section('title-link','/admin/post2/'.$post_id)

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					@if ($post3->count() && $post3->first()->status == 'ผ่านการตรวจสอบแล้ว')
					<h3 class="card-title mb-0" style="color: #2dce89">ขั้นตอนที่ 3 : {{$post3->first()->status }}</h3>
					@else
					<h3 class="card-title mb-0" style="color: #f5365c">ขั้นตอนที่ 3 : {{$post3->first()->status or
						'ยังไม่มีการบันทึกไฟล์'}}</h3>
					@endif
				</div>
				<div class="card-body">
					@if (
					$post3->count()
					&& $post3->first()->file1path
					&& $post3->first()->file2path
					&& $post3->first()->file3path
					&& $post3->first()->file4path
					&& $post3->first()->file5path
					&& $post3->first()->file6path
					&& $post3->first()->file7path
					&& $post3->first()->file8path
					&& $post3->first()->file9path
					&& $post3->first()->file10path
					&& $post3->first()->file11path
					&& $post3->first()->file12path
					)
					<div class="col-md-12">

						<form action="/admin/post3/{{ $post3->first()->id }}" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="_method" value="put">
							<div class="form-group">
								<label @if ($post3->first()->file1status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="file">1.
									แบบคำขอรับการพิจารณากำหนดตำแหน่งทางวิชาการ (ก.พ.อ. 03)</label>
								<br>
								เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file1path}}">{{$post3->first()->file1name}}</a>
							</div>
							<div class="form-group">
								<label for="status">ผลการประเมิน</label>
								<select class="form-control" name="file1status">
									<option value="ยังไม่ได้รับการตรวจสอบ" @if ($post3->first()->file1status ==
										'ยังไม่ได้รับการตรวจสอบ') selected @endif >ยังไม่ได้รับการตรวจสอบ</option>
									<option value="ยังไม่ผ่านการตรวจสอบ" @if ($post3->first()->file1status == 'ยังไม่ผ่านการตรวจสอบ')
										selected @endif >ยังไม่ผ่านการตรวจสอบ</option>
									<option value="ผ่านการตรวจสอบแล้ว" @if ($post3->first()->file1status == 'ผ่านการตรวจสอบแล้ว')
										selected @endif >ผ่านการตรวจสอบแล้ว</option>
								</select>
							</div>

							<hr>
							<div class="form-group">
								<label @if ($post3->first()->file2status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="file">2.
									สำเนาหลักฐานการเผยแพร่ผลงานทางวิชาการ ตามหลักเกณฑ์ที่ ก.พ.อ. กำหนด</label>
								<br>
								เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file2path}}">{{$post3->first()->file2name}}</a>
							</div>
							<div class="form-group">
								<label for="status">ผลการประเมิน</label>
								<select class="form-control" name="file2status">
									<option value="ยังไม่ได้รับการตรวจสอบ" @if ($post3->first()->file2status ==
										'ยังไม่ได้รับการตรวจสอบ') selected @endif >ยังไม่ได้รับการตรวจสอบ</option>
									<option value="ยังไม่ผ่านการตรวจสอบ" @if ($post3->first()->file2status == 'ยังไม่ผ่านการตรวจสอบ')
										selected @endif >ยังไม่ผ่านการตรวจสอบ</option>
									<option value="ผ่านการตรวจสอบแล้ว" @if ($post3->first()->file2status == 'ผ่านการตรวจสอบแล้ว')
										selected @endif >ผ่านการตรวจสอบแล้ว</option>
								</select>
							</div>
							<hr>
							<div class="form-group">
								<label @if ($post3->first()->file3status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="file">3.
									ตารางสอนย้อนหลัง 3 ปีการศึกษา พร้อมตารางสอนภาคเรียนปัจจุบัน </label>
								<br>
								เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file3path}}">{{$post3->first()->file3name}}</a>
							</div>
							<div class="form-group">
								<label for="status">ผลการประเมิน</label>
								<select class="form-control" name="file3status">
									<option value="ยังไม่ได้รับการตรวจสอบ" @if ($post3->first()->file3status ==
										'ยังไม่ได้รับการตรวจสอบ') selected @endif >ยังไม่ได้รับการตรวจสอบ</option>
									<option value="ยังไม่ผ่านการตรวจสอบ" @if ($post3->first()->file3status == 'ยังไม่ผ่านการตรวจสอบ')
										selected @endif >ยังไม่ผ่านการตรวจสอบ</option>
									<option value="ผ่านการตรวจสอบแล้ว" @if ($post3->first()->file3status == 'ผ่านการตรวจสอบแล้ว')
										selected @endif >ผ่านการตรวจสอบแล้ว</option>
								</select>
							</div>
							<hr>
							<div class="form-group">
								<label @if ($post3->first()->file4status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="file">4.
									คำสั่งแต่งตั้งคณะอนุกรรมการประเมินผลการสอนเบื้องต้น </label>
								<br>
								เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file4path}}">{{$post3->first()->file4name}}</a>
							</div>

							<div class="form-group">
								<label for="status">ผลการประเมิน</label>
								<select class="form-control" name="file4status">
									<option value="ยังไม่ได้รับการตรวจสอบ" @if ($post3->first()->file4status ==
										'ยังไม่ได้รับการตรวจสอบ') selected @endif >ยังไม่ได้รับการตรวจสอบ</option>
									<option value="ยังไม่ผ่านการตรวจสอบ" @if ($post3->first()->file4status == 'ยังไม่ผ่านการตรวจสอบ')
										selected @endif >ยังไม่ผ่านการตรวจสอบ</option>
									<option value="ผ่านการตรวจสอบแล้ว" @if ($post3->first()->file4status == 'ผ่านการตรวจสอบแล้ว')
										selected @endif >ผ่านการตรวจสอบแล้ว</option>
								</select>
							</div>

							<hr>
							<div class="form-group">
								<label @if ($post3->first()->file5status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="file">5.
									คำสั่งแต่งตั้งคณะกรรมการกลั่นกรองผลงานทางวิชาการและจริยธรรมและจรรยาบรรณทางวิชาการ</label>
								<br>
								เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file5path}}">{{$post3->first()->file5name}}</a>
							</div>

							<div class="form-group">
								<label for="status">ผลการประเมิน</label>
								<select class="form-control" name="file5status">
									<option value="ยังไม่ได้รับการตรวจสอบ" @if ($post3->first()->file5status ==
										'ยังไม่ได้รับการตรวจสอบ') selected @endif >ยังไม่ได้รับการตรวจสอบ</option>
									<option value="ยังไม่ผ่านการตรวจสอบ" @if ($post3->first()->file5status == 'ยังไม่ผ่านการตรวจสอบ')
										selected @endif >ยังไม่ผ่านการตรวจสอบ</option>
									<option value="ผ่านการตรวจสอบแล้ว" @if ($post3->first()->file5status == 'ผ่านการตรวจสอบแล้ว')
										selected @endif >ผ่านการตรวจสอบแล้ว</option>
								</select>
							</div>
							<hr>
							<div class="form-group">
								<label @if ($post3->first()->file6status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="file">6.
									แบบแสดงหลักฐานการมีส่วนร่วมในผลงานทางวิชาการ </label>
								<br>
								เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file6path}}">{{$post3->first()->file6name}}</a>
							</div>

							<div class="form-group">
								<label for="status">ผลการประเมิน</label>
								<select class="form-control" name="file6status">
									<option value="ยังไม่ได้รับการตรวจสอบ" @if ($post3->first()->file6status ==
										'ยังไม่ได้รับการตรวจสอบ') selected @endif >ยังไม่ได้รับการตรวจสอบ</option>
									<option value="ยังไม่ผ่านการตรวจสอบ" @if ($post3->first()->file6status == 'ยังไม่ผ่านการตรวจสอบ')
										selected @endif >ยังไม่ผ่านการตรวจสอบ</option>
									<option value="ผ่านการตรวจสอบแล้ว" @if ($post3->first()->file6status == 'ผ่านการตรวจสอบแล้ว')
										selected @endif >ผ่านการตรวจสอบแล้ว</option>
								</select>
							</div>
							<hr>
							<div class="form-group">
								<label @if ($post3->first()->file7status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="file">7.
									หนังสือรับรองจริยธรรมและจรรยาบรรณทางวิชาการ </label>
								<br>
								เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file7path}}">{{$post3->first()->file7name}}</a>
							</div>
							<div class="form-group">
								<label for="status">ผลการประเมิน</label>
								<select class="form-control" name="file7status">
									<option value="ยังไม่ได้รับการตรวจสอบ" @if ($post3->first()->file7status ==
										'ยังไม่ได้รับการตรวจสอบ') selected @endif >ยังไม่ได้รับการตรวจสอบ</option>
									<option value="ยังไม่ผ่านการตรวจสอบ" @if ($post3->first()->file7status == 'ยังไม่ผ่านการตรวจสอบ')
										selected @endif >ยังไม่ผ่านการตรวจสอบ</option>
									<option value="ผ่านการตรวจสอบแล้ว" @if ($post3->first()->file7status == 'ผ่านการตรวจสอบแล้ว')
										selected @endif >ผ่านการตรวจสอบแล้ว</option>
								</select>
							</div>
							<hr>
							<div class="form-group">
								<label @if ($post3->first()->file8status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="file">8.
									หนังสือรับรองการเผยแพร่ผลงานทางวิชาการ </label>
								<br>
								เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file8path}}">{{$post3->first()->file8name}}</a>
							</div>
							<div class="form-group">
								<label for="status">ผลการประเมิน</label>
								<select class="form-control" name="file8status">
									<option value="ยังไม่ได้รับการตรวจสอบ" @if ($post3->first()->file8status ==
										'ยังไม่ได้รับการตรวจสอบ') selected @endif >ยังไม่ได้รับการตรวจสอบ</option>
									<option value="ยังไม่ผ่านการตรวจสอบ" @if ($post3->first()->file8status == 'ยังไม่ผ่านการตรวจสอบ')
										selected @endif >ยังไม่ผ่านการตรวจสอบ</option>
									<option value="ผ่านการตรวจสอบแล้ว" @if ($post3->first()->file8status == 'ผ่านการตรวจสอบแล้ว')
										selected @endif >ผ่านการตรวจสอบแล้ว</option>
								</select>
							</div>
							<hr>
							<div class="form-group">
								<label @if ($post3->first()->file9status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="file">9.
									หนังสือรับรองผลงานทางวิชาการ </label>
								<br>
								เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file9path}}">{{$post3->first()->file9name}}</a>
							</div>

							<div class="form-group">
								<label for="status">ผลการประเมิน</label>
								<select class="form-control" name="file9status">
									<option value="ยังไม่ได้รับการตรวจสอบ" @if ($post3->first()->file9status ==
										'ยังไม่ได้รับการตรวจสอบ') selected @endif >ยังไม่ได้รับการตรวจสอบ</option>
									<option value="ยังไม่ผ่านการตรวจสอบ" @if ($post3->first()->file9status == 'ยังไม่ผ่านการตรวจสอบ')
										selected @endif >ยังไม่ผ่านการตรวจสอบ</option>
									<option value="ผ่านการตรวจสอบแล้ว" @if ($post3->first()->file9status == 'ผ่านการตรวจสอบแล้ว')
										selected @endif >ผ่านการตรวจสอบแล้ว</option>
								</select>
							</div>
							<hr>
							<div class="form-group">
								<label @if ($post3->first()->file10status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="file">10.
									หนังสือรับรองวารสารทางวิชาการ สำหรับการเผยแพร่ผลงานทางวิชาการ </label>
								<br>
								เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file10path}}">{{$post3->first()->file10name}}</a>
							</div>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="_method" value="put">
							<div class="form-group">
								<label for="status">ผลการประเมิน</label>
								<select class="form-control" name="file10status">
									<option value="ยังไม่ได้รับการตรวจสอบ" @if ($post3->first()->file10status ==
										'ยังไม่ได้รับการตรวจสอบ') selected @endif >ยังไม่ได้รับการตรวจสอบ</option>
									<option value="ยังไม่ผ่านการตรวจสอบ" @if ($post3->first()->file10status == 'ยังไม่ผ่านการตรวจสอบ')
										selected @endif >ยังไม่ผ่านการตรวจสอบ</option>
									<option value="ผ่านการตรวจสอบแล้ว" @if ($post3->first()->file10status == 'ผ่านการตรวจสอบแล้ว')
										selected @endif >ผ่านการตรวจสอบแล้ว</option>
								</select>
							</div>
							<hr>
							<div class="form-group">
								<label @if ($post3->first()->file11status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="file">11.
									เอกสารประกอบการสอน/เอกสารคำสอน </label>
								<br>
								เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file11path}}">{{$post3->first()->file11name}}</a>
							</div>

							<div class="form-group">
								<label for="status">ผลการประเมิน</label>
								<select class="form-control" name="file11status">
									<option value="ยังไม่ได้รับการตรวจสอบ" @if ($post3->first()->file11status ==
										'ยังไม่ได้รับการตรวจสอบ') selected @endif >ยังไม่ได้รับการตรวจสอบ</option>
									<option value="ยังไม่ผ่านการตรวจสอบ" @if ($post3->first()->file11status == 'ยังไม่ผ่านการตรวจสอบ')
										selected @endif >ยังไม่ผ่านการตรวจสอบ</option>
									<option value="ผ่านการตรวจสอบแล้ว" @if ($post3->first()->file11status == 'ผ่านการตรวจสอบแล้ว')
										selected @endif >ผ่านการตรวจสอบแล้ว</option>
								</select>
							</div>
							<hr>
							<div class="form-group">
								<label @if ($post3->first()->file12status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="file">12.
									สำเนาหน้าปก วิทยานิพนธ์ ระดับปริญญาโท ระดับปริญญาเอก </label>
								<br>
								เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file12path}}">{{$post3->first()->file12name}}</a>
							</div>

							<div class="form-group">
								<label for="status">ผลการประเมิน</label>
								<select class="form-control" name="file12status">
									<option value="ยังไม่ได้รับการตรวจสอบ" @if ($post3->first()->file12status ==
										'ยังไม่ได้รับการตรวจสอบ') selected @endif >ยังไม่ได้รับการตรวจสอบ</option>
									<option value="ยังไม่ผ่านการตรวจสอบ" @if ($post3->first()->file12status == 'ยังไม่ผ่านการตรวจสอบ')
										selected @endif >ยังไม่ผ่านการตรวจสอบ</option>
									<option value="ผ่านการตรวจสอบแล้ว" @if ($post3->first()->file12status == 'ผ่านการตรวจสอบแล้ว')
										selected @endif >ผ่านการตรวจสอบแล้ว</option>
								</select>
							</div>
							<hr>
							{{-- สถานะ : --}}
							{{-- <form class="col-md-9" action="/admin/post3/{{ $post3->first()->id }}" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="put">
								<div class="form-group">
									<label for="status">ผลการประเมิน</label>
									<select class="form-control" name="status">
										<option value="ยังไม่ได้รับการตรวจสอบ" @if ($post3->first()->status ==
											'ยังไม่ได้รับการตรวจสอบ') selected @endif >ยังไม่ได้รับการตรวจสอบ</option>
										<option value="ยังไม่ผ่านการตรวจสอบ" @if ($post3->first()->status == 'ยังไม่ผ่านการตรวจสอบ')
											selected @endif >ยังไม่ผ่านการตรวจสอบ</option>
										<option value="ผ่านการตรวจสอบแล้ว" @if ($post3->first()->status == 'ผ่านการตรวจสอบแล้ว')
											selected @endif >ผ่านการตรวจสอบแล้ว</option>
									</select>
								</div>
							</form> --}}
							<div class="text-center">
								<button class="btn btn-primary" type="submit">บันทึกผลการประเมิน</button>
							</div>
						</form>
					</div>
					@else
					<div class="alert alert-warning text-center">
						กรุณารอเอกสารจากบุคลากร
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class="row justify-content-center mt-5">
		<div class="col-md-6">
			@if (
			$post3->count()
			&& $post3->first()->status == 'ผ่านการตรวจสอบแล้ว'
			)
			<div class="alert alert-success text-center">
				<span style="font-size: 18px">คำร้องขอนี้ผ่านการตรวจสอบเรียบร้อยแล้ว</span>
				<p></p>
				<strong><a href="/admin" style="color:white">กลับสู่หน้าหลัก</a></strong>
			</div>
			@endif
		</div>
	</div>

	<div class="row mt-5">
		<div class="col-md-12">
			@include('inc.comment')
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$('select').change(function() {
			$("#submit_alert").show();
		});
	});
</script>
@endsection