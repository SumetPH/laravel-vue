@extends('layouts.argon')

@section('title-text','ย้อนกลับ')
@section('title-link','/user/post2/'.$post_id)

@section('content')
<div class="container">
	<div class="row ">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					@if ($post3->count() && $post3->first()->status == 'ผ่านการตรวจสอบแล้ว')
					<h3 class="card-title mb-0" style="color: #2dce89">ขั้นตอนที่ 3 : {{$post3->first()->status}}</h3>
					@else
					<h3 class="card-title mb-0" style="color: #f5365c">ขั้นตอนที่ 3 : {{$post3->first()->status or
						'ยังไม่มีการบันทึกไฟล์'}}</h3>
					@endif
				</div>
				<div class="card-body">
					@if ($post3->count())
					<form method="post" enctype="multipart/form-data" action="/user/post3/{{$post3->first()->id}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="_method" value="put">
						<input type="hidden" name="post_id" value="{{ $post_id }}">
						{{-- file1 --}}
						<div id="file1" class="form-group" @if (!$post3->first()->file1path) style="display: none;"@endif>
							<label @if ($post3->first()->file1status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="doc">1. แบบคำขอรับการพิจารณากำหนดตำแหน่งทางวิชาการ (ก.พ.อ. 03)</label>
							<br>
							เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file1path}}">{{$post3->first()->file1name}}</a>
						</div>

						<div id="file1upload" class="form-group" @if ($post3->first()->file1path) style="display: none;" @endif>
							<label for="doc">1. แบบคำขอรับการพิจารณากำหนดตำแหน่งทางวิชาการ (ก.พ.อ. 03) </label>
							<input type="file" name="file1" class="form-control">
						</div>

						@if ($post3->first()->file1status != 'ผ่านการตรวจสอบแล้ว' && $post3->first()->file1path)
						<button class="btn btn-warning" id="file1edit">แก้ไข</button>
						@endif

						<hr class="my-4">

						{{-- file2 --}}
						<div class="form-group" @if (!$post3->first()->file2path) style="display: none;"@endif id="file2">
							<label @if ($post3->first()->file2status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="doc">2. สำเนาหลักฐานการเผยแพร่ผลงานทางวิชาการ ตามหลักเกณฑ์ที่ ก.พ.อ. กำหนด</label>
							<br>
							เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file2path}}">{{$post3->first()->file2name}}</a>
						</div>

						<div class="form-group" @if ($post3->first()->file2path) style="display: none;" @endif
							id="file2upload">
							<label for="doc">2. สำเนาหลักฐานการเผยแพร่ผลงานทางวิชาการ ตามหลักเกณฑ์ที่ ก.พ.อ. กำหนด</label>
							<input type="file" name="file2" class="form-control">
						</div>

						@if ($post3->first()->file2status != 'ผ่านการตรวจสอบแล้ว'&& $post3->first()->file2path)
						<button class="btn btn-warning" id="file2edit">แก้ไข</button>
						@endif

						<hr class="my-4">

						{{-- file3 --}}
						<div class="form-group" @if (!$post3->first()->file3path) style="display: none;"@endif
							id="file3">
							<label @if ($post3->first()->file3status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="doc">3. ตารางสอนย้อนหลัง 3 ปีการศึกษา พร้อมตารางสอนภาคเรียนปัจจุบัน</label>
							<br>
							เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file3path}}">{{$post3->first()->file3name}}</a>
						</div>

						<div class="form-group" @if ($post3->first()->file3path) style="display: none;" @endif
							id="file3upload">
							<label for="doc">3. ตารางสอนย้อนหลัง 3 ปีการศึกษา พร้อมตารางสอนภาคเรียนปัจจุบัน</label>
							<input type="file" name="file3" class="form-control">
						</div>

						@if ($post3->first()->file3status != 'ผ่านการตรวจสอบแล้ว'&& $post3->first()->file3path)
						<button class="btn btn-warning" id="file3edit">แก้ไข</button>
						@endif

						<hr class="my-4">

						{{-- file4 --}}
						<div class="form-group" @if (!$post3->first()->file4path) style="display: none;"@endif
							id="file4">
							<label @if ($post3->first()->file4status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="doc">4. คำสั่งแต่งตั้งคณะอนุกรรมการประเมินผลการสอนเบื้องต้น</label>
							<br>
							เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file4path}}">{{$post3->first()->file4name}}</a>
						</div>

						<div class="form-group" @if ($post3->first()->file4path) style="display: none;" @endif
							id="file4upload">
							<label for="doc">4. คำสั่งแต่งตั้งคณะอนุกรรมการประเมินผลการสอนเบื้องต้น</label>
							<input type="file" name="file4" class="form-control">
						</div>

						@if ($post3->first()->file4status != 'ผ่านการตรวจสอบแล้ว'&& $post3->first()->file4path)
						<button class="btn btn-warning" id="file4edit">แก้ไข</button>
						@endif

						<hr class="my-4">

						{{-- file5 --}}
						<div class="form-group" @if (!$post3->first()->file5path) style="display: none;"@endif
							id="file5">
							<label @if ($post3->first()->file5status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="doc">5. คำสั่งแต่งตั้งคณะกรรมการกลั่นกรองผลงานทางวิชาการและจริยธรรมและจรรยาบรรณทางวิชาการ</label>
							<br>
							เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file5path}}">{{$post3->first()->file5name}}</a>
						</div>

						<div class="form-group" @if ($post3->first()->file5path) style="display: none;" @endif
							id="file5upload">
							<label for="doc">5. คำสั่งแต่งตั้งคณะกรรมการกลั่นกรองผลงานทางวิชาการและจริยธรรมและจรรยาบรรณทางวิชาการ</label>
							<input type="file" name="file5" class="form-control">
						</div>

						@if ($post3->first()->file5status != 'ผ่านการตรวจสอบแล้ว'&& $post3->first()->file5path)
						<button class="btn btn-warning" id="file5edit">แก้ไข</button>
						@endif

						<hr class="my-4">

						{{-- file6 --}}
						<div class="form-group" @if (!$post3->first()->file6path) style="display: none;"@endif
							id="file6">
							<label @if ($post3->first()->file6status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="doc">6. แบบแสดงหลักฐานการมีส่วนร่วมในผลงานทางวิชาการ</label>
							<br>
							เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file6path}}">{{$post3->first()->file6name}}</a>
						</div>

						<div class="form-group" @if ($post3->first()->file6path) style="display: none;" @endif
							id="file6upload">
							<label for="doc">6. แบบแสดงหลักฐานการมีส่วนร่วมในผลงานทางวิชาการ</label>
							<input type="file" name="file6" class="form-control">
						</div>

						@if ($post3->first()->file6status != 'ผ่านการตรวจสอบแล้ว'&& $post3->first()->file6path)
						<button class="btn btn-warning" id="file6edit">แก้ไข</button>
						@endif

						<hr class="my-4">

						{{-- file7 --}}
						<div class="form-group" @if (!$post3->first()->file7path) style="display: none;"@endif
							id="file7">
							<label @if ($post3->first()->file7status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="doc">7. หนังสือรับรองจริยธรรมและจรรยาบรรณทางวิชาการ</label>
							<br>
							เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file7path}}">{{$post3->first()->file7name}}</a>
						</div>

						<div class="form-group" @if ($post3->first()->file7path) style="display: none;" @endif
							id="file7upload">
							<label for="doc">7. หนังสือรับรองจริยธรรมและจรรยาบรรณทางวิชาการ</label>
							<input type="file" name="file7" class="form-control">
						</div>

						@if ($post3->first()->file7status != 'ผ่านการตรวจสอบแล้ว'&& $post3->first()->file7path)
						<button class="btn btn-warning" id="file7edit">แก้ไข</button>
						@endif

						<hr class="my-4">

						{{-- file8 --}}
						<div class="form-group" @if (!$post3->first()->file8path) style="display: none;"@endif
							id="file8">
							<label @if ($post3->first()->file8status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="doc">8. หนังสือรับรองการเผยแพร่ผลงานทางวิชาการ</label>
							<br>
							เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file8path}}">{{$post3->first()->file8name}}</a>
						</div>

						<div class="form-group" @if ($post3->first()->file8path) style="display: none;" @endif
							id="file8upload">
							<label for="doc">8. หนังสือรับรองการเผยแพร่ผลงานทางวิชาการ</label>
							<input type="file" name="file8" class="form-control">
						</div>

						@if ($post3->first()->file8status != 'ผ่านการตรวจสอบแล้ว'&& $post3->first()->file8path)
						<button class="btn btn-warning" id="file8edit">แก้ไข</button>
						@endif

						<hr class="my-4">

						{{-- file9 --}}
						<div class="form-group" @if (!$post3->first()->file9path) style="display: none;"@endif
							id="file9">
							<label @if ($post3->first()->file9status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="doc">9. หนังสือรับรองผลงานทางวิชาการ</label>
							<br>
							เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file9path}}">{{$post3->first()->file9name}}</a>
						</div>

						<div class="form-group" @if ($post3->first()->file9path) style="display: none;" @endif
							id="file9upload">
							<label for="doc">9. หนังสือรับรองผลงานทางวิชาการ</label>
							<input type="file" name="file9" class="form-control">
						</div>

						@if ($post3->first()->file9status != 'ผ่านการตรวจสอบแล้ว'&& $post3->first()->file9path)
						<button class="btn btn-warning" id="file9edit">แก้ไข</button>
						@endif

						<hr class="my-4">

						{{-- file10 --}}
						<div class="form-group" @if (!$post3->first()->file10path) style="display: none;"@endif
							id="file10">
							<label @if ($post3->first()->file10status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="doc">10. หนังสือรับรองวารสารทางวิชาการ สำหรับการเผยแพร่ผลงานทางวิชาการ</label>
							<br>
							เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file10path}}">{{$post3->first()->file10name}}</a>
						</div>

						<div class="form-group" @if ($post3->first()->file10path) style="display: none;" @endif
							id="file10upload">
							<label for="doc">10. หนังสือรับรองวารสารทางวิชาการ สำหรับการเผยแพร่ผลงานทางวิชาการ</label>
							<input type="file" name="file10" class="form-control">
						</div>

						@if ($post3->first()->file10status != 'ผ่านการตรวจสอบแล้ว'&& $post3->first()->file10path)
						<button class="btn btn-warning" id="file10edit">แก้ไข</button>
						@endif

						<hr class="my-4">

						{{-- file11 --}}
						<div class="form-group" @if (!$post3->first()->file11path) style="display: none;"@endif
							id="file11">
							<label @if ($post3->first()->file11status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="doc">11. เอกสารประกอบการสอน/เอกสารคำสอน</label>
							<br>
							เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file11path}}">{{$post3->first()->file11name}}</a>
						</div>

						<div class="form-group" @if ($post3->first()->file11path) style="display: none;" @endif
							id="file11upload">
							<label for="doc">11. เอกสารประกอบการสอน/เอกสารคำสอน</label>
							<input type="file" name="file11" class="form-control">
						</div>

						@if ($post3->first()->file11status != 'ผ่านการตรวจสอบแล้ว'&& $post3->first()->file11path)
						<button class="btn btn-warning" id="file11edit">แก้ไข</button>
						@endif

						<hr class="my-4">
						{{-- file12 --}}
						<div class="form-group" @if (!$post3->first()->file12path) style="display: none;"@endif
							id="file12">
							<label @if ($post3->first()->file12status == 'ผ่านการตรวจสอบแล้ว') style="color: #2dce89" @endif for="doc">12. สำเนาหน้าปก วิทยานิพนธ์ ระดับปริญญาโท ระดับปริญญาเอก</label>
							<br>
							เอกสาร : <a target="_blank" href="/files/{{$post3->first()->file12path}}">{{$post3->first()->file12name}}</a>
						</div>

						<div class="form-group" @if ($post3->first()->file12path) style="display: none;" @endif
							id="file12upload">
							<label for="doc">12. สำเนาหน้าปก วิทยานิพนธ์ ระดับปริญญาโท ระดับปริญญาเอก</label>
							<input type="file" name="file12" class="form-control">
						</div>

						@if ($post3->first()->file12status != 'ผ่านการตรวจสอบแล้ว'&& $post3->first()->file12path)
						<button class="btn btn-warning" id="file12edit">แก้ไข</button>
						@endif

						<hr class="my-4">

						<div id="btn_submit" @if ( $post3->count()
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
							style="display:none" @endif>
							<button class="btn btn-primary" type="submit">บันทึก</button>
							<p></p>
							<small style="color: red">* กรุณากดบันทึกทุกครั้งที่มีการแก้ไข</small>
						</div>
					</form>

					@else

					{{-- store --}}
					<div class="row">
						<div class="col-md-12">
							<form method="post" enctype="multipart/form-data" action="/user/post3">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="post_id" value="{{ $post_id }}">
								<div class="form-group">
									<label for="file">1. แบบคำขอรับการพิจารณากำหนดตำแหน่งทางวิชาการ (ก.พ.อ. 03) </label>
									<input type="file" name="file1" class="form-control">
								</div>
								<hr>
								<div class="form-group">
									<label for="file">2. สำเนาหลักฐานการเผยแพร่ผลงานทางวิชาการ ตามหลักเกณฑ์ที่ ก.พ.อ. กำหนด</label>
									<input type="file" name="file2" class="form-control">
								</div>
								<hr>
								<div class="form-group">
									<label for="file">3. ตารางสอนย้อนหลัง 3 ปีการศึกษา พร้อมตารางสอนภาคเรียนปัจจุบัน</label>
									<input type="file" name="file3" class="form-control">
								</div>
								<hr>
								<div class="form-group">
									<label for="file">4. คำสั่งแต่งตั้งคณะอนุกรรมการประเมินผลการสอนเบื้องต้น</label>
									<input type="file" name="file4" class="form-control">
								</div>
								<hr>
								<div class="form-group">
									<label for="file">5. คำสั่งแต่งตั้งคณะกรรมการกลั่นกรองผลงานทางวิชาการและจริยธรรมและจรรยาบรรณทางวิชาการ</label>
									<input type="file" name="file5" class="form-control">
								</div>
								<hr>
								<div class="form-group">
									<label for="file">6. แบบแสดงหลักฐานการมีส่วนร่วมในผลงานทางวิชาการ</label>
									<input type="file" name="file6" class="form-control">
								</div>
								<hr>
								<div class="form-group">
									<label for="file">7. หนังสือรับรองจริยธรรมและจรรยาบรรณทางวิชาการ</label>
									<input type="file" name="file7" class="form-control">
								</div>
								<hr>
								<div class="form-group">
									<label for="file">8. หนังสือรับรองการเผยแพร่ผลงานทางวิชาการ </label>
									<input type="file" name="file8" class="form-control">
								</div>
								<hr>
								<div class="form-group">
									<label for="file">9. หนังสือรับรองผลงานทางวิชาการ </label>
									<input type="file" name="file9" class="form-control">
								</div>
								<hr>
								<div class="form-group">
									<label for="file">10. หนังสือรับรองวารสารทางวิชาการ สำหรับการเผยแพร่ผลงานทางวิชาการ  </label>
									<input type="file" name="file10" class="form-control">
								</div>
								<hr>
								<div class="form-group">
									<label for="file">11. เอกสารประกอบการสอน/เอกสารคำสอน </label>
									<input type="file" name="file11" class="form-control">
								</div>
								<hr>
								<div class="form-group">
									<label for="file">12. สำเนาหน้าปก วิทยานิพนธ์ ระดับปริญญาโท ระดับปริญญาเอก </label>
									<input type="file" name="file12" class="form-control">
								</div>
								<hr>
								<button class="btn btn-primary" type="submit">บันทึก</button>
							</form>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>

	@if ( $post3->count() && $post3->first()->status == 'ผ่านการตรวจสอบแล้ว')
	<div class="row mt-5 justify-content-center">
		<div class="col-md-5">
			<div class="alert alert-success text-center">
				<span style="font-size: 18px">คำร้องขอนี้ผ่านการตรวจสอบเรียบร้อยแล้ว</span>
				<p></p>
				<strong><a href="/home" style="color:white">กลับสู่หน้าหลัก</a></strong>
			</div>
		</div>
	</div>
	@endif

	<div class="row mt-5">
		<div class="col-md-12">
			@include('inc.comment')
		</div>
	</div>

	<script>
		$(document).ready(function () {
			$('#file1edit').click(function (e) {
				e.preventDefault();
				$("#file1").hide();
				$("#file1edit").hide();
				$("#file1upload").show();
				$("#btn_submit").show();
				$("#submit_alert").show();
			});
			$('#file2edit').click(function (e) {
				e.preventDefault();
				$("#file2").hide();
				$("#file2edit").hide();
				$("#file2upload").show();
				$("#btn_submit").show();
				$("#submit_alert").show();
			});
			$('#file3edit').click(function (e) {
				e.preventDefault();
				$("#file3").hide();
				$("#file3edit").hide();
				$("#file3upload").show();
				$("#btn_submit").show();
				$("#submit_alert").show();
			});
			$('#file4edit').click(function (e) {
				e.preventDefault();
				$("#file4").hide();
				$("#file4edit").hide();
				$("#file4upload").show();
				$("#btn_submit").show();
				$("#submit_alert").show();
			});
			$('#file5edit').click(function (e) {
				e.preventDefault();
				$("#file5").hide();
				$("#file5edit").hide();
				$("#file5upload").show();
				$("#btn_submit").show();
				$("#submit_alert").show();
			});
			$('#file6edit').click(function (e) {
				e.preventDefault();
				$("#file6").hide();
				$("#file6edit").hide();
				$("#file6upload").show();
				$("#btn_submit").show();
				$("#submit_alert").show();
			});
			$('#file7edit').click(function (e) {
				e.preventDefault();
				$("#file7").hide();
				$("#file7edit").hide();
				$("#file7upload").show();
				$("#btn_submit").show();
				$("#submit_alert").show();
			});
			$('#file8edit').click(function (e) {
				e.preventDefault();
				$("#file8").hide();
				$("#file8edit").hide();
				$("#file8upload").show();
				$("#btn_submit").show();
				$("#submit_alert").show();
			});
			$('#file9edit').click(function (e) {
				e.preventDefault();
				$("#file9").hide();
				$("#file9edit").hide();
				$("#file9upload").show();
				$("#btn_submit").show();
				$("#submit_alert").show();
			});
			$('#file10edit').click(function (e) {
				e.preventDefault();
				$("#file10").hide();
				$("#file10edit").hide();
				$("#file10upload").show();
				$("#btn_submit").show();
				$("#submit_alert").show();
			});
			$('#file11edit').click(function (e) {
				e.preventDefault();
				$("#file11").hide();
				$("#file11edit").hide();
				$("#file11upload").show();
				$("#btn_submit").show();
				$("#submit_alert").show();
			});
			$('#file12edit').click(function (e) {
				e.preventDefault();
				$("#file12").hide();
				$("#file12edit").hide();
				$("#file12upload").show();
				$("#btn_submit").show();
				$("#submit_alert").show();
			});
		});
	</script>
</div>
@endsection