@extends('layouts.argon')

@section('title-text','ย้อนกลับ')
@section('title-link','/user/post/'.$post_id)

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					@if ($post2->count() && $post2->first()->file3path && $post2->first()->file4path)
					<h3 class="card-title mb-0" style="color: #2dce89">ขั้นตอนที่ 2</h3>
					@else
					<h3 class="card-title mb-0" style="color: #f5365c">ขั้นตอนที่ 2</h3>
					@endif
				</div>
				<div class="card-body">
					@if ($post2->count() && $post2->first()->file3path && $post2->first()->file4path)
					<div class="col-md-9">
						<div class="form-group">
							<label for="file3">1. คำสั่งแต่งตั้งคณะอนุกรรมการประเมินผลการสอนเบื้องต้น</label>
							<br>
							เอกสาร : <a target="_blank" href="/files/{{$post2->first()->file3path}}">{{$post2->first()->file3name}}</a>
						</div>
						<hr>
						<div class="form-group">
							<label for="file3">2. คำสั่งแต่งตั้งคณะกรรมการกลั่นกรองผลงานทางวิชาการ</label>
							<br>
							เอกสาร : <a target="_blank" href="/files/{{$post2->first()->file4path}}">{{$post2->first()->file4name}}</a>
						</div>
					</div>
					@else
					<div class="alert alert-warning text-center">
						กรุณารอเอกสารจากเจ้าหน้าที่
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class="row mt-5 justify-content-center">
		<div class="col-md-6">
			@if ($post2->count() && $post2->first()->file3path && $post2->first()->file4path)
			<a href="/user/post3/{{$post2->first()->post_id}}" class="btn btn-primary btn-block">ขั้นตอนถัดไป >></a>
			@endif
		</div>
	</div>

	<div class="row mt-5">
		<div class="col-md-12">
			@include('inc.comment')
		</div>
	</div>
</div>
@endsection