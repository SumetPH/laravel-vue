@extends('layouts.argon')

@section('title-text','ย้อนกลับ')
@section('title-link','/home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    @if ($post->status == 'ผ่านการตรวจสอบแล้ว')
                    <h3 class="card-title mb-0" style="color: #2dce89">ขั้นตอนที่ 1 : {{$post->status}}</h3>
                    @else
                    <h3 class="card-title mb-0" style="color: #f5365c">ขั้นตอนที่ 1 : {{$post->status}}</h3>
                    @endif
                </div>
                <div class="card-body">
                    <p>หัวข้อ : {{ $post->title }}</p>
                    <p>รายละเอียด : {{ $post->description }}</p>
                    <hr>
                    <div class="col-md-9 form-group">
                        {{-- <label for="file">ฟอร์มบันทึกข้อความ</label> --}}
                        {{-- <a target="_blank" class="form-control" href="/files/{{ $post->file }}">{{$post->filename}}</a>  --}}
                        {{-- <br> --}}
                        <label for="">ฟอร์มบันทึกข้อความ</label>
                        <br>
                        เอกสาร : <a target="_blank" href="/files/{{ $post->file }}">{{$post->filename}}</a> 
                    </div>
                    @if ($post->status != 'ผ่านการตรวจสอบแล้ว')
                    <a href="/user/post/{{ $post->id }}/edit" class="btn btn-warning m-3">แก้ไข</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 justify-content-center">
        <div class="col-md-6">
            @if ($post->status == 'ผ่านการตรวจสอบแล้ว')
            <a href="/user/post2/{{$post->id}}" class="btn btn-primary btn-block">ขั้นตอนถัดไป >></a>
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