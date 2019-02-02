@extends('layouts.argon')

@section('header-color','danger')

@section('title-text','ย้อนกลับ')
@section('title-link','/admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow
 
                ">
                <div class="card-header">
                    @if ($post->status == 'ผ่านการตรวจสอบแล้ว')
                    <h3 class="card-title mb-0" style="color: #2dce89">ขั้นตอนที่ 1 : ผ่านการตรวจสอบแล้ว</h3>
                    @else
                    <h3 class="card-title mb-0" style="color: #f5365c">ขั้นตอนที่ 1</h3>
                    @endif
                </div>
                <div class="card-body">
                    <p>โดย : {{ $post->user->firstname }} {{ $post->user->lastname }}</p>
                    <p> หัวข้อ : {{ $post->title }}</p>
                    <p>รายละเอียด : {{ $post->description }}</p>
                    <hr>
                    <div class="col-md-9 form-group">
                        <label for="file">ฟอร์มบันทึกข้อความ</label>
                        <br>
                        เอกสาร : <a target="_blank" href="/files/{{ $post->file }}">{{ $post->filename }}</a>
                    </div>
                    <hr>
  
                    <form class="col-md-9" action="/admin/post/{{ $post->id }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="status">ผลการประเมิน</label>
                            <select class="form-control" name="status" onchange="this.form.submit()">
                                <option value="ยังไม่ได้รับการตรวจสอบ" @if ($post->status ==
                                    'ยังไม่ได้รับการตรวจสอบ') selected @endif >ยังไม่ได้รับการตรวจสอบ</option>
                                <option value="ยังไม่ผ่านการตรวจสอบ" @if ($post->status == 'ยังไม่ผ่านการตรวจสอบ')
                                    selected @endif >ยังไม่ผ่านการตรวจสอบ</option>
                                <option value="ผ่านการตรวจสอบแล้ว" @if ($post->status == 'ผ่านการตรวจสอบแล้ว')
                                    selected @endif >ผ่านการตรวจสอบแล้ว</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            @if ($post->status == 'ผ่านการตรวจสอบแล้ว')
            <div class="row mt-5 justify-content-center">
                <div class="col-md-5">
                    <a href="/admin/post2/{{$post->id}}" class="btn btn-primary btn-block">ขั้นตอนถัดไป >></a>
                </div>
            </div>
            @endif

            <div class="row mt-5">
                <div class="col-md-12">
                    @include('inc.comment')
                </div>
            </div>
        </div>
    </div>

</div>
@endsection